$('.add-cart-logado').each(function () {
    var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
    $(this).on('click', function () {
        swal({
            title: nameProduct,
            text: "foi adicionado ao carrinho!",
            icon: "success",
            buttons: {
                continuar: "Continuar comprando",
                carrinho: true,
            }
        }).then((value) => {
            var qtdAntiga = $('.div-carrinho').children("span").text();
            var qtdNova = parseInt(qtdAntiga) + 1;
            $('.div-carrinho').children("span").text(qtdNova);
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