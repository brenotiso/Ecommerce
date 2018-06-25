<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({url}assets/images/heading-pages-01.jpg);">
    <h2 class="l-text2 t-center">
        Alterar suas informações
    </h2>
</section>

<!-- content page -->
<section class="bgwhite p-t-35 p-b-60">
    <div class="container">
        <div class="pos-center">
            <div class="p-b-30">
                <div class="" id="geral">
                    <form id="form-alterar">
                        <h4 class="m-text17 p-b-36 p-t-15">
                            Atualize as informações necessárias
                        </h4>

                        <div class="bo4 size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="nome" placeholder="Nome completo" value="{nome}">
                        </div>

                        <div class="bo4 size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="cpf" placeholder="Cpf" value="{cpf}" disabled="disabled">
                        </div>

                        <div class="bo4 size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="telefone" placeholder="Número de telefone" value="{telefone}">
                        </div>

                        <div class="bo4 size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email" value="{email}">
                        </div>				

                        <div class="bo4 size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="tetx" name="rua" placeholder="Rua" value="{rua}">
                        </div>

                        <div class="bo4 size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="bairro" placeholder="Bairro" value="{bairro}">
                        </div>

                        <div class="bo4 size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="number" name="numero" placeholder="Número" value="{numero}">
                        </div>

                        <div class="bo4 size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="complemento" placeholder="Complemento" value="{complemento}">
                        </div>

                        <div class="bo4 size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="cep" placeholder="CEP" value="{cep}">
                        </div>

                        <div class="bo4 size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="cidade" placeholder="Cidade" value="{cidade}">
                        </div>

                        <div class="bo4 size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="estado" placeholder="Estado" value="{estado}">
                        </div>

                        <div class="">
                            <!-- Button -->
                            <button class="float-l flex-c-m size10 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                                Salvar
                            </button>
                        </div>

                    </form>
                    <button class="float-r p-l-5flex-c-m size10 bg1 bo-rad-23 hov1 m-text3 trans-0-4" id="botaoSenha">
                        Alterar senha
                    </button>
                </div>

                <div class="hidden" id="senha">
                    <form id="form-alterarSenha">
                        <h4 class="m-text17 p-b-36 p-t-15">
                            Atualize sua senha
                        </h4>

                        <div class="bo4 size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="senhaAtual" placeholder="Senha atual">
                        </div>

                        <div class="bo4 size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="senhaNova" id="senhaNova" placeholder="Nova senha">
                        </div>

                        <div class="bo4 size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="senhaNovaConfirmacao" placeholder="Confirmar nova senha">
                        </div>				

                        <div class="pos-center p-b-5">
                            <!-- Button -->
                            <button class="flex-c-m size10 bg1 bo-rad-23 hov1 m-text3 trans-0-4">Salvar</button>
                        </div>

                    </form>
                    <div class="pos-center">
                        <button class="p-l-5flex-c-m size10 bg1 bo-rad-23 hov1 m-text3 trans-0-4" id="botaoVoltar">
                            Voltar
                        </button>
                    </div>				
                </div>					

            </div>
        </div>
    </div>
</section>