<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

{produtos}
<tr class="trProduto">
    <td>{id}</td>
    <td class="nomeProduto">{nome}</td>
    <td>{preco}</td>
    <td>{data}</td>
    <td class="actions">
        <a class="btn btn-success btn-xs" href="#">Visualizar</a>
        <button class="btn btn-info btn-xs" data-toggle="modal" dataidProd="{id}" nomeIdProd="{nome}">Editar</button>
        <button class="btn btn-danger btn-xs inativarProduto {inativar}" id="inativar-{id}" dataidProd="{id}" nomeIdProd="{nome}">Inativar</button>
        <button class="btn btn-primary btn-xs ativarProduto {ativar}" id="ativar-{id}" dataidProd="{id}" nomeIdProd="{nome}">Ativar</button>
    </td>
</tr>
{/produtos}