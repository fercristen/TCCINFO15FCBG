<?php

namespace Estrutura\Configuration;

class DataBase
{
    const URL_SITE = "http://gremiodev.com";

    public static function getConnectionConfiguration(){
        $conn = array(
            'dbname' => 'dev_gremio',
            'user' => 'root',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        );
        return $conn;
    }

    public static function isDevMode(){
        return true;
    }

}