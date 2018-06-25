<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({url}assets/images/heading-pages-01.jpg);">
    <h2 class="l-text2 t-center">
        Meus Dados
    </h2>
</section>

<!-- Dados -->
<section class="bgwhite p-t-70 p-b-100">
    <div class="container">
        <div class="t-center">
            <div class= "table-responsive-sm ">
                <table class="pos-center table">
                    <tr>
                        <th>Nome</th>
                        <td>{nome}</td>
                    </tr>
                    <tr>
                        <th>CPF</th>
                        <td>{cpf}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{email}</td>
                    </tr>
                    <tr>
                        <th>Telefone</th>
                        <td>{telefone}</td>
                    </tr>
                    <tr>
                        <th>Data cadastro</th>
                        <td>{dataCadastro}</td>
                    </tr>
                    <tr>
                        <th>CEP</th>
                        <td>{cep}</td>
                    </tr>
                    <tr>
                        <th>Cidade</th>
                        <td>{cidade}</td>
                    </tr>
                    <tr>
                        <th>Estado</th>
                        <td>{estado}</td>
                    </tr>
                    <tr>
                        <th>Rua</th>
                        <td>{rua}</td>
                    </tr>
                    <tr>
                        <th>Bairro</th>
                        <td>{bairro}</td>
                    </tr>
                    <tr>
                        <th>Número</th>
                        <td>{numero}{complemento}</td>
                    </tr>
                </table>
            </div>
            <div class="pos-center">
                <a href="meusdados/alterar" class="flex-c-m size10 bg1 bo-rad-23 hov1 m-text3 trans-0-4">Alterar dados</a>
            </div>
            </div>
        </div>
    </div>
</section>
