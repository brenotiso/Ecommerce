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


jQuery(document).ready(function () {

    jQuery("#form-cadastro").validate({
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
            senha: "required",
            senhaConfirmada: {
                required: true,
                equalTo: "#senha"
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
            cpf: "CPF inválido",
            telefone: "Entre com um número de telefone",
            email: "Email inválido",
            senha: "Entre com uma senha",
            senhaConfirmada: "As senhas não conferem",
            rua: "Entre com a rua",
            bairro: "Entre com o bairro",
            numero: "Entre com o número",
            cep: "Entre com o CEP",
            cidade: "Entre com a cidade",
            estado: "Entre com o estado"
        },
        submitHandler: function () {
            var dados = jQuery("#form-cadastro").serialize();
            jQuery.post("Cadastro/cadastrar", dados, function (retorno) {
                retorno = JSON.parse(retorno);
                if (!retorno.erro) {
                    swal("Tudo certo", retorno.msg, "success").then((value) => {
                        window.location.href = $('#botaoLogin').attr('href');
                    });
                } else {
                    swal("Opa", retorno.msg, "error");
                }
            });
        }
    });

});
