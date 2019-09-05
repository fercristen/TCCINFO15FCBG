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
            //----------Base Admin
            '/admin' => [
                'control' => 'Control::Admin::AdminController.run',
                'privilegio' => self::ADMIN_USER,
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
            '/editNoticia' => [
                'control' => 'Control::Admin::NoticiasController.edit',
                'privilegio' => self::ADMIN_USER,
            ],
            '/viewNoticia' => [
                'control' => 'Control::Admin::NoticiasController.view',
                'privilegio' => self::ADMIN_USER,
            ],
            '/deleteNoticia' => [
                'control' => 'Control::Admin::NoticiasController.delete',
                'privilegio' => self::ADMIN_USER,
            ],
            '/temas' => [
                'control' => 'Control::Admin::TemaController.index',
                'privilegio' => self::ADMIN_USER,
            ],
            '/addTema' => [
                'control' => 'Control::Admin::TemaController.add',
                'privilegio' => self::ADMIN_USER,
            ],
            '/integrantes' => [
                'control' => 'Control::Admin::IntegrantesController.index',
                'privilegio' => self::ADMIN_USER,
            ],
        );
    }
}