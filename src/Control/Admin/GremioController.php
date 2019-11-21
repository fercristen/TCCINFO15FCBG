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
use View\Admin\GremioForm;

class GremioController extends BaseController
{

    public function index()
    {
        $fields = [
            'id' => '#',
            'nomeChapa' => 'Chapa',
            'atual' => 'Atual',
        ];
        $acoesLinha = [
            'Editar' => 'editGremio',
            'Visualizar' => 'viewGremio',
            'Excluir' => 'deleteGremio',
        ];
        $acoes = [
            'Adicionar' => 'addGremio',
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
            $atual = 'Sim';
            if(!$gremio->getMandatoAtual()){
                $atual = 'Nao';
            }
            $dados[] = [
                'id' => $gremio->getId(),
                'nomeChapa' => $gremio->getNomeChapa(),
                'atual' => $atual,
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
                $gremio->setMandatoAtual($this->getDataParam('atual'));
                $gremio->setDescricao($this->getDataParam('descricao'));
                $this->getEntityManager()->persist($gremio);
                $this->getEntityManager()->flush();
                $this->redirectPage("/admin");
            }catch (\Exception $exception){
                $this->redirectPage("/admin");
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
                $gremio->setNomeChapa($this->getDataParam('chapa'));
                $gremio->setMandatoAtual($this->getDataParam('atual'));
                $gremio->setDescricao($this->getDataParam('descricao'));
                $this->getEntityManager()->persist($gremio);
                $this->getEntityManager()->flush();
                $this->redirectPage("/admin");
            }catch (\Exception $exception){
                $this->redirectPage("/admin");
            }
        }else{
            $gremio = $this->getEntityManager()->getRepository(Gremio::class)->find($this->getResquestParam('id'));
            $view = new GremioForm('/editGremio');
            $view->setDados($this->modeloParaForm($gremio));
            $view->getFormatoJSON();
        }
    }

    public function view(){
        $gremio = $this->getEntityManager()->getRepository(Gremio::class)->find($this->getResquestParam('id'));
        $view = new GremioForm('/viewIntegrante', true);
        $view->setDados($this->modeloParaForm($gremio));
        $view->getFormatoJSON();
    }

    public function modeloParaForm(Gremio $gremio){
        $dado = [
            'id' => $gremio->getId(),
            'chapa' =>  $gremio->getNomeChapa(),
            'atual' =>  $gremio->getMandatoAtual(),
            'descricao' =>  $gremio->getDescricao(),
        ];
        return $dado;
    }
}