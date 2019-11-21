<?php
/**
 * Criado: Fernando Cristen
 * Data: 05/09/2019
 * Hora: 09:10
 */

namespace View\Site;

use Estrutura\View\BaseView;
use Estrutura\View\Facilitador;
use Model\Gremio;

class FrontEndTransparencia extends BaseView
{

    public function createHtml()
    {

        Facilitador::createMenuSite();
        /** @var $gremio Gremio*/
        $gremio = $this->getEntityManager()->getRepository(Gremio::class)->findOneBy(['mandatoAtual' => true]);
        $sobreNos = '';
        if($gremio){
            $sobreNos = $gremio->getDescricao();
        }
        ?>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
            <?= $sobreNos ?>
        </div>
        <?php
    }
}