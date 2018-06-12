$('.add-cart-logado').each(function () {
    var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
    $(this).on('click', function () {
        var qtdNova = parseInt($('.div-carrinho-referencia').children("span").text()) + 1;
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
    });
});

$('.add-cart-naoLogado').on('click', function () {
    window.location.href = $('#botaoLogin').attr('href');
});