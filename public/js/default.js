


$(function() {
//$.mask.definitions['L']='[ABCDEabcde]';


/*
$('.cep').mask("99999-999");
$('.celular, .telefone').mask("(99) 99999-9999");
$('.cpf')mask('999.999.999-99');
$('.numero').mask("9?999999999999999999");*/


function alertSuccess( msg, reload, url ) {

$(".alertify-notifier").html('');
alertify.success('<span class="glyphicon glyphicon-ok"></span> '+msg);

if (reload) {

	//$("#loading").show();
	//$(".modal").modal("hide");

	setTimeout(function(){

		if (url == undefined) {
			window.location.reload();
		}
		else {
			location.href = baseUrl+url;
		}

	}, 3000);

}

}

	
	call_tiny_mce();


});
/*
$(document).on('submit', '#form_cadastro_aluno', function() {
	
	
	//alert('wtewete');

	var form = $(this);
	form.find('#alert-warning').html('');

	if (!$(this).find(".has-error").length) {

		//var nome  = form.find("input[name=nome]").val();
		//alert('sdfgsdf'+nome);
		//var curso = form.find("input[name=curso]").val();
		//var cpf      = form.find("input[name=cpf]").val();
		var email  = form.find("input[name=email]").val();
		var cpf = form.find("input[name=cpf]").val();
		//var rg      = form.find("input[name=rg]").val();
		//var data_nascimento  = form.find("input[name=data_nascimento]").val();
		//var orgao_exp = form.find("input[name=orgao_exp]").val();
		//var data_exp      = form.find("input[name=data_exp]").val();
		var telefone    = form.find("input[name=telefone]").val();
		var celular    = form.find("input[name=celular]").val();
		//var uf   = form.find("input[name=uf]").val();
		//var cep   = form.find("input[name=cep]").val();
		//var cidade   = form.find("input[name=cidade]").val();
		//var bairro   = form.find("input[name=bairro]").val();
		//var endereco   = form.find("input[name=endereco]").val();


		if (!testPhone(celular)) {
			alertError('Celular inválido!');
		}
		else if (telefone.length && !testPhone(telefone)) {
			alertError('Telefone inválido!');
		}
		else if (!testCPF(cpf)) {
			alertError('CPF inválido!');
		}
		else if (!testEmail(email)) {
			alertError('E-mail inválido!');
		}
		else {

			var fd = new FormData(form.get(0));

			//$("#loading").show();
			$.ajax({
				url: baseUrl+'aluno/json_cadastro_aluno/',
				type: "POST",
				data: fd,
				processData: false,
				contentType: false,
				success: function(response) {

					if (response.error != undefined) {
						alertError(response.error);
					}
					else{
						alertSuccess(response.error, true ,'aluno/ja_cadastrado');
					}
					//$("#loading").hide();

				}
			});

		}

				$('.btn').removeClass('disabled');

			}

		});
*/
function testPhone( value ) {
var replacedValLength = value.replace(/[^0-9]/gi, '').length;
return replacedValLength >= 8 && replacedValLength <= 11;
}

function testEmail( value ) {
	return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value);
}

function testCPF( value ) {

	value = value.replace(/[^0-9]/g, '');

	const cpfChars = value
			.split('')
			.map(Number)
			.slice(0, 9);

	cpfChars.push( calcLastDigit() );
	cpfChars.push( calcLastDigit() );

	function calcLastDigit() {

	let digit = 0;
	let length = cpfChars.length+1;

	cpfChars.forEach(function(char, index) {
		digit+= char*(length-index);
	});

	return (digit % 11) < 2 ? 0 : 11-(digit % 11);

	};

	function isValid(cpf) {
	for(let i=0; i<=9; i++) {
		if(cpf == Array(12).join(i)) {
			return false;
		}
	}
	return true;
	};

	return isValid(value) && cpfChars.join('') == value && value.length == 11;

}

function alertSuccess( msg, reload, url ) {

$(".alertify-notifier").html('');
alertify.success('<span class="glyphicon glyphicon-ok"></span> '+msg);

if (reload) {

	//$("#loading").show();
	//$(".modal").modal("hide");

	setTimeout(function(){

		if (url == undefined) {
			window.location.reload();
		}
		else {
			location.href = baseUrl+url;
		}

	}, 3000);

}

}

function alertError( msg ) {

$(".alertify-notifier").html('');
alertify.error('<span class="glyphicon glyphicon-alert"></span> '+msg);

$('.btn').removeClass('disabled');

}

function alertErrorFix( msg ) {

$(".alertify-notifier").html('');
alertify.error('<span class="glyphicon glyphicon-alert"></span> '+msg, 0);

$('.btn').removeClass('disabled');

}



// $(document).on('click', '.btn-gerar-documentos_TermoProfessor', function() {
	
// 		var modal = $("#modal-data-documento");			

// 		var id_aluno = $(this).attr('value');
// 		var id_doc = $(this).attr('rel');
	
// 		modal.find('input[name=id_aluno]').val(id_aluno);
// 		modal.find('input[name=id_doc]').val(id_doc);

// 		$(".modal").modal('hide');

// 	});
	
	$(document).on('click', '.btn-gerar-teste', function() {
	
		var modal = $("#modal-data-documento");			
		var id_aluno = $(this).attr('value');
		var id_doc = $(this).attr('rel');
	
		modal.find('input[name=id_aluno]').val(id_aluno);
		modal.find('input[name=id_doc]').val(id_doc);

		$(".modal").modal('hide');
	});

// $(document).on('click', '.btn-gerar-documentos-termoCompromissoEstagio', function() {
	
// 		var modal = $("#modal-data-documento");			

// 		var id_aluno = $(this).attr('value');
// 		var id_doc = $(this).attr('rel');
	
// 		modal.find('input[name=id_aluno]').val(id_aluno);
// 		modal.find('input[name=id_doc]').val(id_doc);

// 		$(".modal").modal('hide');
	
// });

