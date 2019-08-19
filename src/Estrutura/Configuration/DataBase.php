<?php

namespace Estrutura\Configuration;

class DataBase
{
    const URL_SITE = "http://devgremioifc.com";

    public static function getConnectionConfiguration(){
        $conn = array(
            'dbname' => 'portal_gremio_dev',
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