<?php
namespace Project\Controller;


class Sql
{
    private $model;

    public function getModel()
    {
        if (!$this->model) {
            $this->model = new \Project\Model\Sql();
            if (class_exists('\Release\Sql\Answer')) {
                $this->model->setAnswer(new \Release\Sql\Answer());
            }
        }
        return $this->model;
    }

    public function indexAction()
    {
        $debug = \Framework\Basepath::get() . 'debug';
        $home = \Framework\Basepath::get();
        echo <<<HEREDOC
<h1>Sql exam</h1>
<ul>
    <li>
        <a href="$home">Accueil</a>
    </li>
    <li>
        <a href="$debug">Debug</a>
    </li>
</ul>
HEREDOC;
        $this->displayOne();
        $this->displayTwo();
        $this->displayThree();
        $this->displayFour();
        $this->displayFive();
    }

    private function displayOne()
    {
        $name = 'Y';
        echo '<h2>Liste des matières du professeur ' . $name . '</h2>';
        echo '<table>';
        echo '<tr><th>Cours</th></tr>';
        foreach ($this->getModel()->getQuestionOne($name) as $line) {
            echo "<tr><td>{$line['matiere']}</td></tr>";
        }
        echo '</table>';
        echo '<h3>Réponse :</h3>';
        echo $this->getModel()->getAnswer()->getQuestionOne($name);
    }

    private function displayTwo()
    {
        $name = 'X';
        echo '<h2>Dernier cours de l\'élève ' . $name . '</h2>';
        echo '<table>';
        echo '<tr><th>Jour</th><th>Heure</th></tr>';
        foreach ($this->getModel()->getQuestionTwo($name) as $line) {
            echo "<tr><td>{$line['jour']}</td><td>{$line['heure']}</td></tr>";
        }
        echo '</table>';
        echo '<h3>Réponse :</h3>';
        echo $this->getModel()->getAnswer()->getQuestionTwo($name);
    }

    private function displayThree()
    {
        $name = 'X';
        echo '<h2>Première matière de la semaine de l\'élève ' . $name . '</h2>';
        echo '<table>';
        echo '<tr><th>Matière</th></tr>';
        foreach ($this->getModel()->getQuestionThree($name) as $line) {
            echo "<tr><td>{$line['matiere']}</td></tr>";
        }
        echo '</table>';
        echo '<h3>Réponse :</h3>';
        echo $this->getModel()->getAnswer()->getQuestionThree($name);
    }

    private function displayFour()
    {
        $name = 'Y';
        echo '<h2>Nombre d\'heure pour chaque matière du professeur ' . $name . '</h2>';
        echo '<table>';
        echo '<tr><th>Nombre d\'heure</th><th>Matière</th></tr>';
        foreach ($this->getModel()->getQuestionFour($name) as $line) {
            echo "<tr><td>{$line['heures']}</td><td>{$line['matiere']}</td></tr>";
        }
        echo '</table>';
        echo '<h3>Réponse :</h3>';
        echo $this->getModel()->getAnswer()->getQuestionFour($name);
    }
    private function displayFive()
    {
        $name = 'Y';
        echo '<h2>Liste des professeurs partageant une matière en commun avec le professeur ' . $name . '</h2>';
        echo '<table>';
        echo '<tr><th>Nom</th><th>Prénom</th><th>Matière</th></tr>';
        foreach ($this->getModel()->getQuestionFive($name) as $line) {
            echo "<tr><td>{$line['nom']}</td><td>{$line['prenom']}</td><td>{$line['matiere']}</td></tr>";
        }
        echo '</table>';
        echo '<h3>Réponse :</h3>';
        echo $this->getModel()->getAnswer()->getQuestionFive($name);
    }
}
