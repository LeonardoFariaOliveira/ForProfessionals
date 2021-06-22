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
	<body id = "create">
    <script>
			jQuery(window).load(function () {
        $(".loader").delay(1500).fadeOut("slow");
        $("#tudo_page").toggle("fast");
      });
		</script>
			<?php
        if(isset($_GET["id"])){
          $id = $_GET["id"];
        }
        else{
          echo "<script type='text/javascript'>
          alert('Houve um erro tente novamente');
          window.location.href = 'index.html';
          </script>";
        }
      ?>

		<!-- Vaga -->
		<div id = "create_vaga">
			<form action =  "../controllers/vagaController.php" method="POST">
				<br>
        <h1>Vaga</h1>
        <br><br>
				<input type = "hidden" value = "1" name = "action"/>
        <input type = "hidden" value = "<?php echo $id ?>" name = "id"/>
        <strong>Título:</strong><br> <input type="text" size="35" maxlength="256" name="titulo" autocomplete="off" required autofocus>
        <br><br>
        <strong>Descrição:</strong><br>
        <textarea rows="25" cols="100" autocomplete="off" name = "descricao"  required  maxlength="1000"  ></textarea>
        <br><br>
        <strong>Remuneração:</strong><br> <input type="text" name="remuneracao"  autocomplete="off" required>   
				</br><br>
				<strong>Cidade de atuação:</strong><br>
        <select name = "cidade_atuacao">
          <option value="Ourinhos">Ourinhos</option>
          <option value="Salto Grande">Salto Grande</option>
          <option value="São Pedro do Turvo">São Pedro do Turvo</option>
          <option value="Ribeirão do Sul">Ribeirão do Sul</option>
        </select> 
        <br><br><br>
				<input type = "submit" class = "btn_emp">
			</form>
		</div>
    <footer id = "rodape">
      <p> </p>
    </footer>
	</body>
</html>