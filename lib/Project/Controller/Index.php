<?php
namespace Project\Controller;


class Index
{
    public function indexAction()
    {
        $sql = \Framework\Basepath::get() . 'sql';
        $debug = \Framework\Basepath::get() . 'debug';
        echo <<<END
<h1>Bienvenue</h1>
<ul>
    <li>
        <a href="$sql">Sql</a>
    </li>
    <li>
       <a href="$debug">Debug</a>
   </li>
</ul>
END;
    }
}