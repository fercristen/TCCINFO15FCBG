<?php
/**
 * Criado: Fernando Cristen
 * Data: 18/11/2019
 * Hora: 01:35
 */

namespace Control\Admin;


use Estrutura\Controller\BaseController;
use Estrutura\Model\Resposta;
use Model\Movimentacao;
use View\Admin\MovimentacaoForm;

class MovimentacaoController extends BaseController
{
    public function index()
    {
        $fields = [
            'id' => '#',
            'titulo' => 'Título',
            'tipo' => 'Tipo',
            'descricao' => 'Descrição',
        ];
        $acoesLinha = [
            'Editar' => 'editMovimentacao',
            'Visualizar' => 'viewMovimentacao',
            'Excluir' => 'deleteMovimentacao',
        ];
        $acoes = [
            'Adicionar' => 'addMovimentacao',
        ];
        $dados = $this->modeloParaGrid();
        $resposta = new Resposta($fields, $dados, $acoesLinha, $acoes);
        $resposta->getFormatoJSON();
    }

    public function modeloParaGrid()
    {
        $dados = [];
        $lista = Movimentacao::getTipoList();
        /** @var $movimentacoes Movimentacao[] */
        $movimentacoes = $this->getEntityManager()->getRepository(Movimentacao::class)->findAll();
        foreach ($movimentacoes as $movimentacao) {
            $dados[] = [
                'id' => $movimentacao->getId(),
                'titulo' => $movimentacao->getTitulo(),
                'tipo' => $lista[$movimentacao->getTipo()],
                'descricao' => $movimentacao->getDescricao(),
            ];
        }
        return $dados;
    }

    public function modeloParaForm(Movimentacao $movimentacao){
        $dado = [
            'id' => $movimentacao->getId(),
            'tipo' =>  $movimentacao->getTipo(),
            'titulo' =>  $movimentacao->getTitulo(),
            'descricao' =>  $movimentacao->getDescricao(),
        ];
        return $dado;
    }

    public function add(){
        if($this->isPost()){
            try{
                $movimentacao = new Movimentacao();
                $movimentacao->setDescricao($this->getDataParam('descricao'));
                $movimentacao->setTitulo($this->getDataParam('titulo'));
                $movimentacao->setTipo($this->getDataParam('tipo'));
                $this->getEntityManager()->persist($movimentacao);
                $this->getEntityManager()->flush();
                $this->redirectPage("/admin");
            }catch (\Exception $exception){
                $this->redirectPage("/admin");
            }
        }else{
            $view = new MovimentacaoForm('/addMovimentacao', false);
            $view->getFormatoJSON();
        }
    }

    public function edit(){
        if($this->isPost()){
            try{
                /** @var  $movimentacao Movimentacao*/
                $movimentacao = $this->getEntityManager()->getRepository(Movimentacao::class)->find($this->getResquestParam('id'));
                $movimentacao->setDescricao($this->getDataParam('descricao'));
                $movimentacao->setTitulo($this->getDataParam('titulo'));
                $movimentacao->setTipo($this->getDataParam('tipo'));
                $this->getEntityManager()->persist($movimentacao);
                $this->getEntityManager()->flush();
                $this->redirectPage("/admin");
            }catch (\Exception $exception){
                $this->redirectPage("/admin");
            }
        }else{
            /** @var $movimentacao Movimentacao*/
            $movimentacao = $this->getEntityManager()->getRepository(Movimentacao::class)->find($this->getResquestParam('id'));
            $view = new MovimentacaoForm('/editMovimentacao', false);
            $view->setDados($this->modeloParaForm($movimentacao));
            $view->getFormatoJSON();
        }
    }

    public function view(){
        $movimentacao = $this->getEntityManager()->getRepository(Movimentacao::class)->find($this->getResquestParam('id'));
        $view = new MovimentacaoForm('/viewMovimentacao', true);
        $view->setDados($this->modeloParaForm($movimentacao));
        $view->getFormatoJSON();
    }

    public function delete(){
        try{
            $movimentacao = $this->getEntityManager()->getRepository(Movimentacao::class)->find($this->getResquestParam('id'));
            if($movimentacao) {
                $this->getEntityManager()->remove($movimentacao);
                $this->getEntityManager()->flush();
                echo json_encode(['message' => 'Excluido entidade #'.$this->getResquestParam('id')]) ;
                return;
            }
        }catch (\Exception $exception){
            echo json_encode(['message' => 'Erro ao excluir entidade, tente novamente']);
        }
    }
}