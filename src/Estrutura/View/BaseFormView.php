<?php
/**
 * Criado: Fernando Cristen
 * Data: 03/09/2019
 * Hora: 22:51
 */

namespace Estrutura\View;


use Estrutura\Controller\BaseController;

/**
 * Class BaseFormView
 * Usado em todos os forms do admin.
 * @package Estrutura\View
 */
abstract class BaseFormView extends BaseController
{
    private $html;

    private $dados;

    abstract public function createHtml();

    public function __construct()
    {
        parent::__construct();
        $this->setHtml($this->createHtml());
    }

    public function getFormatoJSON(){
        echo json_encode([
            'html' => $this->getHtml(),
            'dados' => $this->getDados(),
        ]);
    }

    /**
     * @return mixed
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param mixed $html
     */
    public function setHtml($html)
    {
        $this->html = $html;
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


}