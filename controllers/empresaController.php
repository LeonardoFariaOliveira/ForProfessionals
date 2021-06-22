<?php

  include "../models/empresaModel.php";
  class EmpresaController extends Empresa{

    private $empresa;

    //Recebe os dados digitados no formulario com id: form_emp do arquivo: cadastro.html
    //Cadastra-os criando uma nova empresa no sistema
    public function cadastrar(){
      $empresa = new Empresa();
      $empresa->setNome($_POST["nome"]);
      $empresa->setEmail($_POST["email"]);
      $empresa->setSenha($_POST["senha"]);
      $empresa->setContato($_POST["contato"]);
      $empresa->setCidade_sede($_POST["cidade"]);
      $empresa->setAtivo(true);
      if($empresa->cadastrar()){

        echo "<script type='text/javascript'>
				alert('O cadastro foi concluido com sucesso');
				window.location.href = '../views/index.php';
				</script>";

      }
      else{

        echo "<script type='text/javascript'>
				alert('Houve um erro tente novamente');
				window.location.href = '../views/login.php';
				</script>";

      }
      


    }

    //Lista as informações da empresa apartir do email recebido
    public function listarInfo($email){

      $empresa = new Empresa();
      // echo $email;
      // die();
      return $empresa->listarInfo($email);

    }

   
    
    //Valida as informações recebidas do arquivo login.php na sessão de empresas e caso existirem no banco, dão acesso a empresa sua conta
    public function validar($email, $senha){

      $empresa = new Empresa();
      // echo $email;
      // die();
      $busca = $empresa->validar($email, $senha);
      $lista = $busca->fetch();
       if($lista > 0){

        //Inicia a sessão para passar os dados do usuario para o arquivo senha.php
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

    //Recebe os dados digitados no arquivo: AlterarDadosEmpresa.php e altera-os no banco
    public function EditaDados($id){	
      $empresa = new Empresa();			
      $empresa->setNome($_POST["nome"]);
      $empresa->setSenha($_POST["senha"]);	
      $empresa->setContato($_POST["contato"]);	
      $empresa->setCidade_sede($_POST["cidade"]);
      if($empresa->EditarDados($id))
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

  //Lista as vagas ativas que a empresa criou no arquivo: empresaUserPage.php na sessão Historico de Vagas
  public function listarVagaperEmpresaAtivo($id_empresa){

    $empresa = new Empresa();
    // echo $email;
    // die();
    return $empresa->listarVagaperEmpresaAtivo($id_empresa);

  }

  //Lista as vagas já concluídas que a empresa criou no arquivo: empresaUserPage.php na sessão Historico de Vagas
  public function listarVagaperEmpresaInativo($id_empresa){

    $empresa = new Empresa();
    // echo $email;
    // die();
    return $empresa->listarVagaperEmpresaInativo($id_empresa);

  }

  //Ação realizada pelo administrador do sistema, caso a empresa receber um determinado número de denuncias(funcionalidade ainda não implementada)
  public function Bloquear($id_empresa){

    $empresa = new Empresa();
    // echo $email;
    // die();
    if($empresa->Bloquear($id_empresa)){

      echo "<script type='text/javascript'>
      alert('Empresa bloqueada com sucesso');
      window.location.href = '../views/index.php';
      </script>";


    }
    else{

      echo "<script type='text/javascript'>
      alert('Houve um erro, tente novamente');
      window.location.href = '../views/index.php';
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

      $operation = new EmpresaController();
      $operation->cadastrar();

    }
    //Se o action for 1 a ação será validar as informações
    else if($action == 2){

      $operation = new EmpresaController();
      $operation->validar($_POST['email'], $_POST['senha']);
      

    }
    //Se o action for 3 a ação será editar os dados
    else if($action == 3){

      $operation = new EmpresaController();
      $operation->EditaDados($_POST["id"]);

    };

  }
  //Recebe de um link dados pelo metodo GET
  //Um desses dados é o action($_GET["action"]), que vai definir qual ação será realizada no sistema
  else if(isset($_GET["action"])){

    $action = $_GET["action"];
    if($action == 1){

      //Se o action for 1 a ação será bloquear a empresa
      $operation = new EmpresaController();
      $operation->bloquear($_GET["id"]);

    }


  }
  




  




?>