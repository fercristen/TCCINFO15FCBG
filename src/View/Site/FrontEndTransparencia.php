<?php
        /**
         * Criado: Fernando Cristen
         * Data: 05/09/2019
         * Hora: 09:10
         */

        namespace View\Site;

        use Estrutura\View\BaseView;
        use Estrutura\View\Facilitador;

        class FrontEndTransparencia extends BaseView {

            public function createHtml(){

                Facilitador::createMenuSite();

                ?>
                <style>
                    h4{
                        font-size: 40px;
                        margin: 0;
                    }
                    h5{
                        font-size: 25px;
                        margin: 0;
                    }
                    h6{
                        font-size: 20px;
                    }
                    .session{
                        background-color: #ddd;
                        border-radius: .25rem;
                        width: 100%;
                    }

                    .classe{
                        text-align: center;
                        margin: 0 auto;
                        width: 50%;
                    }

                </style>
                <br />
                <br />
                <br />
                <br />
                <h1 style="text-align: center">Funcionalidade em desenvolvimento.</h1>
                <br />
                <br />
                <div class="classe">
                    <div class="session">
                        <h4>Quem somos?</h4>
                        <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                            inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                            sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam
                            eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea
                            commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
                    </div>
                    <div class="session">
                        <h4>O que fazemos?</h4>
                        <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                            totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo .
                            Nemo enim ipsam voluptatem quia
                            voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
                            voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
                            sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem
                            ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                            consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
                    </div>
                    <div class="session">
                        <h4>Qual nosso objetivo?</h4>
                        <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,
                            qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                            Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
                    </div>
                </div>
                </div>
                <?php Facilitador::createFooterSite()?>
            <?php
            }
        }