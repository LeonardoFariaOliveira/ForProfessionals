<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>UserPage</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<link rel='stylesheet' type='text/css' media='screen' href='../css/style.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/bigStyle.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/smallStyle.css'>
		<link rel='stylesheet' type='text/css' media='screen' href='../css/cross-navegator.css'>
    <script src='../js/script.js'></script>
    <link rel="icon" type="imagem/png" href="../images/Logo_tcc - 4.png"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <style>
      .btn_emp{
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 30px;
        padding-right: 30px;
        margin-left: -20px;
      }
      .btn_emp:hover{
        margin-left: -20px;
      }

      *, .titulo-perfil{

        color: #fff;

      }

      /* .titulo-perfil{

        color: #fff;

      } */

      @media only screen and (max-width: 480px) {

        .titulo-perfil{

          /* border: 1px solid red; */
          margin-right: 0;
          text-align: center;
          font-size: 20px;
          margin-left: 15%;
          /* padding-left: -50px; */
          /* line-height: 10px; */
          width: 250px;

        }

      .btn_emp{
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 30px;
        padding-right: 30px;
        margin-left: -33%;
      }
      .btn_emp:hover{
        margin-left: -28%;
      }


      }


    @media only screen and (max-width: 330px) {

      .titulo-perfil{

        /* border: 1px solid red; */
        margin-right: 0;
        text-align: center;
        font-size: 20px;
        margin-left: 10%;
        /* padding-left: -50px; */
        /* line-height: 10px; */
        width: 250px;

      }

      .btn_emp{
      padding-top: 10px;
      padding-bottom: 10px;
      padding-left: 30px;
      padding-right: 30px;
      margin-left: -40%;
      }
      .btn_emp:hover{
      margin-left: -28%;
      }

      #userpage #rodape{


      position: absolute;
      bottom: 0;
      background-color: #111;
      width: 100%;
      text-align: center;
      box-sizing: border-box;
      height: 50px;
      /* margin-top: 500px; */
      top: 980px;
        

      }


    }
    </style>
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
	</head>
	<body id = "userpage">
    <?php 
      session_start();
      if(!isset($_SESSION["Email"])){
        echo "<script type='text/javascript'>
        alert('Sessão expirada, faça login novamente');
        window.location.href = './views/login.html';
        </script>";
      }
      else{
        $rota_text = "Perfil";
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
          <li class = "item-cabecalho"><a href = "#"><?php echo $rota_text ?> </a><a href = "../Sair.php"><i class="fal fa-sign-out"></i></a></li>
        </ul>
    </div>
		<div id = "container">
      <div>
        <h2 class = "titulo-perfil">Informações de Cadastro</h2>
        <hr id = "linha" class = "linha">
        <div class = "info-perfil">
          <?php
            include "../controllers/profissionalController.php";
            $listaInfo = new ProfissionalController();
            $email = $_SESSION["Email"];
            $busca = $listaInfo->listarInfo($email);
            $lista = $busca->fetch();
            if($lista > 1)
            {
              $id = $lista["idProfissional"];
              echo "<div class = 'infos'>";
              echo "<strong>Nome:</strong><br>";
              echo $lista["NomeProfissional"]."<br><br>";
              echo "<strong>Email:</strong><br>";
              echo $lista["EmailProfissional"]."<br><br>";
              echo "<strong>Contato:</strong><br>";
              echo $lista["ContatoProfissional"]."<br><br>";
              echo "<strong>Cidade:</strong><br>";
              echo $lista["CidadeProfissional"]."<br><br><br>";
              echo "</div>";
              echo '<a class = "btn_emp" href = "./AlterarDadosProfissional.php?Email='.$lista["EmailProfissional"].'">Alterar Informações</a>';
            }
            else{
              echo "<script type='text/javascript'>
              alert('Houve um erro, usuario não encontrado');
              window.location.href = './login.php';
              </script>";
            }
          ?>
        </div>
      </div>
    </div>
    <footer id = "rodape">
      <p> </p>
    </footer>
	</body>
</html>