<?php
/**
 * Criado: Fernando Cristen
 * Data: 13/08/2019
 * Hora: 22:57
 */

namespace View\Admin;


use Estrutura\Controller\BaseController;
use Estrutura\Model\Mensagem;
use Estrutura\View\BaseView;

class LoginFormView extends BaseView
{
    public function createHtml()
    {
        $mensagemErro = Mensagem::getMessageErro();
        ?>
        <style>
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
            }
            .col-sm-6{
                padding: 5px;
            }
        </style>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Login</h5>
                            <img class="center" src="/utils/img/login.png">
                            <form class="form-signin" role = "form" action="" method="post">
                                <div class="form-label-group">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Login" required autofocus>
                                </div>
                                <br/>
                                <div class="form-label-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>
                                </div>
                                <br/>
                                <div class="col-sm-12">
                                    <div class="col-sm-6 float-left">
                                        <a class="btn btn-lg btn-danger btn-block" href="/">Cancelar&nbsp;<i class="far fa-window-close"></i></a>
                                    </div>
                                    <div class="col-sm-6 float-right">
                                        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Entrar&nbsp;<i class="fas fa-sign-in-alt"></i></button>
                                    </div>
                                </div>
                                <br>
                                <?=$mensagemErro?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}