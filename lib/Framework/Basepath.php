<?php
namespace Framework;


class Basepath
{
    static function get()
    {
        $documentRoot = str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']);
        $uri = $_SERVER['REQUEST_URI'];
        $length = strlen($uri);
        $basePath = '/';
        for ($i = 1; $i < $length; $i++) {
            $currentBasePath = substr($uri, 0, $i);
            $found = strpos($documentRoot, $currentBasePath);
            if ($found !== false) {
                $basePath = $currentBasePath;
            } else {
                break;
            }
        }
        $length = strlen($basePath) - 1;
        if ($basePath{$length} != '/') {
            $basePath .= '/';
        }
        return $basePath;
    }
}
