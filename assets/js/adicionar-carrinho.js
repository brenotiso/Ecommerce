$('.add-cart-logado').on('click', function () {
    var nameProduct = $(this).parent().parent().parent().find('.block2-name').text();
    var idProduto = $(this).attr("data-idProduto");
    var qtdNova = parseInt($('.div-carrinho-referencia').children("span").text()) + 1;
    var url = "Carrinho/add/" + idProduto;
    var urlAtual = window.location.pathname.split("/");
    if(urlAtual[1] == "BuscaProduto"){
       url = "../Carrinho/add/" + idProduto;
       nameProduct = $("#nomeProduto-" + idProduto).text();
    }
    $.ajax({
        url: url,
        type: "GET",
        success: function () {
            $('.div-carrinho-referencia').children("span").text(qtdNova);
            $('.div-carrinho').children("span").text(qtdNova);
            swal({
                title: nameProduct,
                text: "foi adicionado ao carrinho!",
                icon: "success",
                buttons: {
                    continuar: "Continuar comprando",
                    carrinho: true
                }
            }).then((value) => {
                switch (value) {
                    case "carrinho":
                        $('.div-carrinho').click();
                        break;
                    default:
                        break;
                }
            });
        }
    });
});


$('.add-cart-naoLogado').on('click', function () {
    window.location.href = $('#botaoLogin').attr('href');
});
