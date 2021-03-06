<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({url}assets/images/heading-pages-01.jpg);">
    <h2 class="l-text2 t-center">
        Manter Produtos
    </h2>
</section>

<section class="bgwhite p-t-70 p-b-100">
    <div class="container">
        <div id="top" class="row">
            <div class="col-sm-3">
                <h2>Produtos</h2>
            </div>
            <div class="col-sm-6">

                <div class="input-group h2">
                    <input class="form-control" id="inputPesquisa" type="text" placeholder="Pesquisar produto">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" id="pesquisarProduto">
                            <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                        </button>
                    </span>
                </div>

            </div>
            <div class="col-sm-3">
                <button class="btn btn-primary pull-right h2" data-toggle="modal" data-target="#add-modal">Novo Produto</button>
            </div>
        </div> <!-- /#top -->

        <hr />
        <p class="p-b-150 hidden{pVazio}" id="nenhumaVenda">Nenhum produto cadastrado.</p>
        <p class="hidden" id="nenhumaPordutoNome">Nenhum produto cadastrado com esse nome.</p>
        <div class="table-responsive col-md-12 {vazio}">
            <table class="table table-hover" id="tabelaProdutos">
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Preço (R$)</th>
                    <th>Data adição</th>
                    <th class="actions">Ações</th>
                </tr>
                {produtos}
            </table>
        </div>

    </div> 
    
</section>

<!-- Modal Add Produto-->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLabel">Adicionar Produto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            </div>
            <form type="multipart" id="formAdicionarProduto" method="POST" action="{url}ManterProdutos/adicionarProduto" enctype=multipart/form-data>
                <div class="modal-body">
                    <div class="bo4 size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="nome" placeholder="Nome do produto">
                    </div>

                    <div class="bo4 size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="number" name="quantidade" placeholder="Quantidade">
                    </div>

                    <div class="bo4 size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="number" step="0.01" name="preco" placeholder="Preço">
                    </div>

                    <div class="bo4 size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="descricao" placeholder="Descrição">
                    </div>

                    <div class="form-group">
                        <textarea class="form-control sizefull s-text7 p-l-22 p-r-22" name="informacoes" placeholder="Informações Adicionais"></textarea>
                    </div>

                    <div class="form-group">
                        <input class="form-control-file" name="userfile[]" type="file" accept="image/*" multiple>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btnAddProduto">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal editar Produto-->
<div class="modal fade" id="editar-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLabel">Editar Produto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="formEditar">
                    <div class="bo4 size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" id="nomeProd" type="text" name="nome" value="" placeholder="Nome do produto">
                    </div>

                    <div class="bo4 size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" id="idQtdProd" type="number" name="quantidade"  value="" placeholder="Quantidade">
                    </div>

                    <div class="bo4 size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" id="idPreco" type="number" step="0.01"  value="" name="preco" placeholder="Preço">
                    </div>

                    <div class="bo4 size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" id="idDescricao" type="text" name="descricao"  value="" placeholder="Descrição">
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" class="sizefull s-text7 p-l-22 p-r-22" id="idInformacoes" name="informacoes" placeholder="Informações Adicionais"></textarea>
                    </div>
                    <input class="hidden" type="hidden" id="idProd" name="id" value="">
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Salvar</button>
                        <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Inativar-->
<div class="modal fade" id="inativar-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLabel">Inativar Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="inputInativar" value="" />
                <p class="idProdutosInativar"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="botaoInativar">Sim</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ativar-->
<div class="modal fade" id="ativar-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLabel">Ativar Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="inputAtivar" value="" />
                <p class="idProdutosAtivar"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="botaoAtivar">Sim</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
            </div>
        </div>
    </div>
</div>