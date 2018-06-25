<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({url}assets/images/heading-pages-01.jpg);">
    <h2 class="l-text2 t-center">
        Clientes
    </h2>
</section>

<section class="bgwhite p-t-70 p-b-100">
    <div class="container">
        <div id="top" class="row">
            <div class="col-sm-3">
                <h2>Clientes</h2>
            </div>
            <div class="col-sm-6">

                <div class="input-group h2">
                    <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar cliente">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                        </button>
                    </span>
                </div>

            </div>
        </div>

        <hr />

        <div class="table-responsive col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Data cadastro</th>
                        <th class="actions">Vizualizar</th>
                    </tr>
                </thead>
                <tbody>
                    {clientes}
                    <tr>
                        <td>{id}</td>
                        <td>{nome}</td>
                        <td>{dataCadastro}</td>
                        <td class="actions">
                            <button class="btnVerCliente btn btn-deafult btn-xs" data-idCliente="{id}">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                    <div class="hidden" id="cliente-{id}">
                        <div class="hidden nome">{nome}</div>
                        <div class="hidden cpf">{cpf}</div>
                        <div class="hidden email">{email}</div>
                        <div class="hidden telefone">{telefone}</div>
                        <div class="hidden data">{dataCadastro}</div>
                        <div class="hidden cep">{cep}</div>
                        <div class="hidden cidade">{cidade}</div>
                        <div class="hidden estado">{estado}</div>
                        <div class="hidden rua">{rua}</div>
                        <div class="hidden bairro">{bairro}</div>
                        <div class="hidden numero">{numero}</div>
                    </div>
                    {/clientes}
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

<!-- Modal Inativar-->
<div class="modal fade" id="cliente-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="modalLabel">Detalhes</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class= "table-responsive-sm ">
                <table class="pos-center table">
                    <tr>
                        <th>Nome</th>
                        <td id="tdNomeModal"></td>
                    </tr>
                    <tr>
                        <th>CPF</th>
                        <td id="tdCpfModal"></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td id="tdEmailModal"></td>
                    </tr>
                    <tr>
                        <th>Telefone</th>
                        <td id="tdTelNomeModal"></td>
                    </tr>
                    <tr>
                        <th>Data cadastro</th>
                        <td id="tdDataModal"></td>
                    </tr>
                    <tr>
                        <th>CEP</th>
                        <td id="tdCepModal"></td>
                    </tr>
                    <tr>
                        <th>Cidade</th>
                        <td id="tdCidadeModal"></td>
                    </tr>
                    <tr>
                        <th>Estado</th>
                        <td id="tdEstadoModal"></td>
                    </tr>
                    <tr>
                        <th>Rua</th>
                        <td id="tdRuaModal"></td>
                    </tr>
                    <tr>
                        <th>Bairro</th>
                        <td id="tdBairroModal"></td>
                    </tr>
                    <tr>
                        <th>Número</th>
                        <td id="tdNumeroModal"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
        </div>
    </div>
    </div>
</div>
