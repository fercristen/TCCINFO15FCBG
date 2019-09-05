<?php
/**
 * Criado: Fernando Cristen
 * Data: 14/08/2019
 * Hora: 16:54
 */

namespace View\Admin;


use Estrutura\View\BaseFormView;

class NoticiaForm extends BaseFormView
{
    public function createHtml() {
        $botao = '';
        if(!$this->getisView()){
            $botao = '<button class="btn btn-lg btn-primary btn-block" type ="submit" name="login">Gravar</button>';
        }
        return '
        <form action="'.$this->getRouter().'" method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">#</label>
                <input type="text" readonly="readonly" class="form-control" name="id">
            </div>
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
            '.$botao.'
        </form>';
    }
}
?>
