jQuery(document).ready(function () {

    jQuery("#form-login").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            senha: "required"
        },
        messages: {
            email: "Email inválido",
            senha: "Entre com uma senha"
        },
        submitHandler: function () {
            var dados = jQuery("#form-login").serialize();
            jQuery.post("Login/fazerLogin", dados, function (retorno) {
                retorno = JSON.parse(retorno);
                if (!retorno.erro) {
                    window.location.href = $("#linkHome").attr("href");
                } else {
                    swal("Opa", retorno.msg, retorno.tipo);
                }
            });
        }
    });

});
