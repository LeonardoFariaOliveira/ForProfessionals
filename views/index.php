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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <link rel="icon" type="imagem/png" href="../images/Logo_tcc - 4.png"/>
    <script src='../js/script.js'></script>
    <script>
      $(document).ready(function(){
        if($(window).width() <= 320){

          var top = $("#container").height();
        // console.log(top);
        console.log($(window).width());
        if( top >= 1000 ){
          $('#rodape').css('top', "1700px");
          $('#page-selection').css('top', "10px");
        }
        else if( top >= 800 && top < 1000){
          $('#rodape').css('top', "1300px");
        }
        else if( top >= 400 && top < 800){
          $('#rodape').css('top', "900px");
        }
        else if( top >= 200 && top < 400) {
          if( $(window).width() > 1550){
            $('#rodape').css('top', "900px");
          }
          else{
            $('#rodape').css('top', "700px");
          }
        }



        }
        else{

          var top = $("#container").height();
        // console.log(top);
        console.log($(window).width());
        if( top >= 1000 ){
          $('#rodape').css('top', "1550px");
          $('#page-selection').css('top', "10px");
        }
        else if( top >= 800 && top < 1000){
          $('#rodape').css('top', "1350px");
        }
        else if( top >= 400 && top < 800){
          $('#rodape').css('top', "950px");
        }
        else if( top >= 200 && top < 400) {
          if( $(window).width() > 1550){
            $('#rodape').css('top', "950px");
          }
          else{
            $('#rodape').css('top', "750px");
          }
        } 

        }
        
        $('.menu_cel').click(function(){
          $(this).next('.ul_menu').slideToggle(); 
        }); 
      });
      jQuery(window).load(function () {
        $(".loader").delay(1500).fadeOut("slow"); //retire o delay quando for copiar!
        $("#tudo_page").toggle("fast");
      });
    </script>
	</head>
	<body>
    <?php 
      session_start();
      if (!isset($_GET['pagina'])) 
      {
        $pc = "1";
      } 
      else 
      {
        $pc = $_GET['pagina'];      
      }
      $total_registros = 5;
      $inicio_val = $pc - 1;
      $inicio = $inicio_val * $total_registros;
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
        else if($_SESSION['Conta'] = 2){
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
      <?php
        include "../controllers/vagaController.php";
          $Vagas = new VagaController();
          $total_paginas = $Vagas->RetornarNumeroPaginas($inicio, $total_registros);
          $busca = $Vagas->listarVagas($inicio, $total_registros);
          $lista = $busca->fetchAll();
          if($lista > 1)
          {
            foreach($lista as $key => $value)
            {
              $id = $value["idVaga"];
              echo "<div class = 'effect-to-login'><a href = '".$rota_button."?id=".$id."'>".$rota_button_text."</a></div>";
              echo "<div class = 'card-off'>";
              echo "<h1 class = 'titulo-card'>".$value["Titulo"]."</h1>";
              echo "<h3>Remuneração: R$".$value["Remuneracao"]."</h3>";
              echo "<p class = 'descricao-card-off'>".mb_strimwidth($value["DescricaoVaga"], 0, 200, "...")."</p>";
              echo "</div>";
            }
            echo "<div id = 'page-selection' >";
            $allPages = ceil(floatval($total_paginas - $inicio_val)); 
            $anterior = $pc - 1;
            $proximo = $pc + 1;
            if($pc > 1  ){
              echo "<a id = 'left' href = './index.php?pagina=".$anterior."'>  <i class='fas fa-arrow-circle-left'></i> </a>";
            }
            if($pc < $allPages ){
              echo "<a  id = 'right' href = './index.php?pagina=".$proximo."'> <i class='fas fa-arrow-circle-right'></i> </a>";
            }
            echo "</div>";
          }
      ?>  
    </div>
    <footer id = "rodape">
    </footer>		
	</body>
</html>