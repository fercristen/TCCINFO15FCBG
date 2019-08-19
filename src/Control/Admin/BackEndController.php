<?php


namespace Control\Admin;


use Estrutura\Controller\BaseController;
use Model\Usuario;
use Repository\UsuarioRepository;
use View\Admin\LoginFormView;

class BackEndController extends BaseController
{

    public function login(){
        if($this->isPost()){
            /** @var $repositorio UsuarioRepository*/
            $repositorio = $this->getEntityManager()->getRepository(Usuario::class);
            $usuario = $repositorio->validaLogin($this->getDataParam("email"), $this->getDataParam("password"));
            if($usuario){
                $this->setUserSession($usuario);
                $this->redirectPage("/addNoticia");
            }else{
                $this->redirectPage("/login");
            }
        }else{
            if($this->getUserSession()){
                $this->redirectPage("/addNoticia");
            }

            return new LoginFormView();
        }
    }


    public function logout(){
        $this->clearUserSession();
        $this->redirectPage("/index");
    }
}