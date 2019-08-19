<?php
/**
 * Criado: Fernando Cristen
 * Data: 18/08/2019
 * Hora: 21:02
 */

namespace View\Site;


use Estrutura\View\BaseView;
use Estrutura\View\Facilitador;

class FrontEndLerNoticia extends BaseView
{
    protected $noticia;

    public function __construct($noticia)
    {
        $this->setNoticia($noticia);
        parent::__construct();
    }

    public function createHtml()
    {
        Facilitador::createMenuSite();
        ?>
        <?php
    }

    /**
     * @return mixed
     */
    public function getNoticia()
    {
        return $this->noticia;
    }

    /**
     * @param mixed $noticia
     */
    public function setNoticia($noticia)
    {
        $this->noticia = $noticia;
    }

}