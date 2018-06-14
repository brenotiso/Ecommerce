$(document).ready(function () {
    var a = $(".container-table-cart").attr("data-vazio");
    if (a === "true") {
        $(".container-table-cart").css("display", "none");
        $("#nenhumaVanda").attr("class", "");
        $("#nenhumaVanda").css("padding-bottom", "100px");
    }

    $(".btnAlterar").click(function () {
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

    $(".btnCancelar").click(function () {
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
                    $(".divPedido").find("[data-idPedido='" + pedido + "']").remove();
                    swal("Sucesso", retorno.msg, "success");
                } else {
                    $("#modalGeral").modal("toggle");
                    swal("Opa", retorno.msg, "error");
                };
            }
        });
    });

});
