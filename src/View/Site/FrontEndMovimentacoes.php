<?php
/**
 * Criado: Fernando Cristen
 * Data: 18/11/2019
 * Hora: 01:29
 */

namespace View\Site;


use Estrutura\View\BaseView;
use Estrutura\View\Facilitador;
use Model\Movimentacao;

class FrontEndMovimentacoes extends BaseView
{

    public function createHtml()
    {

        Facilitador::createMenuSite();
        /** @var $entradas Movimentacao[]*/
        $entradas = $this->getEntityManager()->getRepository(Movimentacao::class)->findBy(['tipo' => Movimentacao::TIPO_ENTRADA], ['id' => 'desc']);
        /** @var $saidas Movimentacao[]*/
        $saidas = $this->getEntityManager()->getRepository(Movimentacao::class)->findBy(['tipo' => Movimentacao::TIPO_SAIDA], ['id' => 'desc']);
        ?>
        <main style="margin-top: 75px" role="main" class="container">
            <div class="col-sm-12">
                <div style="float: left" class="col-sm-3 col-md-6">
                    <h4>Entradas&nbsp;<i class="fas fa-sign-in-alt"></i></h4>
                    <?php foreach ($entradas as $entrada){
                        echo
                        '<fieldset style="border-bottom: solid 1px gray">
                            <legend>'.$entrada->getTitulo().'</legend>
                            <span>'.$entrada->getDescricao().'</span>
                         </fieldset>';
                    }?>
                </div>
                <div style="float: right" class="col-sm-3 col-md-6">
                    <h4>Saídas&nbsp;<i class="fas fa-sign-out-alt"></i></h4>
                    <?php foreach ($saidas as $saida){
                        echo
                            '<fieldset style="border-bottom: solid 1px gray">
                            <legend>'.$saida->getTitulo().'</legend>
                            <span>'.$saida->getDescricao().'</span>
                         </fieldset>';
                    }?>
                </div>
            </div>
        </main>
         <?php
    }
}