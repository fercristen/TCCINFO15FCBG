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
        <div class="entity_wrapper">
            <div class="entity_title">
                <h2> <?php
                    echo $this->noticia->getTitulo();
                    ?></h2>


            <div class="entity_thumb">
                <img class="img-responsive" src="" alt="imagem">
            </div>

               <p>
                    <?php   echo $this->noticia->getCorpo();?>
                </p>
            </div>

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