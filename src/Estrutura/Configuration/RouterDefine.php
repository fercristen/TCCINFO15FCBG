<?php


namespace Estrutura\Configuration;


class RouterDefine
{

    const ALL_USER = 1;
    const ADMIN_USER = 2;

    public function getRouter($routerName)
    {
        $allRouters = $this->getAllRouters();
        if (isset($allRouters[$routerName])) {
            return $allRouters[$routerName];
        }
        return null;
    }

    public function getAllRouters()
    {
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
            '/transparencia' => [
                'control' => 'Control::Site::FrontEndController.transparencia',
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
            '/editTema' => [
                'control' => 'Control::Admin::TemaController.edit',
                'privilegio' => self::ADMIN_USER,
            ],
            '/viewTema' => [
                'control' => 'Control::Admin::TemaController.view',
                'privilegio' => self::ADMIN_USER,
            ],
            '/deleteTema' => [
                'control' => 'Control::Admin::TemaController.delete',
                'privilegio' => self::ADMIN_USER,
            ],
            '/gremios' => [
                'control' => 'Control::Admin::GremioController.index',
                'privilegio' => self::ADMIN_USER,
            ],
            '/addGremio' => [
                'control' => 'Control::Admin::GremioController.add',
                'privilegio' => self::ADMIN_USER,
            ],
            '/editGremio' => [
                'control' => 'Control::Admin::GremioController.edit',
                'privilegio' => self::ADMIN_USER,
            ],
            '/viewGremio' => [
                'control' => 'Control::Admin::GremioController.view',
                'privilegio' => self::ADMIN_USER,
            ],
            '/deleteGremio' => [
                'control' => 'Control::Admin::GremioController.delete',
                'privilegio' => self::ADMIN_USER,
            ],
            '/integrantes' => [
                'control' => 'Control::Admin::IntegrantesController.index',
                'privilegio' => self::ADMIN_USER,
            ],
            '/addIntegrantes' => [
                'control' => 'Control::Admin::IntegrantesController.add',
                'privilegio' => self::ADMIN_USER,
            ],
            '/editIntegrantes' => [
                'control' => 'Control::Admin::IntegrantesController.edit',
                'privilegio' => self::ADMIN_USER,
            ],
            '/deleteIntegrantes' => [
                'control' => 'Control::Admin::IntegrantesController.delete',
                'privilegio' => self::ADMIN_USER,
            ],
        );
    }
}