<?php
namespace Project\Controller;


class Debug
{
    private $answerClassOne;
    private $answerClassTwo;
    private $answerClassThree;
    private $answerClassFour;

    public function __construct()
    {
        $this->answerClassOne = class_exists('\Release\Debug\One') ? '\Release\Debug\One' : '\Project\Mock\Debug\One';
        $this->answerClassTwo = class_exists('\Release\Debug\Two') ? '\Release\Debug\Two' : '\Project\Mock\Debug\Two';
        $this->answerClassThree = class_exists('\Release\Debug\Three') ? '\Release\Debug\Three' : '\Project\Mock\Debug\Three';
        $this->answerClassFour = class_exists('\Release\Debug\Four') ? '\Release\Debug\Four' : '\Project\Mock\Debug\Four';
    }

    public function indexAction()
    {
        $sql = \Framework\Basepath::get() . 'sql';
        $home = \Framework\Basepath::get();
        echo <<<HEREDOC
<h1>Debug exam</h1>
<ul>
    <li>
        <a href="$home">Accueil</a>
    </li>
    <li>
        <a href="$sql">Sql</a>
    </li>
</ul>
HEREDOC;
        $this->one();
        $this->two();
        $this->three();
        $this->four();
    }

    public function one()
    {
        echo "<h1>Une</h1>";

        $result = 'Succes';
        $initValue = 10;
        for ($i = 0; $i < $initValue; $i++) {
            $answerClassOne = new $this->answerClassOne();
            if (!$answerClassOne instanceof \Project\Mock\Debug\One) {
                $result = 'Echec : Erreur de classe';
            }
            $answerClassOne->doSomething();
        }
        if ($answerClassOne->getCounter() !== $initValue) {
            $result = 'Echec : Erreur de valeur';
        }
        echo $result;
    }

    public function two()
    {
        echo "<h1>Deux</h1>";

        try {
            throw new $this->answerClassTwo();
        } catch (\Project\Mock\Debug\Two $e) {
            $result = 'Echec : classe Mock';
        } catch (\Release\Debug\Two $e) {
            $result = $e->getMessage();
        } catch (\Exception $e) {
            $result = "Echec : classe globale";
        }

        echo $result == 'Succes' ? 'Succes' : 'Echec : Message non ok';
    }

    public function three()
    {
        echo "<h1>Trois</h1>";

        $answer = new $this->answerClassThree();
        $model = new \Project\Model\Debug\Three();
        $model2 = $answer->treatment($model);
        if (!$model2 instanceof \Project\Model\Debug\Three) {
            $model2 = new \Project\Model\Debug\Three();
        } else {
            $anon = function($param) {
                /* @var $param \Project\Model\Debug\Three */
                $param->setValue('Echec');
            };
            $anon($model2);
        }
        echo $model2->getId() == $model->getId() && $model->getValue() == 'Succes' ? 'Succes' : 'Echec : integrité perdue';
    }

    public function four()
    {
        echo "<h1>Quatre</h1>";
        $answer = new $this->answerClassFour();
        if ($answer instanceof \Project\Mock\Debug\Four) {
            echo 'Echec : fichier de réponse non livré';
            return;
        }
        $random = uniqid();
        $values = array(
            'foo' => $answer->foo,
            'bar' => $answer->bar,
            'foobar' => $answer->foobar,
            'random' => $answer->$random,
            'fooMeth' => $answer->foo(),
            'barMeth' => $answer->bar(),
            'foobarMeth' => $answer->foobar(),
            'randomMeth' => $answer->$random(),
        );
        $result = 'Succes';
        foreach ($values as $value) {
            if ($value != 'Succes') {
                $result = 'Echec : Une valeur ne renvoi pas "Succes"';
            }
        }
        if ($answer->echec != $answer->echec() || $answer->echec() != 'Echec') {
            $result = 'Echec : La methode echec() et la propriete "echec" ne retourne pas "Echec"';
        }
        echo $result;
    }
}
