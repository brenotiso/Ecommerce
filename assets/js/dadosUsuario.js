jQuery.validator.addMethod("cpf", function (value, element) {
    value = jQuery.trim(value);

    value = value.replace('.', '');
    value = value.replace('.', '');
    cpf = value.replace('-', '');
    while (cpf.length < 11)
        cpf = "0" + cpf;
    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
    var a = [];
    var b = new Number;
    var c = 11;
    for (i = 0; i < 11; i++) {
        a[i] = cpf.charAt(i);
        if (i < 9)
            b += (a[i] * --c);
    }
    if ((x = b % 11) < 2) {
        a[9] = 0
    } else {
        a[9] = 11 - x
    }
    b = 0;
    c = 11;
    for (y = 0; y < 10; y++)
        b += (a[y] * c--);
    if ((x = b % 11) < 2) {
        a[10] = 0;
    } else {
        a[10] = 11 - x;
    }

    var retorno = true;
    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg))
        retorno = false;

    return this.optional(element) || retorno;

}, "Informe um CPF válido");

$(document).ready(function () {
    $("#form-alterar").validate({
        rules: {
            nome: "required",
            cpf: {
                required: true,
                cpf: true
            },
            telefone: "required",
            email: {
                required: true,
                email: true
            },
            rua: "required",
            bairro: "required",
            numero: "required",
            cep: {
                required: true,
                minlength: 8,
                maxlength: 8
            },
            cidade: "required",
            estado: "required"
        },
        messages: {
            nome: "Entre com um nome",
            telefone: "Entre com um número de telefone",
            email: "Email inválido",
            rua: "Entre com a rua",
            bairro: "Entre com o bairro",
            numero: "Entre com o número",
            cep: "Entre com o CEP",
            cidade: "Entre com a cidade",
            estado: "Entre com o estado"
        },
        submitHandler: function () {
            var dados = $("#form-alterar").serialize();
            $.post("../User/alterarDados", dados, function (retorno) {
                retorno = JSON.parse(retorno);
                if (!retorno.erro) {
                    swal("Tudo certo", retorno.msg, "success");
                } else {
                    swal("Opa", retorno.msg, "error");
                }
            });
        }
    });

    $("#form-alterarSenha").validate({
        rules: {
            senhaAtual: "required",
            senhaNova: "required",
            senhaNovaConfirmacao: {
                required: true,
                equalTo: "#senhaNova"
            }
        },
        messages: {
            senhaAtual: "Entre com a senha atual",
            senhaNova: "Entre com uma senha",
            senhaNovaConfirmacao: "As senhas não conferem"
        },
        submitHandler: function () {
            var dados = $("#form-alterarSenha").serialize();
            $.post("../User/alterarSenha", dados, function (retorno) {
                retorno = JSON.parse(retorno);
                if (!retorno.erro) {
                    swal("Tudo certo", retorno.msg, "success");
                } else {
                    swal("Opa", retorno.msg, "error");
                }
            });
        }
    });

    $(document).on("click", "#botaoSenha", function () {
        $("#geral").attr("class", "hidden");
        $("#senha").attr("class", "");
    });

    $(document).on("click", "#botaoVoltar", function () {
        $("#senha").attr("class", "hidden");
        $("#geral").attr("class", "");
    });

});