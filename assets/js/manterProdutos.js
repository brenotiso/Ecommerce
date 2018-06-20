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
    
    $("#formEditar").validate({
        rules: {
            nome: "required",
            quantidade: {
                required: true,
                min: 0,
                number: true
            },
            descricao: "required",
            preco: {
                required: true,
                min: 0,
                number: true
            },
            informacoes: "required"
        },
        messages: {
            nome: "Entre com um nome",
            quantidade: "Entre com uma quantidade",
            descricao: "Entre com uma descrição",
            preco: "Entre com um preço",
            informacoes: "Entre com informações sobre o produto"
        },
        submitHandler: function () {
            var dados = $("#formEditar").serialize();
            $.post("ManterProdutos/atualizarProduto", dados, function (retorno) {
                retorno = JSON.parse(retorno);
                if (!retorno.erro) {
                    $("#editar-modal").modal("toggle");
                    swal("Tudo certo", retorno.msg, "success");
                } else {
                    $("#editar-modal").modal("toggle");
                    swal("Opa", retorno.msg, "error");
                }
            });
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

    $(document).on("click", ".editarProduto", function () {
        var prod = $(this).attr("dataidProd");
        $.ajax({
            url: "ManterProdutos/recuperarProduto",
            type: 'POST',
            data: {
                id: prod
            },
            dataType: 'json',
            success: function (dados) {
                $("#editar-modal").find("#nomeProd").val(dados.nome);
                $("#editar-modal").find("#idQtdProd").val(dados.quantidade);
                $("#editar-modal").find("#idPreco").val(dados.preco);
                $("#editar-modal").find("#idDescricao").val(dados.descricao);
                $("#editar-modal").find("#idInformacoes").val(dados.informacoes);
                $("#editar-modal").find("#idProd").val(dados.id);
            }
        });
        $("#editar-modal").modal("show");
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
        $.ajax({
            url: "ManterProdutos/pesquisarProduto",
            type: 'POST',
            data: {
                nomeProduto: produto
            },
            dataType: 'json',
            success: function (retorno) {
                if (retorno.vazio) {
//                    $("#nenhumaVendaCliente").attr("class", "");
//                    $("#nenhumaVendaCliente").css("padding-bottom", "100px");
//                    $(".headRow").css("display", "none");
//                    $(".divPedido").remove();
                } else {
                    $("#nenhumaVendaCliente").attr("class", "hidden");
                    $(".headRow").css("display", "block");
                    $("#todosPedidos").html(retorno.tabelaNova);
                    $(".botao-venda").click().click();
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
