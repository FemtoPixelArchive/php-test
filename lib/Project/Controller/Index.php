<?php
namespace Project\Controller;


class Index
{
    public function indexAction()
    {
        $sql = \Nano\Basepath::get() . 'sql';
        $debug = \Nano\Basepath::get() . 'debug';
        $algo = \Nano\Basepath::get() . 'algo';
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
