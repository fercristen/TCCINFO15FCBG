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
use View\Admin\AddNewNotice;

class NoticiasController extends BaseController
{

    public function index(){
        $fields = [
            'id' => '#',
            'titulo' => 'Titulo',
            'data' => 'Data',
        ];
        $acoes = [
            'Adicionar' => 'addNoticia',
            'Editar' => 'editNoticia',
            'Visualizar' => 'viewNoticia',
            'Excluir' => 'deleteNoticia',
        ];
        $dados = $this->modeloParaGrid();
        $resposta = new Resposta($fields, $dados, $acoes);
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
                $this->redirectPage("/index");
            }catch (\Exception $exception){
                $this->redirectPage("/addNoticia");
                 var_dump($exception);
            }
        }else{
            return new AddNewNotice();
        }
    }

}