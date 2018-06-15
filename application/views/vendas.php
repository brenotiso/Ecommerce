<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({url}assets/images/heading-pages-01.jpg);">
    <h2 class="l-text2 t-center">
        Vendas realizadas
    </h2>
</section>

<section class="cart bgwhite p-t-70 p-b-150">
    <div class="container">
        <p class="hidden" id="nenhumaVenda">Nenhuma venda realizada ainda.</p>
        <div class="container-table-cart pos-relative" data-vazio="{vazio}">
            <div class="input-group p-b-7 pos-center ">
                <input class="inputPesquisa" id="inputPesquisa" type="text" placeholder="Pesquisar cliente">
                <span class="input-group-btn">
                    <button class="btn btn-primary" id="pesquisarCliente">
                        <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                    </button>
                </span>
            </div>
            <p class="hidden" id="nenhumaVendaCliente">Nenhuma venda realizada ainda para o cliente</p>
            <div class="wrap-table-shopping-cart bgwhite">
                <div class="divTable">
                    <div class="headRow">
                        <div class="coluna-1v">Pedido</div>
                        <div class="coluna-2v">Nome do cliente</div>
                        <div class="coluna-3v"></div>
                    </div>
                    <div id="todosPedidos">
                        {todosPedidos}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<!-- Modal mudar status-->
<div class="modal fade" id="modalGeral" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLabel"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="idPedido hidden"></div>
            <div class="modal-footer">
                <button type='button' class='btn btn-danger btnModal' id=''>Cancelar</button>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button>
            </div>
        </div>
    </div>
</div>

