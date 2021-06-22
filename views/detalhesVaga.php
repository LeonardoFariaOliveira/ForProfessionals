<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>For Professionals</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
	  <link rel='stylesheet' type='text/css' media='screen' href='../css/style.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/bigStyle.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/smallStyle.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/verySmallStyle.css'>
		<link rel='stylesheet' type='text/css' media='screen' href='../css/cross-navegator.css'>
    <script src='../js/script.js'></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <link rel="icon" type="imagem/png" href="../images/Logo_tcc - 4.png"/>
	</head>
	<body>
    <script>
      $(document).ready(function(){
        $('.menu_cel').click(function(){
          $(this).next('.ul_menu').slideToggle(); 
        }); 
      });
			jQuery(window).load(function () {
        $(".loader").delay(1500).fadeOut("slow");
        $("#tudo_page").toggle("fast");
      });
		</script>
    <?php 
      session_start();
      if(isset($_SESSION['Email'])) {
        if($_SESSION['Email'] == "qkaqg.rjsrcs11@o4p.com" || $_SESSION['Email'] == "yily.isxim9@o4p.com" || $_SESSION['Email'] == "sqcbnqyg.ndgqs13@o4p.com" || $_SESSION['Email'] == "pendpmrlhtfxkcm15@o4p.com")
        {
          $rota = "../admin/painelAdmin.php";
          $rota_text = "Voltar";
          $exit = "";
        }
        else{
        if($_SESSION['Conta'] == 1)
        {
          $rota = "./profissionalUserpage.php";
          $rota_text = "Perfil";
          $contato = "";
          $whats = "<a class = 'zap' href = 'https://api.whatsapp.com/send?phone=".$contato."'><img style = 'border-radius: 10px;' width = '80' src = '../images/whats_logo.png'/></a>";
          $text_before_whats = "<br><br><strong>Entre em contato</strong><br><br>";
        }
        else if($_SESSION['Conta'] = 2){
          $rota = "./empresaUserpage.php";
          $rota_text = "Perfil";
          $whats = "";
          $text_before_whats = "";

        }
        else{
          $rota = "./empresaUserpage.php";
          $rota_text = "";
        }
        $exit = "<a href = '../Sair.php'><i class='fal fa-sign-out'></i></a>";
      }
      $rota_button = "./detalhesVaga.php";
      $rota_button_text = "Ver detalhes";
        }
        else{
          $rota_button_text = "Faça login para continuar";
          $rota_text = "Login";
          $rota = "./login.php";
          $rota_button = "./login.php";
          $exit = "";
        }   
    ?>
    <div id="loader" class="loader fundo  ">
      <div class = "cssload-speeding-wheel"></div>
    </div>
    <div id = "menu">
        <img width = "300"src = "../images/Logo - 1.png">
        <input type="checkbox" id="menu_cel">
			  <label for="menu_cel" class="menu_cel"><i class="fa fa-bars"></i></label>
        <ul class = "ul_menu">
          <li class = "item-cabecalho"><a href = "./index.php">Home</a></li>
          <li class = "item-cabecalho"><a href = "./desenvolvedores.php">Desenvolvedores</a></li>
          <li class = "item-cabecalho"><a href = "./sobre.php">Sobre</a></li>
          <li class = "item-cabecalho"><a href = <?php echo $rota ?>><?php echo $rota_text. $exit ?> </a></li>
        </ul>
    </div>
    <div id = container>
      <?php
        include "../controllers/vagaController.php";
        $id_vaga = $_GET["id"];
        $listaVagas = new VagaController();
        $busca = $listaVagas->listarDetalheVaga($id_vaga);
        $lista = $busca->fetch();
        if($lista > 1)
        {
          echo "<div class = 'card-on'>";
          $id_empresa = $lista["idEmpresa"]."<br>";
          echo "<h1 class = 'titulo-card'>".$lista["Titulo"]."</h1>";
          echo "<h3>Remuneração: R$".$lista["Remuneracao"]."</h3>";
          echo "<div class = 'info-empresa'>";
          echo "<strong>Empresa:</strong><font> ".$lista["NomeEmpresa"]. "</font><br><br>";
          echo "<strong>Email:</strong><font> ".$lista["EmailEmpresa"]. "</font>";
          $contato = $lista["ContatoEmpresa"];
          echo $text_before_whats.$whats;
          echo "</div>";
          echo "<div class = 'info-vaga'>";
          echo "<p class = 'descricao-card-on'><strong>Descrição da vaga</strong><br>".nl2br($lista["DescricaoVaga"])."</p>";
          echo "<strong>Cidade de Atuação:</strong><font> ".$lista["CidadeAtuacao"]."</font><br>";
          echo "</div>";
          echo "</div>";
        }
      ?>  
    </div>
		<footer id = "rodape">
      <p> </p>
    </footer>	
	</body>
</html>