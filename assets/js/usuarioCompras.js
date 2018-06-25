$(document).ready(function () {
    $(".detalhesCompra").addClass("hidden");
    $(".detalhesCompra").attr("data-visiel", true);
    
    $(document).on("click", ".idCompra", function () {
        $(".detalhesCompra").addClass("hidden");
        var compra = $(this).attr("data-idCompra");
        if($(".detalhesCompra[data-idCompra='" + compra + "']").hasClass( "hidden" )){
            $(".detalhesCompra[data-idCompra='" + compra + "']").removeClass("hidden");
        }else{
             $(".detalhesCompra[data-idCompra='" + compra + "']").addClass("hidden");
        }
    });

});
