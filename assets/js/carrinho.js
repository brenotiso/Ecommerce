$(document).ready(function () {

    $(".cart-img-product").on("click", function () {
        var rowid = $(this).parent().parent().find(".input-rowid").val();
        window.location.href = ("Carrinho/remover/" + rowid);
    });

    $("#atualizarCarrinho").on("click", function () {
        var rowid = [];
        var qty = [];
        var id = [];
        $(".container-table-cart").find(".input-rowid").each(function () {
            rowid.push($(this).val());
        });
        $(".container-table-cart").find(".num-product").each(function () {
            qty.push($(this).val());
        });
        $(".container-table-cart").find(".input-idProduto").each(function () {
            id.push($(this).val());
        });
        $.ajax({
            url: "Carrinho/atualizar",
            type: 'POST',
            data: {
                rowid: rowid,
                qty: qty,
                id: id
            },
            dataType: 'json',
            success: function (retorno) {
                if (retorno.erro === true) {
                    swal(retorno.produto, retorno.msg, "warning");
                } else {
                    window.location.reload();
                }
            }
        });
    });

    $("#finalizarCompra").on("click", function () {
        $.ajax({
            url: "Carrinho/finalizarCompra",
            type: 'GET',
            success: function (retorno) {
                if (retorno.erro === true) {
                    swal("Opa!", "Ocorreu um erro ao finalizar sua compra", "error");
                } else {
                    window.location.href = "Usuario/compras";
                }
            }
        });
    });

});
