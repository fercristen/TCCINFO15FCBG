<?php
/**
 * Criado: Fernando Cristen
 * Data: 13/08/2019
 * Hora: 22:48
 */

namespace View\Site;


use Estrutura\View\BaseView;
use Estrutura\View\Facilitador;
use Model\Noticia;

class FrontEndAllNoticiasView extends BaseView
{
    public function createHtml()
    {
        $noticias = $this->getEntityManager()->getRepository(Noticia::class)->findBy([], ['id' => 'desc']);
?>
        <?php Facilitador::createMenuSite() ?>
        <main style="margin-top: 75px" role="main" class="container">
            <h1 class="mt-5">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Notícias</font>
                </font>
            </h1>
            <div class="container">
                <div class="row">
                    <?php foreach ($noticias as $noticia){ ?>

                        <div class="col-sm-6">
                            <h2><?= $noticia->getTitulo();  ?></h2>
                            <div class="card shadow-sm">
                                <div class="bd-placeholder-img card-img-top" width="100%" height="225px">
                                    <img width="100%" height="225px"src="/utils/img/noticias/<?= $noticia->getId();?>.jpg">
                                </div>

                                <div class="card-body">
                                    <p style="height: 120px; overflow-y: auto; overflow-x: hidden;" class="card-text">
                                        <?= $noticia->getResumo()?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a  href="/ler?id=<?= $noticia->getId() ?>" class="btn btn-sm btn-primary">
                                                <font style="vertical-align: inherit;">
                                                    <span style="vertical-align: inherit;"><i class="fas fa-eye"></i>&nbsp;Ler</span>
                                                </font>
                                                </font>
                                            </a>
                                        </div>
                                        <small class="text-muted">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;"><i class="far fa-star"></i>&nbsp;15
                                                    Curtiram</font>
                                            </font>
                                        </small>
                                        <small class="text-muted">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;"><i class="far fa-clock"></i>&nbsp;9 min
                                                </font>
                                            </font>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </main>
        <?php Facilitador::createFooterSite()?>
<?php
    }
}