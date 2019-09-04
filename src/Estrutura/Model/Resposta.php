<?php
/**
 * Criado: Fernando Cristen
 * Data: 02/09/2019
 * Hora: 23:43
 */

namespace Estrutura\Model;


class Resposta
{
    private $fields;

    private $dados;

    private $acoes;

    public function __construct($fields, $dados, $acoes)
    {
        $this->fields = $fields;
        $this->dados = $dados;
        $this->acoes = $acoes;
    }

    public function getFormatoJSON(){
        echo json_encode(['fields' => $this->getFields(), 'dados' => $this->getDados(), 'acoes' => $this->getAcoes()]);
    }

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param mixed $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }


    /**
     * @return mixed
     */
    public function getDados()
    {
        return $this->dados;
    }

    /**
     * @param mixed $dados
     */
    public function setDados($dados)
    {
        $this->dados = $dados;
    }

    /**
     * @return mixed
     */
    public function getAcoes()
    {
        return $this->acoes;
    }

    /**
     * @param mixed $acoes
     */
    public function setAcoes($acoes)
    {
        $this->acoes = $acoes;
    }

}