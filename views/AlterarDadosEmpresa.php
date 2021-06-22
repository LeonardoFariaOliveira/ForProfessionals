<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>For Professionals</title>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<link rel='stylesheet' type='text/css' media='screen' href='../css/style.css'>
		<link rel='stylesheet' type='text/css' media='screen' href='../css/bigStyle.css'>
		<link rel='stylesheet' type='text/css' media='screen' href='../css/smallStyle.css'>
		<link rel='stylesheet' type='text/css' media='screen' href='../css/cross-navegator.css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script src='../js/script.js'></script>
		<link rel="icon" type="imagem/png" href="../images/Logo_tcc - 4.png"/>
	</head>
	<body id = "alter_data">
		<script>
			jQuery(window).load(function () {
        $(".loader").delay(1500).fadeOut("slow");
        $("#tudo_page").toggle("fast");
      });
		</script>
		<?php
      session_start();
      include "../controllers/empresaController.php";
      $listaInfo = new EmpresaController();
      if(!isset($_SESSION["Email"])){
        echo "<script type='text/javascript'>
        alert('Sessão expirada, faça login novamente');
        window.location.href = './login.php';
        </script>";
      }
      $email = $_GET["Email"];
      $busca = $listaInfo->listarInfo($email);
      $lista = $busca->fetch();
    ?>
		<div id="loader" class="loader fundo  ">
      <div class = "cssload-speeding-wheel"></div>
    </div>
		<!-- Empresa -->
		<div id = "emp_data">
			<form action =  "../controllers/empresaController.php" method="POST">
				<br>
        <h1>Empresa</h1>
        <br><br>
				<table>
					<tr>
						<td>
							<input type = "hidden" value = "3" name = "action"/>
							<input type = "hidden" value = "<?php echo $lista["idEmpresa"]; ?>" name = "id"/>
							<strong>Nome:</strong><br> <input type="text" size="35" maxlength="256" name="nome" autocomplete="off" value = "<?php echo $lista["NomeEmpresa"]; ?>" required autofocus>
							<!-- <br><br> -->
						</td>
					</tr>
					<tr>
						<td>
							<strong>Senha:</strong><br> <input type="password" name="senha" id = "senha_2" autocomplete="off" value = "<?php echo $lista["SenhaEmpresa"]; ?>" required>   
							<!-- </br><br> -->
						</td>
						<td>
							<span id = "valid_1_2">Senhas não batem</span>
							<strong>Confirmar Senha:</strong><br> <input type="password" id = "confirm_senha_2" name="confirm_senha" onkeyup="IsEqual_2()" value = "<?php echo $lista["SenhaEmpresa"];?>" autocomplete="off" required> 
							<!-- <br><br> -->
						</td>
					</tr>
					<tr>
						<td>
							<strong>Número para Contato:</strong><br> <input type="text" name="contato" value = "<?php echo $lista["ContatoEmpresa"]; ?>" autocomplete="off" required>
							<!-- <br><br> -->
						</td>
						<td>
							<strong>Cidade da sede da empresa:</strong><br> <input type="text" size="35" maxlength="256" name="cidade" value = "<?php echo $lista["CidadeSedeEmpresa"]; ?>" autocomplete="off" required autofocus>
							<!-- <br><br> -->
						</td>
					</tr>
				</table>
				<br>
				<input type = "submit" class = "btn_emp">
			</form>
		</div>
		<div id = "emp_data_2">
			<form action =  "../controllers/empresaController.php" method="POST">
				<br>
        <h1>Empresa</h1>
        <br><br>
				<table>
					<tr>
						<td>
							<input type = "hidden" value = "3" name = "action"/>
							<input type = "hidden" value = "<?php echo $lista["idEmpresa"]; ?>" name = "id"/>
							<strong>Nome:</strong><br> <input type="text" size="35" maxlength="256" name="nome" autocomplete="off" value = "<?php echo $lista["NomeEmpresa"]; ?>" required autofocus>
							<!-- <br><br> -->
						</td>
					</tr>
					<tr>
						<td>
							<strong>Senha:</strong><br> <input type="password" name="senha" id = "senha_2" autocomplete="off" value = "<?php echo $lista["SenhaEmpresa"]; ?>" required>   
							<!-- </br><br> -->
						<!-- </td>
						<td> -->
						<br><br>
							<span id = "valid_1_2">Senhas não batem</span>
							<strong>Confirmar Senha:</strong><br> <input type="password" id = "confirm_senha_2" name="confirm_senha" onkeyup="IsEqual_2()" value = "<?php echo $lista["SenhaEmpresa"];?>" autocomplete="off" required> 
							<!-- <br><br> -->
						</td>
					</tr>
					<tr>
						<td>
							<strong>Número para Contato:</strong><br> <input type="text" name="contato" value = "<?php echo $lista["ContatoEmpresa"]; ?>" autocomplete="off" required>
							<!-- <br><br> -->
						<!-- </td>
						<td> -->
						<br><br>
							<strong>Cidade da sede da empresa:</strong><br> <input type="text" size="35" maxlength="256" name="cidade" value = "<?php echo $lista["CidadeSedeEmpresa"]; ?>" autocomplete="off" required autofocus>
							<!-- <br><br> -->
						</td>
					</tr>
				</table>
				<br>
				<input type = "submit" class = "btn_emp">
			</form>
		</div>
		<footer id = "rodape">
      <p> </p>
    </footer>
	</body>
</html>