<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>UserPage</title>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<link rel='stylesheet' type='text/css' media='screen' href='../css/style.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/bigStyle.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/smallStyle.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/verySmallStyle.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/cross-navegator.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" type="imagem/png" href="../images/Logo_tcc - 4.png"/>
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

      @media only screen and (max-width: 480px) {

        #info-perfil .btn_emp{
          padding-top: 10px;
          padding-bottom: 10px;
          padding-left: 60px;
          padding-right: 60px;
          margin-left: -95px;
          margin-right:0;
          /* border: 1px solid red; */

        }
        #info-perfil .btn_emp:hover{
          margin-left: -95px;
        }

        #hist-vagas .btn_emp{

          padding-top: 10px;
          padding-bottom: 10px;
          padding-left: 85px;
          padding-right: 85px;
          /* border: 1px solid red; */
          margin-left: 50px;

        }   
        #hist-vagas .btn_emp:hover{

          padding-top: 10px;
          padding-bottom: 10px;
          padding-left: 85px;
          padding-right: 85px;
          /* border: 1px solid red; */
          margin-left: 50px;

        } 

      }

      @media only screen and (max-width: 330px) {

        #info-perfil .btn_emp{
          padding-top: 10px;
          padding-bottom: 10px;
          padding-left: 40px;
          padding-right: 40px;
          margin-left: -85px;
          margin-right:0;
          /* border: 1px solid red; */

        }

        #info-perfil .btn_emp:hover{
          margin-left: -85px;
        }

        #hist-vagas .btn_emp{

          padding-top: 10px;
          padding-bottom: 10px;
          padding-left: 60px;
          padding-right: 60px;
          /* border: 1px solid red; */
          margin-left: 50px;

        } 

        .historico-vagas .descricao-card-on
        {

            width: 260px;
    
        }



      }
  </style>
	</head>
	<body id = "emp">
    <?php 
      session_start();
      if(!isset($_SESSION["Email"])){
        echo "<script type='text/javascript'>
        alert('Sessão expirada, faça login novamente');
        window.location.href = './login.php';
        </script>";
        // echo $_SESSION["Email"];
      }
      else{
        include "../controllers/empresaController.php";
        $email = $_SESSION["Email"];
        $rota_text = "Perfil";
      }   
    ?>
    <script>
      $(document).ready(function(){
        if($(window).width() <= 430){

          if($(window).width() <= 330){
            
            $(".historico-vagas").hide();
            $('#rodape').css('top', "1000px");
            $("#hist").click(function(){
              $("#linhaMove").animate({top: '549px'}, "slow");
              $(".historico-vagas").show(1000);
              $("#info-perfil").hide(1000);
               var top = $("#container").height();
              $('#rodape').css('top', top + "px");
            }); 
            $("#info").click(function(){
              $("#linhaMove").animate({top: '481px'}, "slow");
              $("#info-perfil").show(1000);
              $(".historico-vagas").hide(1000);  
              $('#rodape').css('top', "1000px");
            }); 

          }
          else{

            $(".historico-vagas").hide();
        $("#hist").click(function(){
          $("#linhaMove").animate({top: '566px'}, "slow");
          $(".historico-vagas").show(1000);
          $("#info-perfil").hide(1000);
          var top = $("#container").height();
          $('#rodape').css('top', top + "px");
        }); 
        $("#info").click(function(){
          $("#linhaMove").animate({top: '498px'}, "slow");
          $("#info-perfil").show(1000);
          $(".historico-vagas").hide(1000);  
          $('#rodape').css('top', "150%");
        });


          }
 

        }
        else {
          
          $(".historico-vagas").hide();
        $("#hist").click(function(){
          $("#linhaMove").animate({left: '45%'}, "slow");
          $(".historico-vagas").show(1000);
          $("#info-perfil").hide(1000);
          var top = $("#container").height();
          $('#rodape').css('top', top + "px");
        }); 
        $("#info").click(function(){
          $("#linhaMove").animate({left: '0%'}, "slow");
          $("#info-perfil").show(1000);
          $(".historico-vagas").hide(1000);  
          $('#rodape').css('top', "150%");
        });


        }
 
        $('.menu_cel').click(function(){
          $(this).next('.ul_menu').slideToggle(); 
        }); 
      });

    </script>

    <div id = "menu">
        <img width = "300"src = "../images/Logo - 1.png">
        <input type="checkbox" id="menu_cel">
			  <label for="menu_cel" class="menu_cel"><i class="fa fa-bars"></i></label>
        <ul class = "ul_menu">
          <li class = "item-cabecalho"><a href = "./index.php">Home</a></li>
          <li class = "item-cabecalho"><a href = "./desenvolvedores.php">Desenvolvedores</a></li>
          <li class = "item-cabecalho"><a href = "./sobre.php">Sobre</a></li>
          <li class = "item-cabecalho"><a href = "#"><?php echo $rota_text ?> </a> <a href = "../Sair.php"><i class="fal fa-sign-out"></i></a></li>
        </ul>
    </div>
    <div id = "container">
      <div class = "actions-empresa">
        <div class = "box-action-empresa">
          <div id = "info"class = "action-empresa"><h3 class = "titulo-action-empresa">Informações de Cadastro</h3></div>
          <div id = "hist" class = "action-empresa"><h3 class = "titulo-action-empresa">Histórico de Vagas</h3></div>
        </div>
        <hr id = "linhaMove" >
        <hr class = "linha">
      </div>
      <div id = "info-perfil" class = "info-perfil">
        <?php
          $listaInfo = new EmpresaController();
          $busca = $listaInfo->listarInfo($email);
          $lista = $busca->fetch();
          if($lista > 1)
          {
            $id = $lista["idEmpresa"];
            echo "<div class = 'infos'>";
            $nome_empresa = $lista["NomeEmpresa"];
            echo "<strong>Nome da Empresa:</strong><br>";
            echo $lista["NomeEmpresa"]."<br><br>";
            echo "<strong>Email da Empresa:</strong><br>";
            echo $lista["EmailEmpresa"]."<br><br>";
            echo "<strong>Contato da Empresa:</strong><br>";
            echo $lista["ContatoEmpresa"]."<br><br>";
            echo "<strong>Cidade da Sede:</strong><br>";
            echo $lista["CidadeSedeEmpresa"]."<br><br><br>";
            $_SESSION["Email"] = $lista["EmailEmpresa"];
            echo "</div>";
            echo '<a class = "btn_emp" href = "./AlterarDadosEmpresa.php?Email='.$lista["EmailEmpresa"].'">Alterar Informações</a>';
          }
          else{
            echo "<script type='text/javascript'>
            alert('Houve um erro, usuario não encontrado');
            window.location.href = './login.php';
            </script>";
          }
        ?>
        </div>
        <div  id = "hist-vagas" class = "historico-vagas">
          <?php
            $listaInfo = new EmpresaController();
            $busca = $listaInfo->listarVagaperEmpresaAtivo($id);
            $lista = $busca->fetchAll();
            if($lista > 1)
            {
              echo '<a class = "btn_emp" href = "./CriarVaga.php?id='.$id.'">Criar vaga</a>';
              echo "<h1>Ativas</h1>";
              foreach($lista as $key => $value)
              {
                $id_vaga = $value["idVaga"];
                $titulo = $value["Titulo"];
                $descricao = $value["DescricaoVaga"];
                $remuneracao = $value["Remuneracao"];
                $cidade_atuacao = $value["CidadeAtuacao"];
                $ativo = $value["AtivoVaga"];
                if($ativo == 1)
                {    
                  echo "<div class = 'card-on'>";
                  echo "<h1 class = 'titulo-card'>".$titulo."</h1><br>";
                  echo "<h3>Remuneração: R$".$remuneracao."</h3>";
                  echo "<div class = 'info-vaga'>";
                  echo "<p class = 'descricao-card-on'><strong>Descrição da vaga</strong><br>".nl2br($descricao)."</p>";
                  echo "<strong>Cidade de Atuação:</strong> ".$cidade_atuacao."<br><br><br>";
                  echo "<a  id = 'concluir' class = 'concluir' href = '../controllers/vagaController.php?action=1&id=".$id_vaga."'  >Concluir vaga</a>";
                  echo "<a class = 'cancelar' href = '../controllers/vagaController.php?action=2&id=".$id_vaga."'>Cancelar vaga</a>";
                  echo "<a class = 'alterar' href = './AlterarDadosVaga.php?id=".$id_vaga."'>Editar vaga<a/>";
                  echo "</div>";
                  echo "</div>";
                }
              }
            }
            else{
              echo "<h3>Não há vagas</h3>";
            }
          ?>
        </div>
        <br>
        <div class = "historico-vagas">
          <?php
            $listaInfo = new EmpresaController();
            $busca = $listaInfo->listarVagaperEmpresaInativo($id);
            $lista = $busca->fetchAll();
            echo "<h1 style = 'color: #fff;'>Concluídas</h1><br>";
            if($lista > 0)
            {
              foreach($lista as $key => $value)
              {
                $id_vaga = $value["idVaga"];
                $titulo = $value["Titulo"];
                $descricao = $value["DescricaoVaga"];
                $remuneracao = $value["Remuneracao"];
                $cidade_atuacao = $value["CidadeAtuacao"];
                $ativo = $value["AtivoVaga"];    
                echo "<div class = 'card-on'>";
                echo "<h1 class = 'titulo-card'>".$titulo."</h1><br>";
                echo "<h3>Remuneração: R$".$remuneracao."</h3>";
                echo "<div class = 'info-vaga'>";
                echo "<p class = 'descricao-card-on'><strong>Descrição da vaga</strong><br>".nl2br($descricao)."</p>";
                echo "<strong>Cidade de Atuação:</strong> ".$cidade_atuacao."<br><br><br>";
                echo "<a class = 'cancelar' href = '../controllers/vagaController.php?action=2&id=".$id_vaga."'>Cancelar vaga</a>";
                echo "</div>";
                echo "</div>";
              }
            }
            else{
              echo "<h3>Não há vagas</h3>";
            }
          ?>
        </div>
    </div>
    <footer id = "rodape">
      <p> </p>
    </footer>	
	</body>
</html>