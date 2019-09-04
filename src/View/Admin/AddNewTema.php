<?php
/**
 * Criado: Fernando Cristen
 * Data: 03/09/2019
 * Hora: 21:35
 */

namespace View\Admin;


use Estrutura\View\BaseView;

class AddNewTema extends BaseView
{
    public function createHtml() {
        ?>
        <form method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nome</label>
                <input type="text" class="form-control" name="nome" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descricao</label>
                <textarea class="form-control" name="descricao" rows="2" required></textarea>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type ="submit" name="login">Gravar</button>
            <a class="btn btn-lg btn-primary btn-block" href="/logout">Logout</a>
        </form>
        <?php
    }
}
?>