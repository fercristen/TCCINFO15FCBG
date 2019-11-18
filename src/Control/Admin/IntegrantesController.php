<?php
/**
 * Criado: Fernando Cristen
 * Data: 03/09/2019
 * Hora: 21:59
 */

namespace Control\Admin;


use Model\Gremio;
use Model\Integrante;
use Estrutura\Controller\BaseController;
use Estrutura\Model\Resposta;
use View\Admin\IntegranteForm;

class IntegrantesController extends BaseController
{

    public function index()
    {
        $fields = [
            'id' => '#',
            'nome' => 'Nome',
            'cargo' => 'Cargo',
            'gremio' => 'Gremio',
        ];
        $acoesLinha = [
            'Editar' => 'editIntegrante',
            'Visualizar' => 'viewIntegrante',
            'Excluir' => 'deleteIntegrante',
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
        /** @var $integrantes Integrante[] */
        $integrantes = $this->getEntityManager()->getRepository(Integrante::class)->findAll();
        foreach ($integrantes as $integrante) {
            $dados[] = [
                'id' => $integrante->getId(),
                'nome' => $integrante->getNome(),
                'cargo' => $integrante->getCargo(),
                'gremio' => $integrante->getGremio()->getNomeChapa(),
            ];
        }
        return $dados;
    }

    public function modeloParaForm(Integrante $integrante){
        $dado = [
            'id' => $integrante->getId(),
            'nome' =>  $integrante->getNome(),
            'cargo' =>  $integrante->getCargo(),
            'gremio' =>  $integrante->getGremio()->getId(),
        ];
        return $dado;
    }

    public function add(){
        if($this->isPost()){
            try{
                $integrante = new Integrante();
                $integrante->setNome($this->getDataParam('nome'));
                $integrante->setCargo($this->getDataParam('cargo'));
                $integrante->setGremio($this->getEntityManager()->getRepository(Gremio::class)->find($this->getDataParam('gremio')));
                $this->getEntityManager()->persist($integrante);
                $this->getEntityManager()->flush();
                $this->redirectPage("/admin");
            }catch (\Exception $exception){
                $this->redirectPage("/admin");
            }
        }else{
            $view = new IntegranteForm('/addIntegrante', false, $this->getListGremio());
            $view->getFormatoJSON();
        }
    }

    public function edit(){
        if($this->isPost()){
            try{
                /** @var  $integrante Integrante*/
                $integrante = $this->getEntityManager()->getRepository(Integrante::class)->find($this->getResquestParam('id'));
                $integrante->setNome($this->getDataParam('nome'));
                $integrante->setCargo($this->getDataParam('cargo'));
                $integrante->setGremio($this->getEntityManager()->getRepository(Gremio::class)->find($this->getDataParam('gremio')));
                $this->getEntityManager()->persist($integrante);
                $this->getEntityManager()->flush();
                $this->redirectPage("/admin");
            }catch (\Exception $exception){
                $this->redirectPage("/admin");
            }
        }else{
            /** @var $integrante Integrante*/
            $integrante = $this->getEntityManager()->getRepository(Integrante::class)->find($this->getResquestParam('id'));
            $view = new IntegranteForm('/editIntegrante', false, $this->getListGremio());
            $view->setDados($this->modeloParaForm($integrante));
            $view->getFormatoJSON();
        }
    }

    public function view(){
        $integrante = $this->getEntityManager()->getRepository(Integrante::class)->find($this->getResquestParam('id'));
        $view = new IntegranteForm('/viewIntegrante', true, $this->getListGremio());
        $view->setDados($this->modeloParaForm($integrante));
        $view->getFormatoJSON();
    }

    public function delete(){
        try{
            $integrante = $this->getEntityManager()->getRepository(Integrante::class)->find($this->getResquestParam('id'));
            if($integrante) {
                $this->getEntityManager()->remove($integrante);
                $this->getEntityManager()->flush();
                echo json_encode(['message' => 'Excluido entidade #'.$this->getResquestParam('id')]) ;
                return;
            }
        }catch (\Exception $exception){
            echo json_encode(['message' => 'Erro ao excluir entidade, tente novamente']);
        }
    }

    private function getListGremio(){
        return $this->getEntityManager()->getRepository(Gremio::class)->findAll();
    }
}
