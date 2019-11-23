$(function() {

	/**
	 * Remove os erros dos formulários após a alteração dos valores.
	 */
	$("form").find("input, textarea, select").change(function() {
	
		$(this).closest('.form-group').removeClass('has-error');
		$(this).closest('.form-group').find('.glyphicon').hide();

	});
	
	/**
	 * Aplica a função de erro nos campos obrigatórios dos formulários.
	 */
	$(document).on('submit', 'form', function() {

		var send = true;
		var form_id = $(this).prop('id');

		$('input, textarea, select', this).each(function() {
		
			if (
				$(this).attr('data-required') != undefined
				&&
				$(this).is(":visible")
			) {

				if (
					(
						(
							$(this).attr('type') == 'radio' 
							||
							$(this).attr('type') == 'checkbox'
						)&&
						!$("input[name='"+ $(this).attr('name') +"']:checked").length
					)||(
						(
							$(this).attr('type') == 'text'
							||
							$(this).attr('type') == 'password'
							||
							$(this).prop('type') == 'textarea'
							||
							$(this).prop('type') == 'select-one'
						)&&
						$(this).val() == ''
					)
				) {
					inputError($(this), $(this).attr('data-required'));
					send = false;
					return false;
				}
			
			}
		
		});
		
		if (send) {
			
			$('.btn').addClass('disabled');
			
			if ($(this).hasClass('submit-on-success') && !$(this).hasClass('submiting')) {
				$(this).addClass('submiting');
				$(this).removeAttr('onsubmit');
				$(this).submit();
			}
			
		}
		// else {
			// $("#fullscr").hide();
		// }

	});

});

/**
 * Mostra mensagem de erro e descata os campos
 *
 * Função utilizada para destacar campos obrigatórios que não foram preenchidos.
 *
 * @function
 * @name inputError 
 * @param {Object} obj Objeto que receberá o destaque do erro.
 * @param {string} msg Mensagem de Erro.
 */
function inputError(obj, msg) {

	obj.closest('.form-group').addClass('has-error');
	obj.closest('.form-group').find('.glyphicon').show();
	obj.focus();
	
	alertError(msg);

	if (
		obj.closest('.panel').find('.panel-collapse').length
		&&
		!obj.closest('.panel').find('.in').length
	) {
		obj.closest('.panel').find('a').click();
		$("html, body").delay(1000).animate({ scrollTop: $('body').height() }, 500);
	}
	else
		$("html, body").delay(1000).animate({ scrollTop: obj.offset().top-120 }, 500);

}