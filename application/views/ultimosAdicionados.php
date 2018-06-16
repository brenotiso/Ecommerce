<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
{produtos}
<div class="item-slick2 p-l-15 p-r-15">
    <div class="block2">
        <div class="block2-img wrap-pic-w of-hidden pos-relative">
            <img src="{url}assets/images/item-02.jpg" alt="IMG-{nome}">

            <div class="block2-overlay trans-0-4">
                <div class="block2-btn-addcart w-size1 trans-0-4 add-cart-{logado}" data-idProduto="{id}">
                    <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">Adicionar ao carrinho</button>
                </div>
            </div>
        </div>

        <div class="block2-txt p-t-20">
            <a href="product-detail.html" id="divNomeProduto" class="block2-name dis-block s-text3 p-b-5">{nome}</a>
            <span class="block2-price m-text6 p-r-5">R$ {preco}</span>
        </div>
    </div>
</div>
{/produtos}