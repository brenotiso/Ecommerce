$('.block2-btn-addcart').each(function () {
	var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
	$(this).on('click', function () {
		swal(nameProduct, "foi adicionado ao carrinho!", "success");
	});
});