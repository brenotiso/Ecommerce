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
        <div class="table-responsive col-md-12 {vazio}">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produto</th>
                        <th>Preço (R$)</th>
                        <th>Data adição</th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {produtos}
                </tbody>
            </table>
        </div>

    </div> <!-- /#list -->

    <!--
    <div id="bottom" class="row">
            <div class="col-md-12">
                    <ul class="pagination">
                            <li class="disabled p-r-2"><a>&lt; Anterior</a></li>
                            <li class="disabled p-r-2"><a>1</a></li>
                            <li class="p-r-2"><a href="#">2</a></li>
                            <li class="p-r-2"><a href="#">3</a></li>
                            <li class="next "><a href="#" rel="next">Próximo &gt;</a></li>
                    </ul>
            </div>
    </div> -->
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
            <form id="formAdicionarProduto" method="POST" action="{url}index.php/ManterProdutos/adicionarProduto" enctype=multipart/form-data>
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
                        <input name="fotos[]" type="file" accept="image/*" multiple>
                    </div>
                    <input class="hidden" type="hidden" name="disponivel" value="1">
                
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
                <form>
                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="nome" value="Produto X" placeholder="Nome do produto">
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="number" name="quantidade"  value="10" placeholder="Quantidade">
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="number" step="0.01"  value="150.00" name="preco" placeholder="Preço">
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="descricao"  value="Blá blá" placeholder="Descrição">
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" class="sizefull s-text7 p-l-22 p-r-22" placeholder="Informações Adicionais">Blá blá</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" type="submit">Salvar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
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