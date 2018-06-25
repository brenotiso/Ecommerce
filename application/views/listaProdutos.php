<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container p-b-50">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <h4 class="m-text14 p-b-7">
                        Categorias
                    </h4>

                    <ul class="p-b-54">
                        <li class="p-t-4">
                            <a href="#" class="s-text13 active1">
                                Todos
                            </a>
                        </li>

                        <li class="p-t-4">
                            <a href="#" class="s-text13">
                                Hardware
                            </a>
                        </li>

                        <li class="p-t-4">
                            <a href="#" class="s-text13">
                                Placa-mãe
                            </a>
                        </li>

                        <li class="p-t-4">
                            <a href="#" class="s-text13">
                                Placa de vídeo
                            </a>
                        </li>

                        <li class="p-t-4">
                            <a href="#" class="s-text13">
                                AirCooler
                            </a>
                        </li>
                    </ul>

                </div>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                <!-- 
                <div class="flex-sb-m flex-w p-b-35">
                    <div class="flex-w">
                        <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                            <select class="selection-2" name="sorting">
                                <option>Padrão</option>
                                <option>Preço crescente</option>
                                <option>Preço decrescente</option>
                            </select>
                        </div>
                    </div>

                    <span class="s-text8 p-t-5 p-b-5">
                        Exibindo 1 – 12 dos 16 resultados
                    </span>
                </div> -->

                <!-- Produtos -->
                <div class="row">
                    
                    {produtos}
                    <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                <img src="{url}assets/images/produtos/{img}" alt="IMG-PRODUCT">

                                <div class="block2-overlay trans-0-4">

                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <button class="{disponivel} add-cart-{logado} flex-c-m size2 bg4 bo-rad-23 hov1 s-text1 trans-0-4" data-idProduto="{id}">
                                            Adicionar ao carrinho
                                        </button>
                                        <button class="{nDisponivel} flex-c-m size2 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            Produto indisponivel
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="{url}produto/{id}" class="block2-name dis-block s-text3 p-b-5" id="nomeProduto-{id}">{nome}</a>
                                <span class="block2-price m-text6 p-r-5">R$ {preco}</span>
                            </div>
                        </div>
                    </div>
                    {/produtos}
                    
                </div>

                <!-- Paginas 
                <div class="pagination flex-m flex-w p-t-26">
                    <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
                    <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
                </div> -->
            </div>
        </div>
    </div>
</section>
