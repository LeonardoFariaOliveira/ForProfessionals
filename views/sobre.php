<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>Sobre</title>
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
	<body id = "sobre">
    <script>
      $(document).ready(function(){
        var top = $(window).height();
        console.log(top);
        if(top <= 660){
          var top = $(window).height() + 200;
          $('#rodape').css('top', top + "px");
        }
        else{
          var top = $(window).height() - 50;
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
      <h1 class = "title">Sobre</h1>
      <p class = "sobre">
      A área da TI vem crescendo muito nos últimos anos, e pela regra de mercado, com o desenvolvimento tecnológico gera-se mais e novos empregos nessa área. 
      Devido à ausência de qualificados, pois as empresas buscam, de imediato, um profissional com experiência e tempo de trabalho, e com isso o questionamento de como recém formados vão ingressar em um mercado. 
      A maioria dos iniciantes nessa área são jovens que nunca trabalharam, e acabaram de sair da faculdade. 
      A falta de profissionais origina-se na busca das organizações por pessoas já qualificadas, sem se quer oferecer um espaço adequado para o preparo, e muito menos investir para esse desenvolvimento. 
      Enfim, uma inciativa que pode inspirar o cenário brasileiro é a contratação de desenvolvedores juniores que direciona a capacitação deles para as necessidades do mercado. 
      Este sistema tem o principal objetivo de trazer uma perspectiva esperançosa para jovens da área de tecnologia que residem no interior do Estado de São Paulo. 
      </p>
    </div>
    <footer id = "rodape">
          <p> </p>
    </footer>	
	</body>
</html>