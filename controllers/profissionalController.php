<?php

  include "../models/profissionalModel.php";
  //Recebe os dados digitados no formulario com id: form_prof do arquivo: cadastro.html
  //Cadastra-os criando um novo profissional no sistema
  class ProfissionalController extends Profissional{

    private $profissional;

    public function cadastrar(){
      $profissional = new Profissional();
      $profissional->setNome($_POST["nome"]);
      $profissional->setEmail($_POST["email"]);
      $profissional->setSenha($_POST["senha"]);
      $profissional->setContato($_POST["contato"]);
      $profissional->setData_nasc($_POST["data_nasc"]);
      $profissional->setCidade($_POST["cidade"]);
      $profissional->setAtivo(true);
      if($profissional->cadastrar()){

        echo "<script type='text/javascript'>
				alert('O cadastro foi concluido com sucesso');
				window.location.href = '../views/index.php';
				</script>";

      }
      else{

        echo "<script type='text/javascript'>
				alert('Houve um erro tente novamente');
				window.location.href = '../views/index.php';
				</script>";

      }
      


    }


    //Recebe os dados digitados no arquivo: AlterarDadosProfissional.php e altera-os no banco
    public function EditaDados($id){	
      $profissional = new Profissional();			
      $profissional->setNome($_POST["nome"]);
      $profissional->setSenha($_POST["senha"]);	
      $profissional->setContato($_POST["contato"]);	
      $profissional->setCidade($_POST["cidade"]);
      if($profissional->EditarDados($id))
      {
          
        echo "<script type='text/javascript'>
				alert('Dados alterados com sucesso');
				window.location.href = '../views/index.php';
				</script>";
      
      }
      else
      {
         
        echo "<script type='text/javascript'>
				alert('Houve um erro, tente novamente');
				window.location.href = '../views/index.php';
				</script>";
      
      }
  }

    //Lista as informações do profissional apartir do email recebido
    public function listarInfo($email){

      $profissional = new Profissional();
      // echo $email;
      // die();
      return $profissional->listarInfo($email);

    }

    //Valida as informações recebidas do arquivo login.php na sessão de profissionais e caso existirem no banco, dão acesso ao profissional sua conta
    public function validar($email, $senha){

      $profissional = new Profissional();
      // $email = $_POST['email'];
      // $senha = $_POST['senha'];
      // echo $email;
      // die();
      $busca = $profissional->validar($email, $senha);
      $lista = $busca->fetch();
       if($lista > 0){

        session_start();
        $_SESSION['Email'] = $email;
        $_SESSION['Senha'] = $senha;
        $_SESSION['Conta'] = $_POST["conta"];

        echo "<script type='text/javascript'>
				alert('Login feito com sucesso');
				window.location.href = '../views/index.php';
				</script>";

       }
       else{

        echo "<script type='text/javascript'>
				alert('Email ou senha estão errados, tente novamente');
				window.location.href = '../views/login.php';
				</script>";

       }

    }


  }

  //Recebe de um formulario dados pelo metodo POST
  //Um desses dados é o action($_POST["action"]), que vai definir qual ação será realizada no sistema
  if(isset($_POST["action"]))
  {

    $action = $_POST["action"];
    //Se o action for 1 a ação será cadastrar
    if($action == 1){

      $operation = new ProfissionalController();
      $operation->cadastrar();

    }
    //Se o action for 1 a ação será validar as informações
    else if($action == 2){

      $operation = new ProfissionalController();
      $operation->validar($_POST['email'], $_POST['senha']);

    }
    //Se o action for 3 a ação será editar os dados
    else if($action == 3){

      $operation = new ProfissionalController();
      $operation->EditaDados($_POST["id"]);

    }

  }




?>