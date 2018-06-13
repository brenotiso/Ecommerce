$(document).ready(function () {
    $("#modal-satatus").click(function (e) {
        var id = $(this).attr("data-idPedido");
        var statusAtual = $(this).attr("data-statusAtual");
        $("#status-modal").find(".idPedido").html(id);
        $("#status-modal").find(".modal-title").html("Alterar status");
        $("#status-modal").find(".modal-body").html("<select class='chosen'>\n\
            <option value='1'>Pedido</option>\n\
            <option value='2'>Produção</option>\n\
            <option value='3'>Enviado</option>\n\
            <option value='4'>Entregue</option>\n\
            </select>");
        $("#status-modal").find(".modal-footer").html("<button type='button' class='btn btn-primary'>Alterar</button>\n\
            <button type='button' class='btn btn-danger' data-dismiss='modal'>Cancelar</button>");
    });
});
