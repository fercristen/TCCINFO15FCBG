<?php
/**
 * Criado: Fernando Cristen
 * Data: 14/08/2019
 * Hora: 17:15
 */

namespace Control\Admin;


use Estrutura\Controller\BaseController;
use Estrutura\Model\Resposta;
use Model\Noticia;
use View\Admin\NoticiaForm;

class NoticiasController extends BaseController
{

    public function index(){
        $fields = [
            'id' => '#',
            'titulo' => 'Titulo',
            'data' => 'Data',
        ];
        $acoesLinhas = [
            'Editar' => 'editNoticia',
            'Visualizar' => 'viewNoticia',
            'Excluir' => 'deleteNoticia',
        ];
        $acoes = [
            'Adicionar' => 'addNoticia',
        ];
        $dados = $this->modeloParaGrid();
        $resposta = new Resposta($fields, $dados, $acoesLinhas, $acoes);
        $resposta->getFormatoJSON();
    }

    public function modeloParaGrid(){
        $dados = [];
        /** @var $noticias Noticia[]*/
        $noticias = $this->getEntityManager()->getRepository(Noticia::class)->findAll();
        foreach ($noticias as $noticia){
            $dados[] = [
                'id' => $noticia->getId(),
                'titulo' =>  $noticia->getTitulo(),
                'data' =>  $noticia->getData()->format('d/m/Y'),
            ];
        }
        return $dados;
    }

    public function delete(){
        try{
           $noticia = $this->getEntityManager()->getRepository(Noticia::class)->find($this->getResquestParam('id'));
           if($noticia) {
               $this->getEntityManager()->remove($noticia);
               $this->getEntityManager()->flush();
               echo json_encode(['message' => 'Excluido entidade #'.$this->getResquestParam('id')]) ;
               return;
           }
        }catch (\Exception $exception){
            echo json_encode(['message' => 'Erro ao excluir entidade, tente novamente']);
        }
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
                $this->redirectPage("/admin");
            }catch (\Exception $exception){
                $this->redirectPage("/admin");
            }
        }else{
            $view = new NoticiaForm('/addNoticia');
            $view->getFormatoJSON();
        }
    }

    public function edit(){
        if($this->isPost()){
            try{
                $noticia = $this->getEntityManager()->getRepository(Noticia::class)->find($this->getDataParam('id'));
                $noticia->setTitulo($this->getDataParam('titulo'));
                $noticia->setResumo($this->getDataParam('resumo'));
                $noticia->setCorpo($this->getDataParam('corpo'));
                //$noticia->setData(new \DateTime());
                $this->getEntityManager()->persist($noticia);
                $this->getEntityManager()->flush();
                $this->redirectPage("/admin");
            }catch (\Exception $exception){
                $this->redirectPage("/admin");
            }
        }else{
            $noticia = $this->getEntityManager()->getRepository(Noticia::class)->find($this->getResquestParam('id'));
            $view = new NoticiaForm('/editNoticia');
            $view->setDados($this->modeloParaForm($noticia));
            $view->getFormatoJSON();
        }
    }

    public function view(){
        $noticia = $this->getEntityManager()->getRepository(Noticia::class)->find($this->getResquestParam('id'));
        $view = new NoticiaForm('/viewNoticia', true);
        $view->setDados($this->modeloParaForm($noticia));
        $view->getFormatoJSON();
    }

    public function modeloParaForm(Noticia $noticia){
        $dado = [
            'id' => $noticia->getId(),
            'titulo' =>  $noticia->getTitulo(),
            'data' =>  $noticia->getData()->format('d/m/Y'),
            'resumo' =>  $noticia->getResumo(),
            'corpo' =>  $noticia->getCorpo(),
        ];
        return $dado;
    }

}