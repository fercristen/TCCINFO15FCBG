<?php
/**
 * Criado: Fernando Cristen
 * Data: 14/08/2019
 * Hora: 16:54
 */

namespace View\Admin;


use Estrutura\View\BaseView;

class AddNewNotice extends BaseView
{
    public function createHtml() {
        ?>
        <form method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Titulo</label>
                <input type="text" class="form-control" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Resumo</label>
                <textarea class="form-control" name="resumo" rows="2" required></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Conteudo</label>
                <textarea class="form-control" name="corpo" rows="5" required></textarea>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type ="submit" name="login">Gravar</button>
        </form>
        <?php
    }
}
?>
