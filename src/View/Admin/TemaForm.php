<?php
/**
 * Criado: Fernando Cristen
 * Data: 03/09/2019
 * Hora: 21:35
 */

namespace View\Admin;


use Estrutura\View\BaseFormView;

class TemaForm extends BaseFormView
{
    public function createHtml() {
        return '
        <form action="'.$this->getRouter().'" method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nome</label>
                <input type="text" class="form-control" name="nome" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descricao</label>
                <textarea class="form-control" name="descricao" rows="2" required></textarea>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type ="submit" name="login">Gravar</button>
        </form>
        ';
    }
}
?>