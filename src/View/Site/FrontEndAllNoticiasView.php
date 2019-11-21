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
use Model\NoticiaImagem;
use Model\Tema;

class FrontEndAllNoticiasView extends BaseView
{
    public function createHtml()
    {
        $tema = $this->getResquestParam('tema');
        $titulo = 'Todas Notícias';
        if($tema){
            $tema = $this->getEntityManager()->getRepository(Tema::class)->find($tema);
            $titulo = $tema->getNome();
            $noticias = $this->getEntityManager()->getRepository(Noticia::class)->findBy(['tema' => $tema], ['id' => 'desc']);
        }else{
            $noticias = $this->getEntityManager()->getRepository(Noticia::class)->findBy([], ['id' => 'desc']);
        }
        $temNoticia = count($noticias);
?>
        <?php Facilitador::createMenuSite() ?>
        <main style="margin-top: 75px" role="main" class="container">
            <h1 class="mt-5">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;"><?= $titulo?></font>
                </font>
            </h1>
            <div class="container">
                <div class="row">
                    <?php foreach ($noticias as $noticia){
                        /** @var  $imagemNoticia NoticiaImagem*/
                        $imagemNoticia = $this->getEntityManager()->getRepository(NoticiaImagem::class)->findOneBy(['noticia'=> $noticia]);
                        $patch = $imagemNoticia->getImagem()->getPatch();
                        ?>

                        <div onclick="location.href='/ler?id=<?= $noticia->getId() ?>';" style="cursor: pointer" class="col-sm-6">
                            <div>
                                <span><?= $noticia->getTema()->getNome();  ?></span>
                            </div>
                            <h2><?= $noticia->getTitulo();  ?></h2>
                            <div class="card shadow-sm">
                                <div class="bd-placeholder-img card-img-top" width="100%" height="225px">
                                    <img width="100%" height="225px" src="/utils/<?= $patch ?>">
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
                                                <font style="vertical-align: inherit;"><i class="far fa-clock"></i>&nbsp;<?= $noticia->getData()->format('d/m/Y')?>
                                                </font>
                                            </font>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    if($temNoticia < 1){
                        echo '<br><br><br><div class="alert alert-success col-sm-12" style="text-align: center"><h3>Nenhuma Notícia Encontrada</h3></div>';
                    }
                    ?>
                </div>
            </div>
        </main>
<?php
    }
}