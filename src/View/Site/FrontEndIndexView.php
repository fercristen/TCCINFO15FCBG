<?php


namespace View\Site;


use Estrutura\View\BaseView;
use Estrutura\View\Facilitador;
use Model\Noticia;

class FrontEndIndexView extends BaseView
{

    public function createHtml()
    {
        $noticias = $this->getEntityManager()->getRepository(Noticia::class)->findBy([], ['id' => 'desc'], 6);
        ?>

       <?php Facilitador::createMenuSite() ?>
        <main style="margin-top: 75px" role="main" class="container">
            <div style="margin: 20px;" id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="http://ibirama.ifc.edu.br/wp-content/uploads/2016/12/banner_Site-1140x168-1350x200.png"
                             class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="http://ibirama.ifc.edu.br/wp-content/uploads/2019/04/Fullbanner-IFC-Drops-1350x200.png"
                             class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="http://ibirama.ifc.edu.br/wp-content/uploads/2019/01/Fullbanner-Segunda-Chamada-1350x200.gif"
                             class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
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
                                    <img width="100%" height="225px"
                                         src="/utils/img/noticias/<?= $noticia->getId();?>.jpg">
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
            <br/>
            <div style="text-align: center">
                <a class="btn btn-lg btn-success" href="/allNotices">
                    <i class="far fa-newspaper"></i>&nbsp;Todas Notícias
                    <span class="sr-only">(current)</span>
                </a>
            </div>
        </main>
       <?php Facilitador::createFooterSite() ?>
        <?php
    }

}