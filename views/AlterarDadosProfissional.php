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
    <link rel='stylesheet' type='text/css' media='screen' href='../css/verySmallStyle.css'>
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
      include "../controllers/profissionalController.php";
      $listaInfo = new ProfissionalController();
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
    <div id = "prof">
			<form action =  "../controllers/profissionalController.php" method="POST">
				<br>
        <h1>Profissional</h1>
        <br><br>
        <table>
          <tr>
            <td>
              <input type = "hidden" value = "3" name = "action"/>
              <input type = "hidden" value = "<?php echo $lista["idProfissional"]; ?>" name = "id"/>
              <strong>Nome:</strong><br> <input type="text" size="35" maxlength="256" value = "<?php echo $lista["NomeProfissional"]; ?>" name="nome" autocomplete="off" required autofocus>
            </td>
          </tr>
          <tr>
            <td>
              <strong>Senha:</strong><br> <input type="password" name="senha" id = "senha" value = "<?php echo $lista["SenhaProfissional"]; ?>" autocomplete="off" required>   
            </td>
            <td>
              <span id = "valid_1">Senhas não batem</span>
              <strong>Confirmar Senha:</strong><br> <input type="password" value = "<?php echo $lista["SenhaProfissional"]; ?>" id = "confirm_senha" name="confirm_senha" onkeyup="IsEqual()" autocomplete="off" required> 
            </td>
          </tr>
          <tr>
            <td>
              <strong>Número para Contato:</strong><br> <input type="text" value = "<?php echo $lista["ContatoProfissional"]; ?>" name="contato" autocomplete="off" required>
            </td>
            <td>
              <strong>Cidade onde vive:</strong><br>         
              <select name = "cidade">
                <option value = "<?php echo $lista["CidadeProfissional"]; ?>"><?php echo $lista["CidadeProfissional"]; ?></option>
                <option value="Ourinhos">Ourinhos</option>
                <option value="Salto Grande">Salto Grande</option>
                <option value="São Pedro do Turvo">São Pedro do Turvo</option>
                <option value="Ribeirão do Sul">Ribeirão do Sul</option>
              </select>
            </td>
          </tr>
        </table>
				<br><br>
				<input type = "submit" class = "btn_prof">
			</form>
		</div>
    <div id = "prof_2">
			<form action =  "../controllers/profissionalController.php" method="POST">
				<br>
        <h1>Profissional</h1>
        <br><br>
        <table>
          <tr>
            <td>
              <input type = "hidden" value = "3" name = "action"/>
              <input type = "hidden" value = "<?php echo $lista["idProfissional"]; ?>" name = "id"/>
              <strong>Nome:</strong><br> <input type="text" size="35" maxlength="256" value = "<?php echo $lista["NomeProfissional"]; ?>" name="nome" autocomplete="off" required autofocus>
            </td>
          </tr>
          <tr>
            <td>
              <strong>Senha:</strong><br> <input type="password" name="senha" id = "senha" value = "<?php echo $lista["SenhaProfissional"]; ?>" autocomplete="off" required>   
            <!-- </td>
            <td> -->
            <br><br>  
            <span id = "valid_1">Senhas não batem</span>
              <strong>Confirmar Senha:</strong><br> <input type="password" value = "<?php echo $lista["SenhaProfissional"]; ?>" id = "confirm_senha" name="confirm_senha" onkeyup="IsEqual()" autocomplete="off" required> 
            </td>
          </tr>
          <tr>
            <td>
              <strong>Número para Contato:</strong><br> <input type="text" value = "<?php echo $lista["ContatoProfissional"]; ?>" name="contato" autocomplete="off" required>
            <!-- </td>
            <td> -->
            <br><br>  
            <strong>Cidade onde vive:</strong><br>         
              <select name = "cidade">
                <option value = "<?php echo $lista["CidadeProfissional"]; ?>"><?php echo $lista["CidadeProfissional"]; ?></option>
                <option value="Ourinhos">Ourinhos</option>
                <option value="Salto Grande">Salto Grande</option>
                <option value="São Pedro do Turvo">São Pedro do Turvo</option>
                <option value="Ribeirão do Sul">Ribeirão do Sul</option>
              </select>
            </td>
          </tr>
        </table>
				<br><br>
				<input type = "submit" class = "btn_prof">
			</form>
		</div>
    <footer id = "rodape">
      <p> </p>
    </footer>
	</body>
</html>