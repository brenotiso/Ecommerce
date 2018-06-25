<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({url}assets/images/heading-pages-01.jpg);">
		<h2 class="l-text2 t-center">
			Compras realizadas
		</h2>
	</section>

	<!-- Cart -->
	<section class="bgwhite p-t-70 p-b-100">
		<div class="container">
      <p class="{temCompra}">Você ainda não realizou nenhuma compra :(</p>
			<!-- Cart item -->
			<div class="container-table-cart pos-relative {vazio}">
				<div class="wrap-table-shopping-cart bgwhite">
					<div class="divTable">
						<div class="headRow">
							<div class="coluna-1t">Pedido</div>
							<div class="coluna-2t p-l-70">Data</div>
							<div class="coluna-3t">Valor Total</div>
							<div class="coluna-4t">Status</div>
						</div>
						{compras}
						<div class="divRow">
							<div class="coluna-1 idCompra" data-idCompra="{idPedido}">{idPedido}</div>
							<div class="coluna-2 p-l-70">{data}</div>
							<div class="coluna-3">R$ {total}</div>
							<div class="coluna-4">{status}</div>
						</div>
						<div class="detalhesCompra p-l-15 p-r-15 p-b-15 p-t-15" data-idCompra="{idPedido}">
							<table class="table table-hover">
								<thead>
									<th>Quantidade</th>
									<th>Produto</th>
									<th>Preço (R$)</th>
									<th>Total</th>
								</thead>
								<tbody>
									{produtos}
									<tr>
										<td>{quantidade}</td>
										<td><a href="produto/{idProduto}">{nomeProduto}</a></td>
										<td>{preco}</td>
										<td>{totalProduto}</td>
									</tr>
									{/produtos}
								</tbody>
							</table>
						</div>
						{/compras}
					</div>
				</div>
			</div>
		</div>
	</section>