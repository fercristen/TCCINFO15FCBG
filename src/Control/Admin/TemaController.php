<?php
/**
 * Criado: Fernando Cristen
 * Data: 03/09/2019
 * Hora: 20:22
 */

namespace Control\Admin;


use Estrutura\Controller\BaseController;
use Estrutura\Model\Resposta;
use Model\Tema;
use View\Admin\AddNewTema;

class TemaController extends BaseController
{

    public function index()
    {
        $fields = [
            'id' => '#',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
        ];
        $acoes = [
            'Adicionar' => 'addTema',
            'Editar' => 'editTema',
            'Visualizar' => 'viewTema',
            'Excluir' => 'deleteTema',
        ];
        $dados = $this->modeloParaGrid();
        $resposta = new Resposta($fields, $dados, $acoes);
        $resposta->getFormatoJSON();
    }

    public function modeloParaGrid()
    {
        $dados = [];
        /** @var $temas Tema[] */
        $temas = $this->getEntityManager()->getRepository(Tema::class)->findAll();
        foreach ($temas as $tema) {
            $dados[] = [
                'id' => $tema->getId(),
                'nome' => $tema->getNome(),
                'descricao' => $tema->getDescricao(),
            ];
        }
        return $dados;
    }

    public function add(){
        if($this->isPost()){
            try{
                $tema = new Tema();
                $tema->setNome($this->getDataParam('nome'));
                $tema->setDescricao($this->getDataParam('descricao'));
                $this->getEntityManager()->persist($tema);
                $this->getEntityManager()->flush();
                $this->redirectPage("/index");
            }catch (\Exception $exception){

                var_dump($tema);
            }
        }else{
            return new AddNewTema();
        }
    }
}