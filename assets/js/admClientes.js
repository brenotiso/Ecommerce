$(document).ready(function () {

    $(".btnVerCliente").on("click", function() {
        var id = $(this).attr("data-idCliente");
        $("#tdNomeModal").text($("#cliente-" + id).find(".nome").text());
        $("#tdCpfModal").text($("#cliente-" + id).find(".cpf").text());
        $("#tdEmailModal").text($("#cliente-" + id).find(".email").text());
        $("#tdTelNomeModal").text($("#cliente-" + id).find(".telefone").text());
        $("#tdDataModal").text($("#cliente-" + id).find(".data").text());
        $("#tdCepModal").text($("#cliente-" + id).find(".cep").text());
        $("#tdCidadeModal").text($("#cliente-" + id).find(".cidade").text());
        $("#tdEstadoModal").text($("#cliente-" + id).find(".estado").text());
        $("#tdRuaModal").text($("#cliente-" + id).find(".rua").text());
        $("#tdBairroModal").text($("#cliente-" + id).find(".bairro").text());
        $("#tdNumeroModal").text($("#cliente-" + id).find(".numero").text());
        $("#cliente-modal").modal("show");
    });
    
});
