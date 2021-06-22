<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>Desenvolvedores</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
	  <link rel='stylesheet' type='text/css' media='screen' href='../css/style.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/bigStyle.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/smallStyle.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/verySmallStyle.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/cross-navegator.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <link rel="icon" type="imagem/png" href="../images/Logo_tcc - 4.png"/>
		<script src='../js/script.js'></script>
	</head>
	<body id = "devs">
    <script>
      $(document).ready(function(){
      var top = $(window).height();
      console.log(top);
      if(top <= 660){
        var top = $(window).height() + 980;
        $('#rodape').css('top', top + "px");
      }
      else{
        var top = $(window).height() + 800;
        $('#rodape').css('top', top + "px");
      }
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
        }
        else if($conta = 2){
          $rota = "./empresaUserpage.php";
          $rota_text = "Perfil";
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
        <h1 class = "title">Desenvolvedores</h1>
        <div class = "devs">
          <div class="dev">
            <div class = "area_dev">
              <br><br><br><br><br><br>
              <h1> I </h1>
              <div class = "descricao">
                <h3 class = "nome">Izadora Ferreira</h3>
                <h5>Responsável pela Pesquisa e Documentação</h5>
              </div>
            </div>
          </div>
          <div class="dev">
            <div class = "area_dev">
            <img src="../images/Douglas.jpeg" alt = "Leonardo Faria" class="img_dev">
              <div class = "descricao">
                <h3 class = "nome">Douglas Paes</h3>
                <h5> Responsável pela Pesquisa e Documentação</h5>
              </div>
            </div>
          </div>
          <div class="dev">
            <div class = "area_dev">
            <img src="../images/Euu_recente_3.jpeg" alt = "Leonardo Faria" class="img_dev">
              <div class = "descricao">
                <h3 class = "nome">Leonardo Faria</h3>
                <h5>Programador Full-Stack</h5>
              </div>
            </div>
          </div>
          <div class="dev">
            <div class = "area_dev">
              <br><br><br><br><br><br>
              <h1> N </h1>
              <!-- <br><br><br> -->
              <div class = "descricao">
                <h3 class = "nome">Nathalia </h3>
                <h5>Responsável pela Apresentação</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer id = "rodape">
        <p> </p>
      </footer>
	</body>
</html>