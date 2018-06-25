$('.addCarinho-logado').on('click', function () {
    var nameProducto = $(".product-detail-name").text();
    var idProduto = $("#idProduto").val();
    var qtdProd = $("#qtdProduto").val();
    var qtdNova = parseInt($('.div-carrinho-referencia').children("span").text()) + parseInt(qtdProd);
    $.ajax({
        url: "../Carrinho/add/" + idProduto + "/" + qtdProd,
        type: "POST",
        dataType: 'json',
        success: function (retorno) {
            if(!retorno.erro){
                $('.div-carrinho-referencia').children("span").text(qtdNova);
                $('.div-carrinho').children("span").text(qtdNova);
                swal({
                    title: nameProducto,
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
            }else{
                swal("Opa", retorno.msg, "error");
            }
        }
    });
});


$('.addCarinho-naoLogado').on('click', function () {
    window.location.href = $('#botaoLogin').attr('href');
});
