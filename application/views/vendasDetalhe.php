<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
{pedido}
<div class="divPedido" data-idPedido="{idPedido}">
    <div class="divRow">
        <div class="coluna-1venda">{idPedido}</div>
        <div class="coluna-2venda">{nomeCliente}</div>
        <div class="coluna-3venda">
            <button class="botao-venda flex-c-m size10 bg1 bo-rad-23 hov1 m-text3 trans-0-4"  rel="{idPedido}">Ver datalhes</button>
        </div>
    </div>
    <div id="{idPedido}" class="containerTab" data-estado="">
        <div class="tableVenda">
            <div class="tableVenda-Row">
                <div class="tableVenda-Titulo">Informações do cliente</div>
            </div>
            <div>
                <div class="column-item">Teletone</div>
                <div class="column-dado">{telefone}</div>
                <div class="column-item2">Cidade</div>
                <div class="column-dado2">{cidade}</div>
            </div>
            <div>
                <div class="column-item">CPF</div>
                <div class="column-dado">{cpf}</div>
                <div class="column-item2">Estado</div>
                <div class="column-dado2">{estado}</div>
            </div>
            <div>
                <div class="column-item">E-mail</div>
                <div class="column-dado">{email}</div>
                <div class="column-item2">Cep</div>
                <div class="column-dado2">{cep}</div>
            </div>
            <div>
                <div class="column-item">Data do Pedido</div>
                <div class="column-dado">{data}</div>

            </div>
            <div>
                <div class="column-item2">Bairro</div>
                <div class="column-dado2">{bairro}</div>
                <div class="column-item2">Rua</div>
                <div class="column-dado2">{rua}</div>
            </div>
            <div>
                <div class="column-item2">Número</div>
                <div class="column-dado2">{numero}</div>
            </div>
        </div>
        <br>
        <div class="divTable2">
            <div class="divTable2-Row">
                <div class="column-1dentro">Quantidade</div>
                <div class="column-2dentro">Nome do Produto</div>
                <div class="column-3dentro">Código do Produto</div>
            </div>
            {detalheProduto}
            <div>
                <div class="column-1elemento">{quantidade}</div>
                <div class="column-2elemento nomeProduto"><a class="linkProduto" href="#">{nomeProduto}</a></div>
                <div class="column-3elemento">{idProduto}</div>
            </div>
            {/detalheProduto}
        </div>
        <div class="pos-center p-b-5 p-t-5 div-botoes-pedido">
            <button class="size10 bg1 bo-rad-23 hov1 m-text3 trans-0-4 p-r-3 btnAlterar" data-idPedido="{idPedido}" data-statusAtual="{status}" data-toggle="modal" data-target="#modalGeral">
                Preparar pedido
            </button>
            <button class="size10 bg1 bo-rad-23 hov1 m-text3 trans-0-4 btnCancelar" data-idPedido="{idPedido}" data-toggle="modal" data-target="#modalGeral">
                Cancelar compra
            </button>
        </div>
    </div>
</div>
{/pedido}
