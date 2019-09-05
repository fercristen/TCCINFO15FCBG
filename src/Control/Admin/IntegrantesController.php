<?php
/**
 * Criado: Fernando Cristen
 * Data: 03/09/2019
 * Hora: 21:59
 */

namespace Control\Admin;


use Model\Integrante;
use Estrutura\Controller\BaseController;
use Estrutura\Model\Resposta;

class IntegrantesController extends BaseController
{

    public function index()
    {
        $fields = [
            'id' => '#',
            'nome' => 'Nome',
            'cargo' => 'Cargo',
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
                'descricao' => $integrante->getCargo(),
            ];
        }
        return $dados;
    }
}
