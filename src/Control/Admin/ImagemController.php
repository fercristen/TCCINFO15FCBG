<?php
/**
 * Criado: Fernando Cristen
 * Data: 18/11/2019
 * Hora: 02:10
 */

namespace Control\Admin;


use Estrutura\Controller\BaseController;
use Model\Imagem;

class ImagemController extends BaseController
{
    public function novaImagem($fileName, $persist = true){
        $nome = $_FILES[$fileName]['tmp_name'];
        $nomeAll = $_FILES[$fileName]['name'];
        $date = new \DateTime();
        $path = '/img/'.$date->format('dmYHis').$nomeAll;
        $target = __DIR__ .'/../../../utils'.$path;
        move_uploaded_file($nome, $target);
        $imagem = new Imagem();
        $imagem->setTitulo($nomeAll);
        $imagem->setNome($nomeAll);
        $imagem->setPatch($path);
        if($persist){
            $this->getEntityManager()->persist($imagem);
        }
        return $imagem;
    }
}