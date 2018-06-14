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
        <p class="hidden" id="nenhumaVanda">Nenhuma venda realizada ainda.</p>
        <div class="container-table-cart pos-relative" data-vazio="{vazio}">
            <div class="wrap-table-shopping-cart bgwhite">
                <div class="divTable">

                    <div class="headRow">
                        <div class="coluna-1v">Pedido</div>
                        <div class="coluna-2v">Nome do cliente</div>
                        <div class="coluna-3v"></div>
                    </div>

                    {pedido}
                    <div class="divPedido" data-idPedido="{idPedido}">
                        <div class="divRow">
                            <div class="coluna-1venda">{idPedido}</div>
                            <div class="coluna-2venda">{nomeCliente}</div>
                            <div class="coluna-3venda">
                                <button class="botao-venda flex-c-m size10 bg1 bo-rad-23 hov1 m-text3 trans-0-4" onclick="buttonToggle(this, 'View ', 'Hide ')" rel="{idPedido}">Ver datalhes</button>
                            </div>
                        </div>
                        <div id="{idPedido}" class="containerTab">
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
                                    <div class="column-2elemento">{nomeProduto}</div>
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
                        {/pedido}
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

