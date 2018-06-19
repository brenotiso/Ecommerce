$(document).ready(function () {
    arrumarNomeProduto();
    $(document).on("click", ".inativarProduto",  function () {
        var id = $(this).attr("dataidProd");
        var nome = $(this).attr("nomeIdProd");
        $("#delete-modal").find(".idProdutosInativar").html("Deseja realmente inativar: " + nome + "?");
        $("#delete-modal").find(".inputInativar").attr("value",id);
        $("#delete-modal").modal("show");
    });

    $(".modal-footer").on("click", "#botaoInativar", function() {
        var prod = $(this).parent().parent().find(".inputInativar").attr("value");
        $.ajax({
            url: "ManterProdutos/inativarProduto",
            type: 'POST',
            data: {
                id: prod
            },
            dataType: 'json',
            success: function (retorno) {
                if (!retorno.erro) {
                    $("#delete-modal").modal("toggle");
                    swal("Sucesso", retorno.msg, "success");
                } else {
                    $("#delete-modal").modal("toggle");
                    swal("Opa", retorno.msg, "error");
                }
            }
        });
    });

    $(".modal-footer").on("click", "#cancelarPedido", function() {
        var pedido = $('.idPedido').html() ;
        $.ajax({
            url: "Vendas/cancelarPedido",
            type: 'POST',
            data: {
                id: pedido
            },
            dataType: 'json',
            success: function (retorno) {
                if (!retorno.erro) { 
                    $("#modalGeral").modal("toggle");
                    if($('.divPedido').length === 1){
                        $("#nenhumaVenda").attr("class", "");
                        $("#nenhumaVenda").css("padding-bottom", "100px");
                    }
                    $(".divPedido").find("[data-idPedido='" + pedido + "']").remove();
                    swal("Sucesso", retorno.msg, "success");
                } else {
                    $("#modalGeral").modal("toggle");
                    swal("Opa", retorno.msg, "error");
                };
            }
        });
    });
    
    function pesquisarCliente(){
        var cliente = $("#inputPesquisa").val();
        $.ajax({
            url: "Vendas/vendasPorCliente",
            type: 'POST',
            data: {
                nomeCliente: cliente
            },
            dataType: 'json',
            success: function (retorno) {
                if (retorno.vazio) { 
                    $("#nenhumaVendaCliente").attr("class", "");
                    $("#nenhumaVendaCliente").css("padding-bottom", "100px");
                    $(".headRow").css("display", "none");
                    $(".divPedido").remove();
                } else {
                    $("#nenhumaVendaCliente").attr("class", "hidden");
                    $(".headRow").css("display", "block");
                    $("#todosPedidos").html(retorno.tabelaNova);
                    $(".botao-venda").click().click();
                    arrumarNomeProduto();
                };
            }
        });
    }
    
    $("#inputPesquisa").on('keyup', function (e) {
        if (e.keyCode === 13) {
            pesquisarCliente();
        }
    });
    
    $("#pesquisarCliente").click(function () {
        pesquisarCliente();
    });
    
    function arrumarNomeProduto(){
        $('.nomeProduto').each(function () {
            if($(this).text().length > 53){
                $(this).text($(this).text().substring(0, 53) + '...');
            }
        });
        $('.inativarProduto').each(function () {
            //var disponivel = $(this).attr("valorDisponibilidade");
            //if (disponivel === 0) {
                //$(this).html("Ativar");
                $(".inativarProduto").attr("class", "btn btn-success btn-xs ativarProduto");
            //}
        )};
    }
});
