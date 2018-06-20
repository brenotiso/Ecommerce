$(document).ready(function () {
    arrumarNomeProduto();
    
    $("#formAdicionarProduto").validate({
        rules: {
            nome: "required",
            descricao: "required",
            preco: {
                required: true,
                number: true
            },
            quantidade: {
                required: true,
                number: true
            },
            informacoes: "required",
            'fotos[]': "required"
                    //extension: "jpg|jpeg|png"
        },
        messages: {
            nome: "Entre com o nome do produto",
            quantidade: "Entre com uma quantidade válido",
            preco: "Entre com um preço válido",
            descricao: "Entre com a descrição",
            informacoes: "Entre com as informações",
            'fotos[]': "Entre com as imagens do produto"
        }
    });

    $(document).on("click", ".inativarProduto", function () {
        var id = $(this).attr("dataidProd");
        var nome = $(this).attr("nomeIdProd");
        $("#inativar-modal").find(".idProdutosInativar").html("Deseja realmente inativar: <b>" + nome + "</b>?");
        $("#inativar-modal").find(".inputInativar").attr("value", id);
        $("#inativar-modal").modal("show");
    });

    $(document).on("click", ".ativarProduto", function () {
        var id = $(this).attr("dataidProd");
        var nome = $(this).attr("nomeIdProd");
        $("#ativar-modal").find(".idProdutosAtivar").html("Deseja realmente ativar: <b>" + nome + "</b>?");
        $("#ativar-modal").find(".inputAtivar").attr("value", id);
        $("#ativar-modal").modal("show");
    });

    $("#inativar-modal").on("click", "#botaoInativar", function () {
        var prod = $(this).parent().parent().find(".inputInativar").attr("value");
        $.ajax({
            url: "ManterProdutos/inativarProduto",
            type: 'POST',
            data: {
                id: prod
            },
            dataType: 'json',
            success: function (retorno) {
                if (!retorno.erro) {
                    $("#inativar-" + prod).attr("class", "hidden");
                    $("#ativar-" + prod).attr("class", "btn btn-primary btn-xs ativarProduto");
                    $("#inativar-modal").modal("toggle");
                    swal("Sucesso", retorno.msg, "success");
                } else {
                    $("#inativar-modal").modal("toggle");
                    swal("Opa", retorno.msg, "error");
                }
            }
        });
    });

    $("#ativar-modal").on("click", "#botaoAtivar", function () {
        var prod = $(this).parent().parent().find(".inputAtivar").attr("value");
        $.ajax({
            url: "ManterProdutos/ativarProduto",
            type: 'POST',
            data: {
                id: prod
            },
            dataType: 'json',
            success: function (retorno) {
                if (!retorno.erro) {
                    $("#inativar-" + prod).attr("class", "btn btn-danger btn-xs inativarProduto");
                    $("#ativar-" + prod).attr("class", "hidden");
                    $("#ativar-modal").modal("toggle");
                    swal("Sucesso", retorno.msg, "success");
                } else {
                    $("#ativar-modal").modal("toggle");
                    swal("Opa", retorno.msg, "error");
                }
            }
        });
    });

    function pesquisarProduto(produto) {
        console.log(produto);
        $.ajax({
            url: "ManterProdutos/buscarProduto",
            type: 'POST',
            data: {
                nomeProduto: produto
            },
            dataType: 'json',
            success: function (retorno) {
                if (retorno.vazio) {
                    $("#nenhumaPordutoNome").attr("class", "");
                    $("#nenhumaPordutoNome").css("padding-bottom", "150px");
                    $("#tabelaProdutos").css("display", "none");
                } else {
                    $(".trProduto").remove();
                    $("#nenhumaPordutoNome").attr("class", "hidden");
                    $("#tabelaProdutos").css("display", "block");
                    $("#tabelaProdutos tbody").append(retorno.tabelaNova);
                    arrumarNomeProduto();
                }
                ;
            }
        });
    }

    $("#inputPesquisa").on('keyup', function (e) {
        if (e.keyCode === 13) {
            pesquisarProduto($("#inputPesquisa").val());
        }
    });

    $("#pesquisarProduto").click(function () {
        pesquisarProduto($("#inputPesquisa").val());
    });

    function arrumarNomeProduto() {
        $('.nomeProduto').each(function () {
            if ($(this).text().length > 53) {
                $(this).text($(this).text().substring(0, 53) + '...');
            }
        });
    }

});
