<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>E-commerce</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="{url}assets/images/icons/favicon.png" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{url}assets/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{url}assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{url}assets/fonts/themify/themify-icons.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{url}assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{url}assets/vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{url}assets/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{url}assets/vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{url}assets/vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{url}assets/vendor/slick/slick.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{url}assets/vendor/lightbox2/css/lightbox.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{url}assets/css/util.css">
        <link rel="stylesheet" type="text/css" href="{url}assets/css/main.css">
        <!--===============================================================================================-->
    </head>

    <body class="animsition">

        <!-- Header -->
        <header class="header1">
            <!-- Header desktop -->
            <div class="container-menu-header">

                <div class="wrap_header">
                    <!-- Logo -->
                    <a href="{url}" class="logo" id="linkHome">
                        <h1>E-commerce</h1>
                    </a>

                    <!-- Menu -->
                    <div class="wrap_menu">
                        <nav class="menu">
                            <ul class="main_menu">
                                <li>
                                    <form class="form-inline form-pesquisar-produto">
                                        <div class="of-hidden">
                                            <input class="form-control" type="text" name="search-product" placeholder="Buscar produto...">
                                            <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4" type="submit">
                                                <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <!-- Header Icon -->
                    <div class="header-icons">
                        <div class="header-wrapicon2">					
                            <div class="header-wrapicon1 dis-block js-show-header-dropdown">
                                <img src="{url}assets/images/icons/icon-header-01.png" class="header-icon1">
                            </div>
                            <!-- Pop usuaio  -->
                            <div class="header-cart header-dropdown">
                                <ul class="header-cart-wrapitem">
                                    <li class="header-cart-item pos-center">	
                                        <a href="{url}Usuario/Dados"><i class="fa fa-user-o p-r-2" aria-hidden="true"></i>Meus Dados</a>
                                    </li>
                                    <li class="header-cart-item pos-center">
                                        <a href="{url}Usuario/Compras"><i class="fa fa-list-ul p-r-2" aria-hidden="true"></i></i>Minhas Compras</a>
                                    </li>
                                    {opcoesAdmin}
                                    <li class="header-cart-item pos-center">
                                        <a href="{url}Login/sair"><i class="fa fa-sign-out p-r-2" aria-hidden="true"></i></i>Sair</a><br>
                                    </li>
                                </ul>
                            </div>	
                        </div>				

                        <span class="linedivide2"></span>

                        <div class="header-wrapicon2 div-carrinho-referencia" data-href="{url}Carrinho">
                            <img src="{url}assets/images/icons/icon-header-02.png" class="header-icon1">
                            <!-- Quantidade de itens no carrinho -->
                            <span class="header-icons-noti">{qtdCarrinho}</span>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- Header Mobile -->
            <div class="wrap_header_mobile">
                <!-- Logo moblie -->
                <a href="{url}" class="logo-mobile">
                    <h2>E-commerce</h2>
                </a>

                <!-- Button show menu -->
                <div class="btn-show-menu">
                    <!-- Header Icon mobile -->
                    <div class="header-icons-mobile">
                        <div class="header-wrapicon2">
                            <img src="{url}assets/images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown">
                        </div>
                        <!-- Pop usuario  -->
                        <div class="header-cart header-dropdown">
                            <ul class="header-cart-wrapitem">
                                <li class="header-cart-item">	
                                    <a href="{url}Usuario/Dados"><i class="fa fa-user-o" aria-hidden="true"></i>Meus Dados</a>
                                </li>
                                <li class="header-cart-item">
                                    <a href="{url}Usuario/Compras"><i class="fa fa-list-ul" aria-hidden="true"></i></i>Minhas Compras</a>
                                </li>
                                {opcoesAdmin}
                                <li class="header-cart-item">
                                    <a href="{url}Login/sair"><i class="fa fa-sign-out" aria-hidden="true"></i></i>Sair</a><br>
                                </li>
                            </ul>
                        </div>	
                    </div>

                    <div class="header-wrapicon2 div-carrinho" data-href="{url}Carrinho">
                        <img src="{url}assets/images/icons/icon-header-02.png" class="header-icon1" alt="ICON">
                        <span class="header-icons-noti">{qtdCarrinho}</span>
                    </div>
                </div>
            </div>

            <!-- Menu Mobile -->

        </header>
