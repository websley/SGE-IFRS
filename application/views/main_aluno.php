<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');
	
	$date = '1994/03/31';
	
	//echo strftime('Osório, %d de %B de %Y', strtotime($date));
	
	//echo strftime('Osorio, %d de %B de %Y', strtotime('today'));

?>
<!--

<title>Exemplo de uso do TinyMCE</title>
<script src="https://cdn.tinymce.com/4/tinymce.min.js" type="2518a175a14acf53af3116bf-text/javascript"></script>
<script type="2518a175a14acf53af3116bf-text/javascript"> tinymce.init({ selector: 'textarea' });
	</script>
</head>
<body>
<form method="Post">
<textarea class="tinymce"></textarea>
<br>
<button type="submit">Enviar</button>
</form>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/95c75768/cloudflare-static/rocket-loader.min.js" data-cf-settings="2518a175a14acf53af3116bf-|49" defer=""></script></body>

-->


<!--
<div>
<div class="form-group">
						<div class="col-md-12">
							<strong>Mensagem</strong>
						</div>  
						<label class="col-md-2 control-label" for="mensagem">
							Tags:<br/>
							<span style="font-weight: normal;">
								{NOME}<br/>
								{NOMECOMPLETO}<br/>
								{CPF}<br/>
								{CURSO}<br/>
								{EMAIL}<br/>
								{FIXO}<br/>
								{CEALULAR}<br/>
								{DATA_PROVA}<br/>
								{HORA_PROVA}<br/>
								{POLO}<br/>
								{ATENDENTE}<br/>
							</span>
						</label>  
						<div class="col-md-10">
							<textarea name="mensagem" class="form-control tinymce" rows="12"></textarea>
							<script>
							$(function() {
								setTimeout(function() {
									tinyMCE.get('mensagem').setContent('<img src="<?= base_url('public/img/emails/header.jpg') ?>"><br/><br/>Olá {NOME},<br/><br/>...<br/><br/><img src="<?= base_url('public/img/emails/footer.jpg') ?>">');
								}, 5000);
							});
							</script>
						</div>
					</div>
					</div>


-->

<!DOCTYPE html>
 <script src = "https://cdn.tiny.cloud/1/8ck3p3w3s2vpzj9bwwg06ssxmtmqcq0p4zcqzfvez1c56ozd/tinymce/5/tinymce.min.js"> </script>
  <script>tinymce.init({ 
  selector:'#texte',
  plugins: "importcss,image,preview",
  content_css: "/my-styles.css",
  images_upload_handler: function (blobInfo, success, failure) {
    var xhr, formData;

    xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open('POST', 'postAcceptor.php');

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

  });</script>
</head>
<body>
<form action="POST">
  <textarea id="texte">Next, get a free Tiny Cloud API key!</textarea>
</form>
</body>
</html>













<!--
<div>
<input size="42" value="" id="user_email" placeholder="Email">
<input size="42" type="password" value="" id="user_password" placeholder="Senha">
<input size="42" type="password" value="" id="user_confirm_password" placeholder="Confirma senha">
<button id="passo2_cad">Verificar</button>
</div>

<script type="text/javascript">
/*
$(document).ready(function(){

   $("#passo2_cad").click(function(){
   
      var email = $("#user_email").val();
      // filtros
      var emailFilter=/^.+@.+\..{2,}$/;
      var ilegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/
   
      var senha = $("#user_password").val();
      var senha_confirma = $("#user_confirm_password").val();
   
      if(!senha || !senha_confirma || !email){
		  
   
         if((!senha)||(senha.length<4)){
            $("#user_password").css('border', '2px solid red');
            $("#user_password").attr("placeholder", "Minimo de 4 caracteres!");
            $( "#user_password" ).focus();
            return;
         }else{
            $("#user_email").css('border', '2px solid #70e870');
         }
      
         if(senha_confirma){
            $("#user_confirm_password").css('border', '2px solid red');
            return;
         }else{
            $("#user_email").css('border', '2px solid #70e870');
         }
      }
   
      if(senha !== senha_confirma){
         $("#user_confirm_password").val("");
         $("#user_password").css('border', '2px solid red');
         $("#user_confirm_password").css('border', '2px solid red');
         $("#user_confirm_password").attr("placeholder", "senhas não conferem!");
         $( "#user_confirm_password" ).focus();
         return;
      }
   
      $('input[id^="user_"]').css('border', '2px solid #70e870');
      alert("Deu tudo certo!");
   
   });
});

</script>*/

-->




</body>
</html>
