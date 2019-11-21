<?php
/**
 * Criado: Fernando Cristen
 * Data: 14/08/2019
 * Hora: 17:15
 */

namespace Control\Admin;


use Estrutura\Controller\BaseController;
use Estrutura\Model\Mensagem;
use Estrutura\Model\Resposta;
use Model\Noticia;
use Model\NoticiaImagem;
use Model\Tema;
use View\Admin\NoticiaForm;

class NoticiasController extends BaseController
{

    public function index(){
        $fields = [
            'id' => '#',
            'titulo' => 'Titulo',
            'data' => 'Data',
            'tema' => 'Tema',
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
                'tema' =>  $noticia->getTema()->getNome(),
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
                $imagemController = new ImagemController();
                $noticia = new Noticia();
                $noticia->setTitulo($this->getDataParam('titulo'));
                $noticia->setResumo($this->getDataParam('resumo'));
                $noticia->setCorpo($this->getDataParam('corpo'));
                $tema = $this->getEntityManager()->getRepository(Tema::class)->find($this->getDataParam('tema'));
                $noticia->setTema($tema);
                $noticia->setData(new \DateTime());
                $this->getEntityManager()->persist($noticia);
                //Imagem de capa
                $imagemCapa = $imagemController->novaImagem('capa');
                $noticiaImagemCapa = new NoticiaImagem();
                $noticiaImagemCapa->setNoticia($noticia);
                $noticiaImagemCapa->setImagem($imagemCapa);
                $noticiaImagemCapa->setImagem($imagemCapa);
                $noticiaImagemCapa->setTituloImagem("Capa da noticia");
                $this->getEntityManager()->persist($noticiaImagemCapa);
                $this->getEntityManager()->flush();
                new Mensagem(Mensagem::TIPO_SUCESSO, 'Sucesso ao adicionar noticia');
                $this->redirectPage("/admin");
            }catch (\Exception $exception){
                new Mensagem(Mensagem::TIPO_ERRO, 'Erro ao adicionar noticia');
                $this->redirectPage("/admin");
            }
        }else{
            $view = new NoticiaForm('/addNoticia', false, false, $this->getListaTemas());
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
                $tema = $this->getEntityManager()->getRepository(Tema::class)->find($this->getDataParam('tema'));
                $noticia->setTema($tema);
                $this->getEntityManager()->persist($noticia);
                $this->getEntityManager()->flush();
                new Mensagem(Mensagem::TIPO_SUCESSO, 'Sucesso ao alterar noticia');
                $this->redirectPage("/admin");
            }catch (\Exception $exception){
                new Mensagem(Mensagem::TIPO_ERRO, 'Erro ao alterar noticia');
                $this->redirectPage("/admin");
            }
        }else{
            $noticia = $this->getEntityManager()->getRepository(Noticia::class)->find($this->getResquestParam('id'));
            $view = new NoticiaForm('/editNoticia', false, true, $this->getListaTemas());
            $view->setDados($this->modeloParaForm($noticia));
            $view->getFormatoJSON();
        }
    }

    public function view(){
        $noticia = $this->getEntityManager()->getRepository(Noticia::class)->find($this->getResquestParam('id'));
        $view = new NoticiaForm('/viewNoticia', true, false, $this->getListaTemas());
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
            'tema' =>  $noticia->getTema()->getId(),
        ];
        return $dado;
    }
    private function getListaTemas(){
        return $this->getEntityManager()->getRepository(Tema::class)->findAll();
    }

}