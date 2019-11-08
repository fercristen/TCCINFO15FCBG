<?php
/**
 * Criado: Fernando Cristen
 * Data: 28/10/2019
 * Hora: 18:43
 */

namespace Control\Admin;


use Estrutura\Controller\BaseController;
use Estrutura\Model\Resposta;
use Model\Gremio;
use Model\Noticia;
use View\Admin\GremioForm;
use View\Admin\GremioFormForm;

class GremioController extends BaseController
{

    public function index()
    {
        $fields = [
            'id' => '#',
            'nomeChapa' => 'Chapa',
        ];
        $acoesLinha = [
            'Editar' => 'editGremio',
            'Visualizar' => 'viewGremio',
            'Excluir' => 'deleteGremio',
        ];
        $acoes = [
            'Adicionar' => 'addIntegrante',
        ];
        $dados = $this->modeloParaGrid();
        $resposta = new Resposta($fields, $dados, $acoesLinha, $acoes);
        $resposta->getFormatoJSON();
    }

    public function modeloParaGrid()
    {
        $dados = [];
        /** @var $gremios Gremio[] */
        $gremios = $this->getEntityManager()->getRepository(Gremio::class)->findAll();
        foreach ($gremios as $gremio) {
            $dados[] = [
                'id' => $gremio->getId(),
                'nomeChapa' => $gremio->getNomeChapa(),
            ];
        }
        return $dados;
    }
    public function delete(){
        try{
            $gremio = $this->getEntityManager()->getRepository(Gremio::class)->find($this->getResquestParam('id'));
            if($gremio) {
                $this->getEntityManager()->remove($gremio);
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
                $gremio = new Gremio();
                $gremio->setNomeChapa($this->getDataParam('chapa'));
                $this->getEntityManager()->persist($gremio);
                $this->getEntityManager()->flush();
                $this->redirectPage("/admin");
            }catch (\Exception $exception){
                echo json_encode(['message' => $exception->getMessage()]);
                //$this->redirectPage("/admin");
            }
        }else{
            $view = new GremioForm( '/addGremio');
            $view->getFormatoJSON();
        }
    }

    public function edit(){
        if($this->isPost()){
            try{
                $gremio = $this->getEntityManager()->getRepository(Gremio::class)->find($this->getResquestParam('id'));
                $gremio->setNomeChapa($this->getDataParam('nomeChapa'));

                $this->getEntityManager()->persist($gremio);
                $this->getEntityManager()->flush();
                $this->redirectPage("/admin");
            }catch (\Exception $exception){
                $this->redirectPage("/admin");
            }
        }else{
            $noticia = $this->getEntityManager()->getRepository(Gremio::class)->find($this->getResquestParam('id'));
            $view = new GremioForm('/editGremio');
            $view->setDados($this->modeloParaForm($gremio));
            $view->getFormatoJSON();
        }
    }
}