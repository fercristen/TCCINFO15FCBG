<?php
/**
 * Criado: Fernando Cristen
 * Data: 14/08/2019
 * Hora: 17:15
 */

namespace Control\Admin;


use Estrutura\Controller\BaseController;
use Model\Noticia;
use View\Admin\AddNewNotice;

class NoticiasController extends BaseController
{

    public function index(){

    }

    public function add(){
        if($this->isPost()){
            try{
                $noticia = new Noticia();
                $noticia->setTitulo($this->getDataParam('titulo'));
                $noticia->setResumo($this->getDataParam('resumo'));
                $noticia->setCorpo($this->getDataParam('corpo'));
                $noticia->setData(new \DateTime());
                $this->getEntityManager()->persist($noticia);
                $this->getEntityManager()->flush();
                $this->redirectPage("/noticias");
            }catch (\Exception $exception){
                $this->redirectPage("/addNoticia");
            }
        }else{
            return new AddNewNotice();
        }
    }

}