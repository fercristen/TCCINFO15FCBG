<?php
/**
 * Criado: Fernando Cristen
 * Data: 02/09/2019
 * Hora: 23:04
 */

namespace Control\Admin;


use Estrutura\Controller\BaseController;
use Estrutura\Controller\ContainerController;
use Estrutura\View\Facilitador;

class AdminController extends BaseController
{
    public function run(){
        if($this->getUserSession()){
            Facilitador::createTemplateAdmin();
        }else{
            ContainerController::pageAcessoNegado();
        }
    }
}