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
	<body id = "alter_vaga" >
    <script>
			jQuery(window).load(function () {
        $(".loader").delay(1500).fadeOut("slow");
        $("#tudo_page").toggle("fast");
      });
		</script>
		<?php
      session_start();
      include "../controllers/vagaController.php";
      $detalhesVaga = new VagaController();
      if(!isset($_SESSION["Email"])){
        echo "<script type='text/javascript'>
        alert('Sessão expirada, faça login novamente');
        window.location.href = './login.php';
        </script>";
      }
      $id_vaga = $_GET["id"];
      $busca = $detalhesVaga->listarDetalheVaga($id_vaga);
      $lista = $busca->fetch();
    ?>
    <div id="loader" class="loader fundo  ">
      <div class = "cssload-speeding-wheel"></div>
    </div>
	  <!-- Vaga -->
    <div id = "edit_vaga">
			<form action =  "../controllers/vagaController.php" method="POST">
				<br>
        <h1>Vaga</h1>
        <br><br>
				<input type = "hidden" value = "2" name = "action"/>
        <input type = "hidden" value = "<?php echo $lista["idVaga"] ?>" name = "id"/>
        <i>Título:</i><br> <input type="text" size="35" maxlength="256" name="titulo" autocomplete="off" value = "<?php echo $lista["Titulo"] ?>" required autofocus>
        <br><br>
        <i>Descrição:</i><br>
        <textarea rows="25" cols="100" autocomplete="off" name = "descricao"  required  maxlength="1000"  ><?php echo $lista["DescricaoVaga"] ?></textarea>
        <br><br>
        <i>Remuneração:</i><br> <input type="text" name="remuneracao"  value = "<?php echo $lista["Remuneracao"] ?>" autocomplete="off" required>   
				</br><br>
				<i>Cidade de atuação:</i><br>
        <select name = "cidade_atuacao">
          <option value="<?php echo $lista["CidadeAtuacao"] ?>"><?php echo $lista["CidadeAtuacao"] ?></option>
          <option value="Ourinhos">Ourinhos</option>
          <option value="Salto Grande">Salto Grande</option>
          <option value="São Pedro do Turvo">São Pedro do Turvo</option>
          <option value="Ribeirão do Sul">Ribeirão do Sul</option>
        </select>
        <br><br> 
				<input type = "submit" class = "btn_emp">
			</form>
		</div>
    <footer id = "rodape">
      <p> </p>
    </footer>	
	</body>
</html>