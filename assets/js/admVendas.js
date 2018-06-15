$(document).ready(function () {
    arrumarNomeProduto();
    var a = $(".container-table-cart").attr("data-vazio");
    if (a === "true") {
        $(".container-table-cart").css("display", "none");
        $("#nenhumaVenda").attr("class", "");
        $("#nenhumaVenda").css("padding-bottom", "100px");
    }

    $(document).on("click", ".btnAlterar",  function () {
        var id = $(this).attr("data-idPedido");
        var statusAtual = $(this).attr("data-statusAtual");
        $("#modalGeral").find(".idPedido").html(id);
        $("#modalGeral").find(".modal-title").html("Alterar status #" + id);
        $("#modalGeral").find(".modal-body").html("<p>Atualmente em: " + statusAtual + "</p><br>\n\
            <select class='form-control' name='selector'>\n\
            <option value='1'>Pedido</option>\n\
            <option value='2'>Produção</option>\n\
            <option value='3'>Enviado</option>\n\
            <option value='4'>Entregue</option>\n\
            </select>");
       $(".btnModal").html("Alterar");
       $(".btnModal").attr("class", "btn btn-primary btnModal");
       $(".btnModal").attr("id", "alterarPedido");
    });

    $(document).on("click", ".btnCancelar",  function () {
        var id = $(this).attr("data-idPedido");
        $("#modalGeral").find(".idPedido").html(id);
        $("#modalGeral").find(".modal-title").html("Cancelar Pedido #" + id);
        $("#modalGeral").find(".modal-body").html("<p>Tem certeza que dezeja cancelar o pedido #" + id + "?<br> Ele será excuido do banco de dados definitivamente!</p>");
        $(".btnModal").html("Cancelar");
        $(".btnModal").attr("class", "btn btn-danger btnModal");
        $(".btnModal").attr("id", "cancelarPedido");
    });


    $(".modal-footer").on("click", "#alterarPedido", function() {
        var pedido = $('.idPedido').html() ;
        var status = $('select[name=selector]').val();
        $.ajax({
            url: "Vendas/alterarPedido",
            type: 'POST',
            data: {
                id: pedido,
                status: status
            },
            dataType: 'json',
            success: function (retorno) {
                if (!retorno.erro) {
                    $("#status-pedido" + pedido).text(retorno.status);
                    $(".div-botoes-pedido").find("[data-idPedido='" + pedido + "']").attr("data-statusAtual", retorno.status); 
                    $("#modalGeral").modal("toggle");
                    swal("Sucesso", retorno.msg, "success");
                } else {
                    $("#modalGeral").modal("toggle");
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
            if($(this).find(".linkProduto").text().length > 60){
                $(this).find(".linkProduto").text($(this).find(".linkProduto").text().substring(0, 60) + '...');
            }
        });
        $('.linkProduto').css("line-height", 0);
    }
});
