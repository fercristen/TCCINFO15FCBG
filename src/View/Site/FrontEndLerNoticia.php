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
        </br>
        </br>
        </br>

        <div class="container">
            <div style="text-align: center" id="titulo">
                <h1>
                    <?php
                    echo $this->noticia->getTitulo();
                    ?>
                </h1>
                <small style="vertical-align: inherit;"><i class="far fa-clock"></i>&nbsp;
                    <?php echo $this->noticia->getData()->format('d/m/Y')?>
                </small>
            </div>
            <div id="texton">
                <p><?php   echo $this->noticia->getCorpo();?></p>
                    <br><br>
            </div>

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