// $(document).on('click', '.btn-gerar-documentos-planoAtividadeEstagio', function() {
	
// 		var modal = $("#modal-data-documento");			

// 		var id_aluno = $(this).attr('value');
// 		var id_doc = $(this).attr('rel');
	
// 		modal.find('input[name=id_aluno]').val(id_aluno);
// 		modal.find('input[name=id_doc]').val(id_doc);

// 		$(".modal").modal('hide');
	

// 	/*	var id_aluno = $(this).attr('value');
// 		window.open(baseUrl+'Documentos/planoAtividadeEstagio?id='+id_aluno, '_blank');
// 		alertSuccess('Arquivo gerado com sucesso!');*/
// });

// $(document).on('click', '.btn-gerar-documentos-confirmacaoEstagioEmpresa', function() {
	
// 		var modal = $("#modal-data-documento");			

// 		var id_aluno = $(this).attr('value');
// 		var id_doc = $(this).attr('rel');
	
// 		modal.find('input[name=id_aluno]').val(id_aluno);
// 		modal.find('input[name=id_doc]').val(id_doc);

// 		$(".modal").modal('hide');
	

// 		/*var id_aluno = $(this).attr('value');
// 		window.open(baseUrl+'Documentos/confirmacaoEstagioEmpresa?id='+id_aluno, '_blank');
// 		alertSuccess('Arquivo gerado com sucesso!');*/
		
// });

// $(document).on('click', '.btn-gerar-documentos-avaliacaoEstagioProfessor', function() {
	
// 		var modal = $("#modal-data-documento");			

// 		var id_aluno = $(this).attr('value');
// 		var id_doc = $(this).attr('rel');
	
// 		modal.find('input[name=id_aluno]').val(id_aluno);
// 		modal.find('input[name=id_doc]').val(id_doc);

// 		$(".modal").modal('hide');
	

// 		/*var id_aluno = $(this).attr('value');
// 		window.open(baseUrl+'Documentos/avaliacaoEstagioProfessor?id='+id_aluno, '_blank');
// 		alertSuccess('Arquivo gerado com sucesso!');*/
		
// });

// $(document).on('click', '.btn-gerar-documentos-avaliacaoEstagioEmpresa', function() {
	
// 			var modal = $("#modal-data-documento");			

// 		var id_aluno = $(this).attr('value');
// 		var id_doc = $(this).attr('rel');
	
// 		modal.find('input[name=id_aluno]').val(id_aluno);
// 		modal.find('input[name=id_doc]').val(id_doc);

// 		$(".modal").modal('hide');
	

// 		/*var id_aluno = $(this).attr('value');
// 		window.open(baseUrl+'Documentos/avaliacaoEstagioEmpresa?id='+id_aluno, '_blank');
// 		alertSuccess('Arquivo gerado com sucesso!');*/
		
// });

// $(document).on('click', '.btn-gerar-documentos-acompanhamentoEstagio', function() {
	
// 			var modal = $("#modal-data-documento");			

// 		var id_aluno = $(this).attr('value');
// 		var id_doc = $(this).attr('rel');
	
// 		modal.find('input[name=id_aluno]').val(id_aluno);
// 		modal.find('input[name=id_doc]').val(id_doc);

// 		$(".modal").modal('hide');
	

// 		/*var id_aluno = $(this).attr('value');
// 		window.open(baseUrl+'Documentos/acompanhamentoEstagio?id='+id_aluno, '_blank');
// 		alertSuccess('Arquivo gerado com sucesso!');*/
		
// });

// $(document).on('click', '.btn-gerar-documentos-declaracaoExperoencia', function() {
	
// 			var modal = $("#modal-data-documento");			

// 		var id_aluno = $(this).attr('value');
// 		var id_doc = $(this).attr('rel');
	
// 		modal.find('input[name=id_aluno]').val(id_aluno);
// 		modal.find('input[name=id_doc]').val(id_doc);

// 		$(".modal").modal('hide');
	
