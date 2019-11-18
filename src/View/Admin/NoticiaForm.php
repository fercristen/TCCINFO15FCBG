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
            $botao = '<button class="btn btn-lg btn-primary btn-block" type ="submit">Gravar</button>';
        }
        return '
        <script src="utils/js/editor.js"></script>
        <form action="'.$this->getRouter().'" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="id">#</label>
                <input type="text" readonly="readonly" class="form-control" name="id">
            </div>
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="titulo">Resumo</label>
                <input class="form-control" name="resumo" required>
            </div>
            <div class="form-group">
                <label>Conteudo</label>
                <textarea class="form-control" name="corpo" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label>Imagem Capa</label>
                <input accept="image/*" type="file" class="form-control" required name="capa" >
            </div>
            '.$botao.'
        </form>
        <script>
            $(document).ready(function () {
                nicEditors.allTextAreas()
            });
        </script>';
    }
}
?>
