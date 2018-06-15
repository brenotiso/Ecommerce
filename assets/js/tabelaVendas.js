$(document).ready(function () {
    $(".containerTab").css("display", "none");
    
    $(document).on("click", ".botao-venda", function () {
        $(".containerTab").css("display", "none");
        var pedido = $(this).attr("rel");
        var bloco = $(this).parent().parent().parent().find("#" + pedido + "");
        if (bloco.attr("data-estado") === "ativo") {
            bloco.css("display", "none");
            bloco.attr("data-estado", "invisivel");
        } else {
            bloco.css("display", "block");
            bloco.attr("data-estado", "ativo");
        }
    });

});
