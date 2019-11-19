<?php
/**
 * Criado: Fernando Cristen
 * Data: 05/09/2019
 * Hora: 09:10
 */

namespace View\Site;

use Estrutura\View\BaseView;
use Estrutura\View\Facilitador;

class FrontEndTransparencia extends BaseView
{

    public function createHtml()
    {

        Facilitador::createMenuSite();

        ?>
        <style>
            h4 {
                font-size: 40px;
                margin: 0;
            }

            h5 {
                font-size: 25px;
                margin: 0;
            }

            h6 {
                font-size: 20px;
            }

            .session {
                background-color: #ddd;
                border-radius: .25rem;
                width: 100%;
            }

            .classe {
                text-align: center;
                margin: 0 auto;
                width: 50%;
            }

        </style>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="classe">
            <div class="session">
                <h4>Quem somos?</h4>
                <p>"O Grêmio estudantil é a entidade responsável por representar os estudantes na instituição de ensino, é através dele
                    que os alunos podem criar e discutir ações para aumentar a sua participação nas decisões que afetam seu convívio na
                    instituição de ensino.
                    "</p>
            </div>
            <div class="session">
                <h4>Qual nosso objetivo?</h4>
                <p>"O objetivo principal do Grêmio Estudantil é aumentar a participação dos estudantes nas atividades acadêmicas e nas decisões que impactam toda
                    a instituição de ensino, promovendo discussões sobre melhorias, projetos e eventos,  visando melhorar a
                    qualidade de ensino e convívio dentro do campus. Para que isso aconteça só é possível, pois os estudantes possuem um órgão que
                    os representa, e que fica encarregado de ouvir diferentes ideias e por meios legais busca a sua implementação."</p>
            </div>
        </div>
        </div>
        <?php
    }
}