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
        <!-- <link rel="stylesheet" type="text/css" href="{url}assets/fonts/elegant-font/html-css/style.css"> -->
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
                                    <form method="POST" action="{url}BuscaProduto/buscarProduto" class="form-inline form-pesquisar-produto">
                                        <div class="of-hidden">
                                            <input class="form-control" type="text" name="nome" placeholder="Buscar produto...">
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
                        <a href="{url}Login" class="header-wrapicon1 dis-block">Login</a>
                        <span class="linedivide1"></span>
                        <a href="{url}Cadastro" class="header-wrapicon1 dis-block">Cadastre-se</a>
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
                        <a href="{url}Login" class="header-wrapicon1 dis-block" id="botaoLogin">Login</a>
                        <span class="linedivide2"></span>
                        <a href="{url}Cadastro" class="header-wrapicon1 dis-block">Cadastre-se</a>
                    </div>

                    <div class="btn-show-menu-mobile">
                        <!-- fazer pesquisa no mobile -->
                        <button class="flex-c-m size5 color2 color0-hov">
                            <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Menu Mobile -->

        </header>
