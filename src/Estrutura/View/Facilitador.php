<?php
/**
 * Criado: Fernando Cristen
 * Data: 18/08/2019
 * Hora: 21:08
 */

namespace Estrutura\View;


use Estrutura\Controller\BaseController;
use Estrutura\Model\Mensagem;
use Model\Tema;

class Facilitador
{
    public static function createTemplateAdmin(){
        $mensagemSuccess = Mensagem::getMessageSuccess();
        $mensagemErro = Mensagem::getMessageErro();
        $baseControl = new BaseController();
        $usuario = $baseControl->getUserSession();
        $usuario = $usuario[0]['usu_login'];
       echo '<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Grêmio Gerenciamento</title>
  <link href="utils/css/bootstrap.min.css" rel="stylesheet">
  <link href="utils/css/simple-sidebar.css" rel="stylesheet">
  <link href="utils/css/datable.css" rel="stylesheet">
  <link href="utils/css/admin.css" rel="stylesheet">
  <script src="utils/js/jquery.min.js"></script>
  <script src="utils/js/admin-controller.js"></script>
  <script src="utils/js/datatable.js"></script>
  <script src="utils/js/datatablebootstrap.js"></script>
  <script src="utils/js/bootstrap.js"></script>

</head>

<body>

  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="logo-menu">
        <img class="center" src="/utils/img/login.png">
      </div>
      <div class="sidebar-heading">&nbsp;</div>
      <div class="list-group list-group-flush">
        <button onclick="selectMenu(\'noticias\')" class="list-group-item list-group-item-action bg-light">Noticias</button>
        <button onclick="selectMenu(\'temas\')" class="list-group-item list-group-item-action bg-light">Temas</button>
        <button onclick="selectMenu(\'integrantes\')"  class="list-group-item list-group-item-action bg-light">Integrantes</button>
        <button onclick="selectMenu(\'gremios\')"  class="list-group-item list-group-item-action bg-light">Grêmio</button>
        <button onclick="selectMenu(\'movimentacao\')"  class="list-group-item list-group-item-action bg-light">Movimentações</button>
        <button onclick="selectMenu(\'banners\')"  class="list-group-item list-group-item-action bg-light">Banners</button>
        <button onclick="selectMenu(\'usuarios\')"  class="list-group-item list-group-item-action bg-light">Usuários</button>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-light" id="menu-toggle">X</button>
        <span class="bem-vindo">&nbsp;Bem-vindo(a): '.$usuario.'</span>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a style="text-align: center" class="btn btn-md btn-danger" href="/logout">Sair<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>
      <div id="append" class="container-fluid">
        '.$mensagemErro.'
        '.$mensagemSuccess.'
      <!-- Lugar onde coloca o conteudo da tela -->
      </div>
    </div>
  </div>
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>
';
    }

    public static function createMenuSite(){
        $baseController = new BaseController();
        $temas = $baseController->getEntityManager()->getRepository(Tema::class)->findAll();
        ?>
        <style>
            .color-base{
                background-color: rgb(9, 99, 24)!important;
            }
            a{
                color: white;
            }
            a:hover{
                color: white;
            }
        </style>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top color-base">
                <a class="navbar-brand" href="/index">
                    <img style="border-radius: 100px!important; width: 40px;" src="/utils/img/logo.png"> Grêmio IFC
                </a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarCollapse" style="">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/index">
                                <i class="fas fa-home"></i>&nbsp;Ínicio
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="far fa-newspaper"></i> Noticias</a>
                            <div class="dropdown-menu">
                                <?php foreach ($temas as $tema){ ?>
                                    <a class="dropdown-item" href="/allNotices?tema=<?= $tema->getId()?>"><?=$tema->getNome()?></a>
                                <?php } ?>
                                <a class="dropdown-item" href="/allNotices">Todas Notícias</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">
                                <i class="fas fa-receipt"></i>&nbsp;Sobre Nós
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/movimentacoes">
                                <i class="fas fa-money-check-alt"></i>&nbsp;Movimentações
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
<!--                    <form class="form-inline mt-2 mt-md-0">-->
<!--                        <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar palavra chave"-->
<!--                               aria-label="Search">-->
<!--                        <button class="btn btn-danger my-2 my-sm-0" type="submit">Buscar</button>-->
<!--                    </form>-->
                </div>
            </nav>
        </header>
        <?php
    }

    public static function createFooterSite(){
        ?>
        <footer style="background-color: #343a40!important; margin-top: 45px;" class="page-footer font-small blue footer">
            <div style="color: white" class="footer-copyright text-center py-3">TCC INFO17 <a href=""> Bruno Garbari &
                    Fernando Cristen </a>
            </div>
            <div class="footer-copyright text-center py-3">
                <a href="/login" class="btn btn-sm btn-info"><i class="fas fa-user-shield"></i> Admin</a>
            </div>
        </footer>
        <?php
    }
}