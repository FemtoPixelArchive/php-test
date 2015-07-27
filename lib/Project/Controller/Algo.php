<?php
namespace Project\Controller;


class Algo
{
    private $answer;
    public function getAnswer()
    {
        if (!$this->answer) {
            $this->answer = class_exists('\Release\Algo') ? new \Release\Algo() : new \Project\Mock\Algo();
        }
        return $this->answer;
    }

    public function indexAction()
    {
        $sql = \Framework\Basepath::get() . 'sql';
        $debug = \Framework\Basepath::get() . 'debug';
        $home = \Framework\Basepath::get();
        echo <<<END
<h1>Algo</h1>
<ul>
    <li>
        <a href="$sql">Sql</a>
    </li>
    <li>
       <a href="$debug">Debug</a>
    </li>
    <li>
       <a href="$home">Accueil</a>
    </li>
</ul>
END;
        $this->process();
    }

    private function process()
    {
        $process = '';
        foreach ($this->getAnswer()->process(100000, 5, 1000) as $line) {
            $process .= "<tr>
<td>{$line['mois']}</td>
<td>{$line['restant']}</td>
<td>{$line['interet']}</td>
<td>{$line['rembourse']}</td>
</tr>";
        }
        echo <<<HEREDOC
<table>
    <tr>
        <th>Mois n°</th>
        <th>Capital Restant Du</th>
        <th>Interet (n)</th>
        <th>Capital remboursé (n)</th>
    </tr>
    $process
</table>
HEREDOC;
    }
}
