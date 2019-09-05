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
            <div id="titulo">
                <h1><?php
                    echo $this->noticia->getTitulo();
                    ?></h1>
            </div>
            <div class="imagemnoticia">
                <img src="http://noticias.ibirama.ifc.edu.br/wp-content/uploads/sites/2/2018/08/posse_11.jpg" alt="IMAGEMGREMIO<?php ?>" height="70%" width="75%">
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