<?php
namespace Project\Controller;


class Index
{
    public function indexAction()
    {
        $sql = \Framework\Basepath::get() . 'sql';
        $debug = \Framework\Basepath::get() . 'debug';
        $algo = \Framework\Basepath::get() . 'algo';
        echo <<<END
<h1>Bienvenue</h1>
<ul>
    <li>
        <a href="$sql">Sql</a>
    </li>
    <li>
       <a href="$debug">Debug</a>
    </li>
    <li>
       <a href="$algo">Algo</a>
    </li>
</ul>
END;
    }
}
