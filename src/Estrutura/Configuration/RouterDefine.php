<?php


namespace Estrutura\Configuration;


class RouterDefine
{

    const ALL_USER = 1;
    const ADMIN_USER = 2;

    public function getRouter($routerName){
        $allRouters = $this->getAllRouters();
        if(isset($allRouters[$routerName])){
            return $allRouters[$routerName];
        }
        return null;
    }

    public function getAllRouters(){
        return Array(
            //----------Site
           '/index' => [
               'control' => 'Control::Site::FrontEndController.index',
               'privilegio' => self::ALL_USER
           ],
            '/allNotices' => [
               'control' => 'Control::Site::FrontEndController.allNoticias',
               'privilegio' => self::ALL_USER,
           ],
            '/ler' => [
                'control' => 'Control::Site::FrontEndController.ler',
                'privilegio' => self::ALL_USER,
            ],
            //----------Admin
            '/login' => [
                'control' => 'Control::Admin::BackEndController.login',
                'privilegio' => self::ALL_USER,
            ],
            '/logout' => [
                'control' => 'Control::Admin::BackEndController.logout',
                'privilegio' => self::ALL_USER,
            ],
            '/noticias' => [
                'control' => 'Control::Admin::NoticiasController.index',
                'privilegio' => self::ADMIN_USER,
            ],
            '/addNoticia' => [
                'control' => 'Control::Admin::NoticiasController.add',
                'privilegio' => self::ADMIN_USER,
            ],
        );
    }
}