// /*
// 		var id_aluno = $(this).attr('value');
// 		window.open(baseUrl+'Documentos/declaracaoExperoencia?id='+id_aluno, '_blank');
// 		alertSuccess('Arquivo gerado com sucesso!');
// 		*/
// });


	/*$(document).on('click', '.head-notas', function() {
	
						img = $(this).find("span[name=seta]");
					
						if(img.hasClass("active")) {
							img.html("&#9658;");
							img.removeClass("active");
						} else {
							img.html("&#9660;");
							img.addClass("active");
						}
						

						
						$(this).next(".notas").stop().animate({
							height: "toggle"
						});
						
					});*/
					
			$(document).on('click', '.btn-documentos-inicio', function() {
		
					var modal = $("#modal-documentos-inicio");
					var id_aluno = $(this).attr('rel');
					//alert(id_aluno);
					modal.find('button[name=docs]').val(id_aluno);

			});
			
			/*$(document).on('click', '.btn-documentos-inicio', function() {
		
					var modal = $("#modal-documentos-inicio");
					var id_aluno = $(this).attr('rel');
					//alert(id_aluno);
					modal.find('a[name=docs]').val(id_aluno);

			});*/
			
			/*
			$(document).on('click', '.btn-documentos-final', function() {
		
					var modal = $("#modal-documentos-final");
					var id_aluno = $(this).attr('rel');
					//alert(id_aluno);
					modal.find('button[name=docs]').val(id_aluno);

			});*/
	
	
	// <<<<<<<<<<<<<<<<< CADASTRA ALUNO------------------------------
	
	$(document).on('submit', '#form_cadastro_aluno', function() {
		
		if (!$(this).find(".has-error").length) {
			
	
			var modal = $("#modal-cadastra-aluno");
						
						$.post(baseUrl+'cadastros/json_cadastro_aluno/', $(this).serializeArray(), function(response) {
							

							if (response.error != undefined) {
								alertError(response.error);
							}
							else {
								alertSuccess(response.success);
								//alertify.success('Success message');
								modal.modal('hide');
								$('.modal-backdrop').hide();
								document.getElementById("form_cadastro_aluno").reset();
							}
							
						}, 'JSON');				
			
		}
		
	});

	// --------------------- CADASTRA ALUNO >>>>>>>>>>>>>>>>>>>>>>>>
	
	//<<<<<<<<<<<<<<<<<<<<<< CADASTRA PROFESSOR --------------------
			
	$(document).on('submit', '#form_cadastro_professor', function() {
	

			
			var modal = $("#modal-cadastra-professor");
			
			$.post(baseUrl+'cadastros/json_cadastro_professor/', $(this).serializeArray(), function(response) {
				
				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success);
					modal.modal('hide');
					$('.modal-backdrop').hide();
					document.getElementById("form_cadastro_professor").reset();
					
				}
				
			}, 'JSON');
			
		
		
	});	
	// --------------------- CADASTRO PROFESSOR >>>>>>>>>>>>>>>>>>>>>>>>
	
	//<<<<<<<<<<<<<<<<<<<<<< CADASTRA EMPRESA --------------------	
			
	$(document).on('submit', '#form_cadastro_empresa', function() {
	
	
		if (!$(this).find(".has-error").length) {
			
			var modal = $("#modal-cadastra-empresa");
		

			$.post(baseUrl+'cadastros/json_cadastro_empresa/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success);
					modal.modal('hide');
					$('.modal-backdrop').hide();
					document.getElementById("form_cadastro_empresa").reset();
				}
				
			}, 'JSON');
			
		}
		
	});			
	//// --------------------- CADASTRO EMPRESA >>>>>>>>>>>>>>>>>>>>>>>>
	
	// --------------------- CADASTRO SUPERVISOR >>>>>>>>>>>>>>>>>>>>>>>>
			
	$(document).on('submit', '#form_cadastro_supervisor', function() {

		if (!$(this).find(".has-error").length) {
			
			var modal = $("#modal-cadastra-supervisor");

			$.post(baseUrl+'cadastros/json_cadastro_supervisor/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success);
					modal.modal('hide');
					$('.modal-backdrop').hide();
					document.getElementById("form_cadastro_supervisor").reset();
				}
				
			}, 'JSON');
			
		}
		
	});
	// --------------------- CADASTRO SUPERVISOR >>>>>>>>>>>>>>>>>>>>>>>>
	
	
	$(document).on('change', '#form_adiciona_estagio select[name=empresa]', function() {
	
		var modal = $("#modal-adiciona-estagio");

			$.post(baseUrl+'cadastros/json_pesquisa_supervisores/', $(this).serializeArray(), function(response) {
				
				//alert('alou');
				
				if (response.error != undefined) {
					//alertError(response.error);
				}
				else {
					
					var html = '<option value="">Selecione</option>';
						$.each(response, function(key, h) {
					html += '<option value="'+h.id_supervisor+'">'+h.nome+'</option>';
					});
					modal.find("select[name=supervisor]").html(html);
					}
			
			}, 'JSON');

	
	
	});
	
	// ADICIONA ESTAGIOS ******
	
		$(document).on('submit', '#form_adiciona_estagio', function() {

		if (!$(this).find(".has-error").length) {
			
			var modal = $("#modal-adiciona-estagio");
			
					/*var dataArray = $("#form_adiciona_estagio").serializeArray(),
			dataObj = {};

			$(dataArray).each(function(i, field){
			  dataObj[field.name] = field.value;
			  
			  				alert(field.name+'='+field.value);
			  
			});*/

			$.post(baseUrl+'cadastros/json_adiciona_estagios/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success, true);
					$('.loading').modal('show');
					modal.modal('hide');
					//$('.modal-backdrop').hide();
				}
				
			}, 'JSON');
			
		}
		
	});
	
		// ADICIONA ESTAGIOS ******
	
	$(document).on('click', '.btn-estagio-detalhes', function() {
		
		var modal = $("#modal-detalhes-estagio");
		var id_estagio = $(this).attr('rel');
		
		$.post(baseUrl+'Main/detalhesEstagio/', {
			id_estagio : id_estagio
		}, function(response) {

			modal.find('.modal-body').html(response);
			// call_data_table();
				
		});
		
	});

	
	//<<<<<<<<<<<<<<<<<<<<< Registrar desistencia ---------------------------------
	
	$(document).on('submit', '#form_registrar_desistencia', function() {

		if (!$(this).find(".has-error").length) {
			
			var modal = $("#modal-registrar-desistencia");
			
			//$.post(baseUrl+'main/json_confirmar_documentos/', $(this).serializeArray(), function(response) {

			$.post(baseUrl+'main/json_registrar_desistencia/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success, true);
					modal.modal('hide');
					//$('.modal-backdrop').hide();
				}
				
			}, 'JSON');
			
		}
		
	});
	
	
	// Função que busca os dados que serão montados o Certificado
	$(document).on('click', '.btn-registrar-desistencia', function() {
		

			var modal = $("#modal-registrar-desistencia");
			//var id_estagio = $(this).attr('rel');
			var e = $(this).attr('rel').split('|');
	
			var id_estagio = e[0];
			var id_aluno = e[1];
			
			modal.find('input[name=id_estagio]').val(id_estagio);
			modal.find('input[name=id_aluno]').val(id_aluno);
			
			$.post(baseUrl+'Main/detalhesEstagioParaCertificado/',{id_estagio : id_estagio}, function(response) {
				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
				//alertSuccess(response.success, true);
				//alert(response.nome_aluno);
				modal.find('span[name=nome_aluno]').text(response.nome_aluno);


				}
				
			}, 'JSON');
			
	});
	
	
	// ----------------- registrar desistencia ---------------------------------------
	
	// ----------------- EDITAR PROFESSOR ---------------------------------------
	
	$(document).on('click', '.btn-editar-professor', function() {
		

			var modal = $("#modal-editar-professor");
			var id_professor = $(this).attr('rel');
			
			$.post(baseUrl+'professores/json_get_professor/',{id_professor : id_professor} , function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					//alertSuccess(response.success, true);
				//alert(id_professor);
				modal.find('input[name=nome]').val(response.nome);
				modal.find('input[name=id_professor]').val(id_professor);
				modal.find('input[name=email]').val(response.email);

				}
				
			}, 'JSON');
			
		
	});
	
	$(document).on('submit', '#form_editar_professor', function() {

		if (!$(this).find(".has-error").length) {
			
			var modal = $("#modal-editar-professor");

			$.post(baseUrl+'professores/json_editar_professor/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success, true);
					modal.modal('hide');
					//$('.modal-backdrop').hide();
				}
				
			}, 'JSON');
			
		}
		
	});
	// ----------------- EDITAR PROFESSOR -------------------------------------
	
	//------------------  EDITAR EMPRESA  -------------------------------------
	
	$(document).on('click', '.btn-editar-empresa', function() {
		

			var modal = $("#modal-editar-empresa");
			var id_empresa = $(this).attr('rel');
			
			$.post(baseUrl+'empresas/json_get_empresa/',{id_empresa : id_empresa} , function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					//alertSuccess(response.success, true);
				//alert(id_empresa);
				modal.find('input[name=nome]').val(response.nome);
				modal.find('input[name=id_empresa]').val(id_empresa);
				modal.find('input[name=email]').val(response.email);
				modal.find('input[name=razao_social]').val(response.razao_social);
				modal.find('input[name=cnpj]').val(response.cnpj);
				modal.find('input[name=cidade]').val(response.cidade);
				modal.find('input[name=ramo_atividade]').val(response.ramo_atividade);
				modal.find('input[name=telefone]').val(response.telefone);
				modal.find('input[name=endereco]').val(response.endereco);
				modal.find('input[name=representante_legal]').val(response.rep_legal);
				modal.find('input[name=cargo_representante]').val(response.rep_cargo);

				modal.find('input[name=rg_representante_legal]').val(response.rep_rg);
				modal.find('input[name=orgao_exp_representante_legal]').val(response.rep_orgao_emissor);
				modal.find('input[name=data_exp_representante_legal]').val(response.rep_data_expedido);
				modal.find('input[name=cargo_representante_cpf]').val(response.rep_cpf);

				}
				
			}, 'JSON');
			
		
	});
	
	$(document).on('submit', '#form_editar_empresa', function() {

		if (!$(this).find(".has-error").length) {
			
			var modal = $("#modal-editar-empresa");

			$.post(baseUrl+'empresas/json_editar_empresa/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success, true);
					modal.modal('hide');
					//$('.modal-backdrop').hide();
				}
				
			}, 'JSON');
			
		}
		
	});
	//----------------- EDITAR EMPRESA------------------------------->> 
	
	//----------------- EDITAR ALUNO------------------------------>>
	
	$(document).on('click', '.btn-editar-aluno', function() {
		

			var modal = $("#modal-editar-aluno");
			var id_aluno = $(this).attr('rel');
			
			
			
			$.post(baseUrl+'alunos/json_get_aluno/',{id_aluno : id_aluno} , function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					//alertSuccess(response.success, true);
				//alert(id_aluno);
				modal.find('input[name=nome]').val(response.nome);
				modal.find('input[name=id_aluno]').val(id_aluno);
				modal.find('input[name=email]').val(response.email);
				modal.find('input[name=curso]').val(response.curso);
				modal.find('input[name=turma]').val(response.turma);
				modal.find('input[name=cpf]').val(response.cpf);
				modal.find('input[name=rg]').val(response.rg);
				modal.find('input[name=data_nascimento]').val(response.data_nascimento);
				modal.find('input[name=orgao_expedidor]').val(response.orgao_expedidor);
				modal.find('input[name=data_exp]').val(response.data_exp);
				modal.find('input[name=telefone]').val(response.telefone);
				modal.find('input[name=celular]').val(response.celular);
				modal.find('input[name=uf]').val(response.uf);
				modal.find('input[name=CEP]').val(response.CEP);
				modal.find('input[name=cidade]').val(response.cidade);
				modal.find('input[name=bairro]').val(response.bairro);
				modal.find('input[name=endereco]').val(response.endereco);
				}
				
			}, 'JSON');
			
		
	});
	
	$(document).on('submit', '#form_editar_aluno', function() {

		if (!$(this).find(".has-error").length) {
			
			var modal = $("#modal-editar-aluno");
			
			/*var dataArray = $("#form_editar_aluno").serializeArray(),
			dataObj = {};

			$(dataArray).each(function(i, field){
			  dataObj[field.name] = field.value;
			  
			  				alert(field.name+'='+field.value);
			  
			});*/
			
			$.post(baseUrl+'alunos/json_editar_aluno/', $(this).serializeArray(), function(response) {

				//alert(response);
				
				if (response.error != undefined) {
					//alertError(response.error);
				}
				else {
					alertSuccess(response.success, true);
					modal.modal('hide');
					//$('.modal-backdrop').hide();
				}
				
			}, 'JSON');
			
		}
		
	});
	//------------------EDITAR ALUNO------------------------------->>
	
	
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
		
      form.addEventListener('submit', function(event) {
		  
        if (form.checkValidity() === false) {
		  event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
	  
    });
  }, false);
 
})();




	//------------------------ Confirma entrega de documentos ---------------------------------
	
	
	$(document).on('submit', '#form_confirmar_documentos', function() {

		if (!$(this).find(".has-error").length) {
			
			var modal = $("#modal-confirma-documentos");

			$.post(baseUrl+'main/json_confirmar_documentos/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success, true);
					$('.loading').modal('show');
					modal.modal('hide');
					//$('.modal-backdrop').hide();
				}
				
			}, 'JSON');
			
		}
		
	});
	
	
	// Função que busca os dados que serão montados o Certificado
	$(document).on('click', '.btn-confirmar-documentos', function() {
		

			var modal = $("#modal-confirma-documentos");
			//var id_estagio = $(this).attr('rel');
			var e = $(this).attr('rel').split('|');
	
			var id_estagio = e[0];
			var id_aluno = e[1];
			
			//alert(id_aluno);
			
			modal.find('input[name=id_estagio]').val(id_estagio);
			modal.find('input[name=id_aluno]').val(id_aluno);
			
			$.post(baseUrl+'Main/detalhesEstagioParaCertificado/',{id_estagio : id_estagio}, function(response) {
				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
				modal.find('span[name=nome_aluno]').text(response.nome_aluno);


				}
				
			}, 'JSON');
			
	});
	
	//------------------------ Confirma entrega de documentos >>>>>>>>>>>>>>>>>>>>>>>>>>
	
	
	
	$(document).on('change', '#form_editar_estagio select[name=empresa]', function() {
	
		var modal = $("#modal-editar-estagio");
	
			$.post(baseUrl+'cadastros/json_pesquisa_supervisores/', $(this).serializeArray(), function(response) {
				
				//alert('alou');
				
				if (response.error != undefined) {
					//alertError(response.error);
				}
				else {
					
					var html = '<option value="">Selecione</option>';
						$.each(response, function(key, h) {
					html += '<option value="'+h.id_supervisor+'">'+h.nome+'</option>';
					});
					modal.find("select[name=supervisor]").html(html);
					}
			
			}, 'JSON');

	
	
	});
	
	$(document).on('click', '.btn-editar-estagio', function() {
		

			var modal = $("#modal-editar-estagio");
			var id_estagio = $(this).attr('rel');
			
			$.post(baseUrl+'main/json_get_estagio/',{id_estagio : id_estagio} , function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
				
					modal.find('input[name=id_estagio]').val(response.id_estagio);
					modal.find('input[name=nome]').val(response.nome);
					modal.find('input[name=data_ini]').val(response.data_inicio);
					modal.find('input[name=data_fim]').val(response.data_termino);
					modal.find('input[name=ch_dia]').val(response.carga_horaria_dia);
					modal.find('input[name=ch]').val(response.carga_horaria);
					modal.find('input[name=atv_pre]').val(response.atividade_prevista);
					modal.find('input[name=id_aluno]').val(response.id_aluno);
					
					//Radio
					 modal.find('input[name=agente][value='+response.agente_integracao+']').prop('checked', true);
				
				
					//Select
					modal.find('select[name=aluno]').val(response.id_aluno);
					modal.find('select[name=empresa]').val(response.id_empresa);
					modal.find('select[name=turno]').val(response.turno);
					modal.find('select[name=professor]').val(response.id_professor);
 
					//Checkbox
					modal.find("input[name=obrigatorio]").prop('checked', (response.obrigatorio == 1));
					modal.find("input[name=remuneracao]").prop('checked', (response.remuneracao == 1));
					modal.find("input[name=transporte]").prop('checked', (response.transporte == 1));
					modal.find("input[name=alimentacao]").prop('checked', (response.alimentacao == 1));
					
						var empresa = response.id_empresa;
						$.post(baseUrl+'cadastros/json_pesquisa_supervisores/',{empresa : empresa}, function(response2) {
				
								var html = '<option value="">Selecione</option>';
									$.each(response2, function(key, h) {
										html += '<option value="'+h.id_supervisor+'" '+ (response.id_supervisor ==  h.id_supervisor ? 'selected' : '')+'>'+h.nome+'</option>';
									});
								modal.find("select[name=supervisor]").html(html);
								
								
						
						}, 'JSON');

				}
				
			}, 'JSON');
			
		
	});
	
	
	$(document).on('submit', '#form_editar_estagio', function() {

		if (!$(this).find(".has-error").length) {
			
			var modal = $("#modal-editar-estagio");
			
					/*var dataArray = $("#form_editar_estagio").serializeArray(),
			dataObj = {};

			$(dataArray).each(function(i, field){
			  dataObj[field.name] = field.value;
			  
			  				alert(field.name+'='+field.value);
			  
			});*/

			$.post(baseUrl+'cadastros/json_editar_estagios/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success, true);
					modal.modal('hide');
					//$('.modal-backdrop').hide();
				}
				
			}, 'JSON');
			
		}
		
	});
	
	
	// Finalizar Estagio ----------------------------------------------
	
	$(document).on('submit', '#form_finalizar_estagio', function() {

		if (!$(this).find(".has-error").length) {
			
			var modal = $("#modal-finalizar-estagio");
			

			$.post(baseUrl+'main/json_finalizar_estagio/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success, true);
					modal.modal('hide');
				}
				
			}, 'JSON');
			
		}
		
	});
	
	
	$(document).on('click', '.btn-finalizar-estagio', function() {
		

			var modal = $("#modal-finalizar-estagio");
			//var id_estagio = $(this).attr('rel');
			var e = $(this).attr('rel').split('|');
	
			var id_estagio = e[0];
			var id_aluno = e[1];
			
			
			
			modal.find('input[name=id_estagio]').val(id_estagio);
			modal.find('input[name=id_aluno]').val(id_aluno);
			
			$.post(baseUrl+'Main/detalhesEstagioParaCertificado/',{id_estagio : id_estagio}, function(response) {
				
				
				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					//alert(id_aluno);
				modal.find('span[name=nome_aluno]').text(response.nome_aluno);


				}
				
			}, 'JSON');
			
	});
	
		$(document).on('submit', '#form_cadastro_empresa_usuario', function() {
	
	
		if (!$(this).find(".has-error").length) {
			
			$.post(baseUrl+'paginas_cadastros/json_cadastro_empresa/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {

					//alert(system_url+'/main/index');
					
					window.location.href = system_url+'/main/index';
					
				}
				
			}, 'JSON');
			
		}
		
	});	
	
	
	$(document).on('click', '.detalhes-horas', function() {
		

			var modal = $("#modal-detalhes-horas");
			var id_aluno = $(this).attr('rel');
	
			$.post(baseUrl+'alunos/json_detalhes_horas/',{id_aluno : id_aluno}, function(response) {
			

				modal.find('.modal-body').html(response);

				
			});
			
	});
	
	$(document).on('click', '.teste', function() {
	
	// $("#passo2_cad").click(function(){
   

      var senha = $(".senha").val();
     // var senha = $("#user_password").val();
      var senha_confirma = $(".senhaconf").val();
      //var senha_confirma = $("#user_confirm_password").val();
   
     // if(!senha || !senha_confirma){
		  
         if((!senha)||(senha.length<4)){
			// alert('vish');
            $(".senha").css('border', '2px solid red');
            $(".senha").attr("placeholder", "Minimo de 4 caracteres!");
           // $( ".senha" ).focus();
            return;
         }/*else{
            $("#user_email").css('border', '2px solid #70e870');
         }
      
         /*if(senha_confirma){
            $("#user_confirm_password").css('border', '2px solid red');
            return;
         }else{
            $("#user_email").css('border', '2px solid #70e870');
         }*/
      //}

      if(senha !== senha_confirma){

         $(".senhaConf").val("");
         $(".senha").css('border', '2px solid red');
         $(".senhaConf").css('border', '2px solid red');
         $(".senhaConf").attr("placeholder", "senhas não conferem!");
         //$(".senhaConf" ).focus();
         return;
      }
   
     // $('input[id^="user_"]').css('border', '2px solid #70e870');
      //alert("Deu tudo certo!");
   
   });
   
   //----------Atualiza sennha -------------------------

	$(document).on('click', '.atualiza-senha', function() {
		
			var e = $(this).attr('rel').split('|');
	
			var id_empresa = e[0];
			var email = e[1];
	
			$.post(baseUrl+'empresas/json_nova_senha/',{id_empresa : id_empresa, email : email}, function(response) {
			
			
							if (response.error != undefined) {
								alertError(response.error);
							}
							else {
								alertSuccess(response.success);

							}

				
			});
			
	});
	
	// Editar Supervisor
	
	$(document).on('click', '.btn-editar-supervisor', function() {
		

			var modal = $("#modal-editar-supervisor");
			var id_supervisor = $(this).attr('rel');
			
			$.post(baseUrl+'supervisores/json_get_supervisor/',{id_supervisor : id_supervisor} , function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					//alertSuccess(response.success, true);
				//alert(id_professor);
				modal.find('input[name=nome]').val(response.nome);
				modal.find('input[name=id_supervisor]').val(id_supervisor);
				modal.find('input[name=email]').val(response.email);
				modal.find('input[name=telefone]').val(response.telefone);
				modal.find('input[name=formacao]').val(response.formacao);
				modal.find('select[name=id_empresa]').val(response.id_empresa);

				}
				
			}, 'JSON');
			
		
	});
	
	$(document).on('submit', '#form_editar_supervisor', function() {

		if (!$(this).find(".has-error").length) {
			
			var modal = $("#modal-editar-supervisor");

			$.post(baseUrl+'supervisores/json_editar_supervisor/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success, true);
					modal.modal('hide');
					//$('.modal-backdrop').hide();
				}
				
			}, 'JSON');
			
		}
		
	});
	
	// Excluir supervisor ---------------------------------------------------------------
	
	$(document).on('submit', '#form_excluir_supervisor', function() {

		if (!$(this).find(".has-error").length) {
			
			var modal = $("#modal-excluir-supervisor");

			$.post(baseUrl+'supervisores/json_excluir_supervisor/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success, true);
					modal.modal('hide');
					//$('.modal-backdrop').hide();
				}
				
			}, 'JSON');
			
		}
		
	});
	

	$(document).on('click', '.btn-exclui-supervisor', function() {
		

			var modal = $("#modal-excluir-supervisor");
			var id_supervisor = $(this).attr('rel');
			
			modal.find('input[name=id_supervisor]').val(id_supervisor);
			
			//alert(id_supervisor);
			
			$.post(baseUrl+'supervisores/json_get_supervisor/',{id_supervisor : id_supervisor}, function(response) {
				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
				//alertSuccess(response.success, true);
				//alert(response.nome_aluno);
				modal.find('span[name=nome]').text(response.nome);


				}
				
			}, 'JSON');
			
	});
	
	// Exlcui Empresa >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>..
	
	$(document).on('submit', '#form_excluir_empresa', function() {

		if (!$(this).find(".has-error").length) {
			
			var modal = $("#modal-excluir-empresa");

			$.post(baseUrl+'empresas/json_excluir_empresa/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success, true);
					modal.modal('hide');
					//$('.modal-backdrop').hide();
				}
				
			}, 'JSON');
			
		}
		
	});

	$(document).on('click', '.btn-exclui-empresa', function() {
		

			var modal = $("#modal-excluir-empresa");
			var id_empresa = $(this).attr('rel');
			
			modal.find('input[name=id_empresa]').val(id_empresa);
			
			//alert(id_supervisor);
			
			$.post(baseUrl+'empresas/json_get_empresa/',{id_empresa : id_empresa}, function(response) {
				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
				//alertSuccess(response.success, true);
				//alert(response.nome_aluno);
				modal.find('span[name=nome]').text(response.nome);
				modal.find('span[name=razao]').text(response.razao_social);


				}
				
			}, 'JSON');
			
	});
	// Exlcui Empresa >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>..
	
		// Exlcui PROFESSOR >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>..
	
	$(document).on('submit', '#form_excluir_professor', function() {

		if (!$(this).find(".has-error").length) {
			
			var modal = $("#modal-excluir-professor");

			$.post(baseUrl+'professores/json_excluir_professor/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success, true);
					modal.modal('hide');
					//$('.modal-backdrop').hide();
				}
				
			}, 'JSON');
			
		}
		
	});

	$(document).on('click', '.btn-exclui-professor', function() {
		

			var modal = $("#modal-excluir-professor");
			var id_professor = $(this).attr('rel');
			
			modal.find('input[name=id_professor]').val(id_professor);
			
			//alert(id_supervisor);
			
			$.post(baseUrl+'professores/json_get_professor/',{id_professor : id_professor}, function(response) {
				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
				//alertSuccess(response.success, true);
				//alert(response.nome_aluno);
				modal.find('span[name=nome]').text(response.nome);

				}
				
			}, 'JSON');
			
	});
	// Exlcui PROFESSOR >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>..
	
		// Exlcui Aluno >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>..
	
	$(document).on('submit', '#form_excluir_aluno', function() {

		if (!$(this).find(".has-error").length) {
			
			var modal = $("#modal-excluir-aluno");

			$.post(baseUrl+'alunos/json_excluir_aluno/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success, true);
					modal.modal('hide');
					//$('.modal-backdrop').hide();
				}
				
			}, 'JSON');
			
		}
		
	});

	$(document).on('click', '.btn-exclui-aluno', function() {
		

			var modal = $("#modal-excluir-aluno");
			var id_aluno = $(this).attr('rel');
			
			modal.find('input[name=id_aluno]').val(id_aluno);
			
			//alert(id_supervisor);
			
			$.post(baseUrl+'alunos/json_get_aluno/',{id_aluno : id_aluno}, function(response) {
				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
				//alertSuccess(response.success, true);
				//alert(response.nome_aluno);
				modal.find('span[name=nome]').text(response.nome);
				modal.find('span[name=turma]').text(response.turma);
				modal.find('span[name=curso]').text(response.curso);

				}
				
			}, 'JSON');
			
	});
	// Exlcui Aluno >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>..
	
	
	// Edita dados da empresa ------------------------------------------------		
	$(document).on('click', '.edit_info', function() {
		
			var input = $(this).attr('rel');
			
			//alert(input);
			
			$('.'+input).removeAttr("disabled");
	
			
	});
	
	$(document).on('submit', '#form_edit_info_emp', function() {

		if (!$(this).find(".has-error").length) {
			
						/*	var dataArray = $("#form_edit_info_emp").serializeArray(),
			dataObj = {};

			$(dataArray).each(function(i, field){
			  dataObj[field.name] = field.value;
			  
			  				alert(field.name+'='+field.value);
			  
			});*/
			
			$.post(baseUrl+'empresas/json_editar_dados_empresa/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success, true);
				}
				
			}, 'JSON');
			
		}
		
	});
	
	
	
      var verifyCallback = function(response) {
	   	$('button[name=captcha]').removeAttr("disabled");
      };
      var onloadCallback = function() {
        grecaptcha.render('example3', {
          'sitekey' : '6LdLwLcUAAAAAK8DH883seJbJXD70O6rBP_mWSBl',
          'callback' : verifyCallback
        });
      };
	


