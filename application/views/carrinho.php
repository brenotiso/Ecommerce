<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({url}assets/images/heading-pages-01.jpg);">
    <h2 class="l-text2 t-center">
        Carrinho
    </h2>
</section>

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
    <p class="{temProduto}" type="">Você ainda não tem nenhum produto no seu carrinho :(</p>
    <div class="container {vazio}">
        <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <table class="table-shopping-cart">
                    <tr class="table-head">
                        <th class="column-1"></th>
                        <th class="column-2">Produto</th>
                        <th class="column-3">Preço</th>
                        <th class="column-4 pos-center">Quantidade</th>
                        <th class="column-5">Total</th>
                    </tr>
                    {itensCarrinho}
                    <tr class="table-row">
                        <td class="column-1">
                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                <img height="121" src="{url}assets/images/{img}" alt="IMG-PRODUCT">
                            </div>
                        </td>
                        <td class="column-2">
                            <a href="produto/{id}" class="header-cart-item-name">{name}</a>
                        </td>
                        <td class="column-3">R$ {price}</td>
                        <td class="column-4 p-l-100">
                            <div class="flex-w bo5 of-hidden w-size17 ">
                                <input class="input-rowid" type="hidden" value="{rowid}">
                                <input class="input-idProduto" type="hidden" value="{id}">
                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>
                                <input class="size8 m-text18 t-center num-product" type="number" value="{qty}">
                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </td>
                        <td class="column-5">R$ {subtotal}</td>
                    </tr>
                    {/itensCarrinho}
                    <tr class="table-row">
                        <td class="column-1"></td>
                        <td class="column-2"></td>
                        <td class="column-3"></td>
                        <td class="column-4"></td>
                        <td class="column-5">R$ {totalCompra}</td>
                    </tr>

                </table>
            </div>
        </div>

        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
            <div class="flex-w flex-m w-full-sm">
                <div class="size11 trans-0-4 m-t-10 m-b-10 m-r-10">
                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" id="atualizarCarrinho">Atualizar carrinho</button>
                </div>
            </div>

            <div class="size11 trans-0-4 m-t-10 m-b-10">
                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" id="finalizarCompra">Finalizar compra</button>
            </div>
        </div>

    </div>
</section>