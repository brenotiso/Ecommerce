<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
{produtos}
<tr>
    <td>{id}</td>
    <td class="nomeProduto">{nome}</td>
    <td>{preco}</td>
    <td>{data}</td>
    <td class="actions">
        <a class="btn btn-success btn-xs" href="#">Visualizar</a>
        <button class="btn btn-info btn-xs" data-toggle="modal" dataidProd="{id}" data-target="#editar-modal">Editar</button>
        <button class="btn btn-danger btn-xs inativarProduto" dataidProd="{id}">Inativar</button>
    </td>
</tr>
{/produtos}