function call_tiny_mce() {
	
/*	tinymce.init({
  selector: 'textarea#image-tools',
  height: 500,
  plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table paste imagetools wordcount"
  ],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tiny.cloud/css/codepen.min.css'
  ]
});*/

	
	
	/*tinymce.init({
		selector : ".tinymce",
		plugins : "image paste textcolor link charmap fullscreen spellchecker code",
		height : '800px',
		width: '70%',
		//fontsize_formats: "3pt 8pt 10pt 12pt 14pt 18pt",
		//font_formats: "Arial=arial,helvetica,sans-serif;Verdana=verdana,geneva;Teste=Open Sans",
		toolbar_items_size : 'small',
		menu : {

		},
		toolbar1:
			"bold italic underline strikethrough | bullist numlist | outdent indent | alignleft aligncenter alignright alignjustify | link unlink | undo redo | code | "
		,
		toolbar2:
			"image | styleselect | fontselect | fontsizeselect | forecolor backcolor removeformat | charmap fullscreen "
		,
		setup : function(ed) {
			ed.on('keyup', function(e) {
				$(tinyMCE.activeEditor.getElement()).val(tinyMCE.activeEditor.getContent());
				$(tinyMCE.activeEditor.getElement()).trigger("change");
			});
			ed.on('change', function(e) {
				$(tinyMCE.activeEditor.getElement()).val(tinyMCE.activeEditor.getContent());
				$(tinyMCE.activeEditor.getElement()).trigger("change");
			});
		},

		forced_root_block : false,
		//language : 'pt_BR',
		statusbar : false,
		resize: false,
		paste_data_images: true,
		browser_spellcheck : true
	});*/
	
	tinymce.init({
	  selector:'.tinymce',
	  plugins: "image,preview,importcss,table,lists",
	  height : '600px',
	  width: '100%',
	  //importcss_append: true,
	  //images_upload_url: 'public/js/upload.php',
	  images_upload_handler: function (blobInfo, success, failure) {
		var xhr, formData;

		xhr = new XMLHttpRequest();
		xhr.withCredentials = false;
		xhr.open('POST', 'upload.php');

		xhr.onload = function() {
		  var json;

		  if (xhr.status != 200) {
			failure('HTTP Error: ' + xhr.status);
			return;
		  }

		  json = JSON.parse(xhr.responseText);

		  if (!json || typeof json.location != 'string') {
			failure('Invalid JSON: ' + xhr.responseText);
			return;
		  }

		  success(json.location);
		};

		formData = new FormData();
		formData.append('file', blobInfo.blob(), blobInfo.filename());

		xhr.send(formData);
	  },
		toolbar: 'undo redo | formatselect | fontsizeselect | fontselect | bold italic underline backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | help',
		fontsize_formats: '8px 9px 10px 11px 12px 14px 18px 24px 30px 36px 48px 60px 72px 96px',
		font_formats: 'Arial Black=arial black,avant garde;Indie Flower=indie flower, cursive;Times New Roman=times new roman,times;Calibri=calibri,sans-serif',
		force_br_newlines : true,
        force_p_newlines : false
  });
	
}
	
	//Editar documentos-----------------------------------------------------------------------
	$(document).on('click', '.btn-editar-doc', function() {
		
		var modal = $("#modal-editar-documento");
		var doc_id = $(this).attr('rel');

		$.post(baseUrl+'Documentos/json_get_doc/', {doc_id : doc_id}, (response) => {
			modal.find('input[name=doc_id]').val(response.doc_id);
			tinyMCE.activeEditor.setContent(response.texto);
			modal.find('input[name=titulo]').val(response.titulo);
			
		}, 'JSON');

	});
	
	$(document).on('submit', '#form_editar_doc', function() {

		if (!$(this).find(".has-error").length) {

			
			$.post(baseUrl+'documentos/json_editar_doc/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					//alert('este');
					alertSuccess(response.success, true);
				}
				
			}, 'JSON');
			
		}
		
	});
	//Editar rodape-----------------------------------------------------------------------
	$(document).on('click', '.btn-editar-rodape', function() {
		
		var modal = $("#modal-editar-rodape");
		var rodape_id = $(this).attr('rel');
		
		$.post(baseUrl+'documentos/json_get_rodape/', {rodape_id : rodape_id}, function(response) {
			
			tinyMCE.activeEditor.setContent(response.texto);
			modal.find('input[name=titulo]').val(response.titulo);
			modal.find('input[name=rodape_id]').val(response.rodape_id);
			
		}, 'JSON');
		
	});
	
	$(document).on('submit', '#form_editar_rodape', function() {

		if (!$(this).find(".has-error").length) {
			
			alert('aloooo');

			$.post(baseUrl+'documentos/json_editar_rodape/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					//alert('este');
					alertSuccess(response.success, true);
				}
				
			}, 'JSON');
			
		}
		
	});
	//---------------------------------------------------------------------------------------
	
		
	
	
	

	//---------------------------------------------------------------------------------------
	//Excluir documentos --------------------------------------------------------------------
	
	$(document).on('click', '.btn-excluir-doc', function() {
		
		var modal = $("#modal-excluir-documento");
		var doc_id = $(this).attr('rel');
		
		$.post(baseUrl+'documentos/json_get_doc/', {doc_id : doc_id}, function(response) {
			
			modal.find('span[name=titulo]').text(response.titulo);
			modal.find('input[name=doc_id]').val(response.doc_id);
			
		}, 'JSON');
		
	});
	
	$(document).on('submit', '#form_excluir_documento', function() {

		if (!$(this).find(".has-error").length) {

			
			$.post(baseUrl+'documentos/json_excluir_doc/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success, true);
				}
				
			}, 'JSON');
			
		}
		
	});
	
	//---------------------------------------------------------------------------------------
	
	/*$(document).on('click', '.btn-visualizar-doc', function() {
		
		var modal = $("#modal-editar-doc");
		//var texto_doc = $(this).attr('rel');
		//var mensagem = $('#mensagem').val();
		var mensagem = tinyMCE.activeEditor.getContent();
		alert(mensagem);
		
	$.post(baseUrl+'documentos/visualizar/', {mensagem : mensagem} , function(response){

			 window.open(baseUrl+'documentos/visualizar/');
				/*if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success);
					
						//window.open(baseUrl+'Documentos/visualizar?doc='+doc, '_blank');
						window.open(baseUrl+'Documentos/visualizar?doc='+doc, '_blank');

				}*/
				/*
			}, 'JSON');
		

	});*/
		
	/*
	
	$(document).on('submit', '#form_edit_info_emp', function() {

		if (!$(this).find(".has-error").length) {
			
						/*	var dataArray = $("#form_edit_info_emp").serializeArray(),
			dataObj = {};

			$(dataArray).each(function(i, field){
			  dataObj[field.name] = field.value;
			  
			  				alert(field.name+'='+field.value);
			  
			});*/
			/*
			$.post(baseUrl+'empresas/json_editar_dados_empresa/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success);
					
						//window.open(baseUrl+'Documentos/visualizar?doc='+doc, '_blank');
						window.open(baseUrl+'Documentos/visualizar?doc='+doc, '_blank');

				}
				
			}, 'JSON');
			
		}
		
	});*/
	
	
	$(document).on('submit', '#form_novo_doc', function() {

		if (!$(this).find(".has-error").length) {
			
			$.post(baseUrl+'documentos/json_novo_doc/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alertSuccess(response.success, true);
				}
				
			}, 'JSON');
			
		}
		
	});
	
	$(document).on('click', '.btn-visualizar-doc', function() {
			
		var id_doc = $(this).attr('rel');
			
		window.open(baseUrl+'Documentos/visualizar?id='+id_doc, '_blank');	
		
	});
	// Novo rodapé--------------------------------------------------------
	$(document).on('submit', '#form_novo_rodape', function() {

		if (!$(this).find(".has-error").length) {
			
						/*	var dataArray = $("#form_edit_info_emp").serializeArray(),
			dataObj = {};

			$(dataArray).each(function(i, field){
			  dataObj[field.name] = field.value;
			  
			  				alert(field.name+'='+field.value);
			  
			});*/
			
			$.post(baseUrl+'documentos/json_novo_rodape/', $(this).serializeArray(), function(response) {

				if (response.error != undefined) {
					alertError(response.error);
				}
				else {
					alert('este');
					alertSuccess(response.success, true);
				}
				
			}, 'JSON');
			
		}
		
	});
	// Novo Rodapé ---------------------------------------------------------------------------------
	
	// < Atribui tipo ao documento -----------------------------------------------------------------
		//$(document).on('change', '#form_adiciona_estagio select[name=empresa]', function() {
		$(document).on('change', '.atribuir-tipo', function() {
		
		var doc_id = $(this).attr('rel');
		var tipo = $(this).val();

			$.post(baseUrl+'documentos/json_atribuir_tipo/', {doc_id : doc_id,tipo : tipo}, function(response) {

				if (response.error != undefined) {
					alertError(response.error);
					//$('.btn').removeClass('disabled');
				}
				else {
					alertSuccess(response.success);
				}
				
			}, 'JSON');
	});

	$(document).ready( function () {
		$('#dataTable').DataTable();
	} );
	
	