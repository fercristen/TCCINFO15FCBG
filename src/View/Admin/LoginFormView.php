<?php
/**
 * Criado: Fernando Cristen
 * Data: 13/08/2019
 * Hora: 22:57
 */

namespace View\Admin;


use Estrutura\View\BaseView;

class LoginFormView extends BaseView
{
    public function createHtml()
    {
        ?>

        <form style="padding: 20%" class="form-signin" role = "form" action="" method="post">
            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus></br>
            <input type="password" class="form-control" name="password" placeholder="Senha" required>
            <br/>
            <button class="btn btn-lg btn-primary btn-block" type ="submit" name="login">Entrar</button>
        </form>
        <?php
    }
}