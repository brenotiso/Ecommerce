<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Product Detail -->
	<div class="container bgwhite p-t-25 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
                        {fotos}
						<div class="item-slick3" data-thumb="{url}assets/images/produtos/{imagem}">
							<div class="wrap-pic-w">
								<img src="{url}assets/images/produtos/{imagem}" alt="IMG-PRODUCTO">
							</div>
						</div>
                        {/fotos}
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">{nome}</h4>

				<span class="m-text17">R$ {preco}</span>

				<!--  -->
				<div class="p-b-30">
					
					<div class=" p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10 {qtdProduto}">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input id="qtdProduto" class="size8 m-text18 t-center num-product" type="number" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size11 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
                                {botaoCompra}
							</div>
						</div>
					</div>
				</div>

				<div class="p-b-45">
                    <input type="hidden" id="idProduto" value="{id}" />
					<span class="s-text8 m-r-35">ID: {id}</span>
					<span class="s-text8">Categorias: {categorias}</span>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Descrição
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							{descricao}
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Informações Adicionais
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							{informacoes}
						</p>
					</div>
				</div>
				
			</div>
		</div>
	</div>
