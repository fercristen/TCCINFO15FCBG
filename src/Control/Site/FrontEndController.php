<?php


namespace Control\Site;


use Estrutura\Controller\BaseController;
use Estrutura\Controller\ContainerController;
use Model\Noticia;
use View\Site\FrontEndAllNoticiasView;
use View\Site\FrontEndIndexView;
use View\Site\FrontEndLerNoticia;
use View\Site\FrontEndMovimentacoes;
use View\Site\FrontEndTransparencia;

class FrontEndController extends BaseController
{

    public function index(){
        return new FrontEndIndexView();
    }

    public function allNoticias(){
        return new FrontEndAllNoticiasView();
    }


    public function ler(){
        $idNoticia = $this->getResquestParam('id');
        $noticia = $this->getEntityManager()->getRepository(Noticia::class)->find($idNoticia);
        if($noticia){
            return new FrontEndLerNoticia($noticia);
        }
        ContainerController::pageNotFound();
    }

    public function about(){
        return new FrontEndTransparencia();
    }

    public function movimentacoes(){
        return new FrontEndMovimentacoes();
    }


}