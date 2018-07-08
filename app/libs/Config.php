<?php

class Config
{
    public static function _init(bool $isController)
    {
        $basePath = $isController ? '../' : '';
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/conferencer/app/config/config.ini", true);
        define('CONFIG', $config);
    }
}