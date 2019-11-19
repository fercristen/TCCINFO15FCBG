<?php
/**
 * Criado: Fernando Cristen
 * Data: 13/08/2019
 * Hora: 23:01
 */

namespace Estrutura\Controller;


use Estrutura\Configuration\DataBase;
use Estrutura\DataBase\Connection;

class BaseController
{
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = Connection::getEntityManager();
    }

    public function isPost(){
        if (isset($_POST) && count($_POST) > 0){
            return true;
        }
        return false;
    }

    public function getData(){
        return $_POST;
    }

    public function getRequest(){
        return $_REQUEST;
    }
    public function getResquestParam($name){
        $request = $this->getRequest();
        if(isset($request[$name])){
            return $request[$name];
        }
        return null;
    }

    public function setUserSession($user){
        $this->setOnSession('usuario', $user);
    }

    public function getUserSession(){
        return $this->getOnSession('usuario');
    }

    public function clearUserSession(){
        $this->setOnSession('usuario', false);
    }

    public function getDataParam($name){
        $dados = $this->getData();
        if (isset($dados[$name])){
            $dado = $dados[$name];
            if($dado == 'true'){
                return true;
            }elseif ($dado == 'false'){
                return false;
            }
            return $dado;
        }
        return null;
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    public function redirectPage($router, $params = null){
        header("Location: ".DataBase::URL_SITE.$router);
    }

    public function setOnSession($name, $value){
        $_SESSION[$name] = $value;
    }

    public function getOnSession($name){
        if (isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
        return null;
    }
}