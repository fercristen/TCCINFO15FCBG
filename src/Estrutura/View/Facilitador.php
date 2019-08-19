<?php
/**
 * Criado: Fernando Cristen
 * Data: 18/08/2019
 * Hora: 21:08
 */

namespace Estrutura\View;


class Facilitador
{
    public static function createMenuSite(){
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
                <a class="navbar-brand" href="#">
                    <img style="border-radius: 100px!important; width: 40px;" src="https://instagram.fbnu1-1.fna.fbcdn.net/vp/58d4940bd52d25917da8160e0c5b1494/5D6B3F78/t51.2885-19/s150x150/42002380_312572049523427_3211460447240716288_n.jpg?_nc_ht=instagram.fbnu1-1.fna.fbcdn.net"> Grêmio IFC
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
                        <li class="nav-item">
                            <a class="nav-link" href="/allNotices">
                                <i class="far fa-newspaper"></i>&nbsp;Todas Notícias
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Transparencia.html">
                                <i class="fas fa-receipt"></i>&nbsp;Transparência
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
                    <form class="form-inline mt-2 mt-md-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar palavra chave"
                               aria-label="Search">
                        <button class="btn btn-danger my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
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