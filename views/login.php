<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>Login</title>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<link rel='stylesheet' type='text/css' media='screen' href='../css/style.css'>
		<link rel='stylesheet' type='text/css' media='screen' href='../css/bigStyle.css'>
		<link rel='stylesheet' type='text/css' media='screen' href='../css/smallStyle.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/verySmallStyle.css'>
		<link rel='stylesheet' type='text/css' media='screen' href='../css/cross-navegator.css'>
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<script src='../js/script.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<link rel="icon" type="imagem/png" href="../images/Logo_tcc - 4.png"/>
	</head>
	<body onload="onLoad()">
		<script>
			$(document).ready(function(){
				var top = $(window).height();
				console.log(top);
				if(top >= 600){
					$('#rodape').css('top', top + "px");
				}
				else{
					var top = $(window).height() - 50;
					$('#rodape').css('top', top + "px");
				}
			});
			jQuery(window).load(function () {
        $(".loader").delay(1500).fadeOut("slow");
        $("#tudo_page").toggle("fast");
      });
		</script>
		<?php
			session_start();
			session_destroy();
		?>
		<div id="loader" class="loader fundo  ">
      <div class = "cssload-speeding-wheel"></div>
    </div>
		<div id = "pos_button_login">
			<center><h2>Faça login agora mesmo</h2></center>
			<button id = "profissional" onclick = "aparecer_prof()">Profissional</button>	
			<button id = "empresa" onclick = "aparecer_emp()">Empresa</button>
			<!--<button id = "IJKHY" onclick = "lookedin()"> <?php echo MD5("Admin"); ?></button>-->
			<br><br><center>Não possui login?<a style = "text-decoration: none; color: #FFE651;" href = "./cadastro.html">Cadastre-se já</a></center>
		</div>

		<!-- Empresa -->
		<div id = "form_emp">
			<i class="fas fa-arrow-left" onclick = "voltar()"></i>
			<form action =  "../controllers/empresaController.php" method="POST">
				<br>
        <h1>Empresa</h1>
        <br><br>
				<input type = "hidden" value = "2" name = "action"/>
				<input type = "hidden" value = "2" name = "conta"/>
        <strong>E-mail:</strong><br> <input type="email" size="35" maxlength="256" name="email" autocomplete="off" required>
        <br><br>
        <strong>Senha:</strong><br> <input type="password" name="senha" id = "senha_2" autocomplete="off" required>   
				</br><br>
				<input type = "submit" class = "btn_emp">
			</form>
		</div>

		<!-- Profissional -->
		<div id = "form_prof">
			<i class="fas fa-arrow-left" onclick = "voltar()"></i>
			<form action =  "../controllers/profissionalController.php" method="POST">
				<br>
        <h1>Profissional</h1>
        <br><br>
				<input type = "hidden" value = "2" name = "action"/>
				<input type = "hidden" value = "1" name = "conta"/>
        <strong>E-mail:</strong><br> <input type="email" size="35" maxlength="256" name="email" autocomplete="off" required>
        <br><br>
        <strong>Senha:</strong><br> <input type="password" name="senha" id = "senha" autocomplete="off" required>   
        </br><br>
				<input type = "submit" class = "btn_prof">
			</form>
		</div>
		<footer id = "rodape">
      <p> </p>
    </footer>
	</body>
</html>