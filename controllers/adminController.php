<?php

  include "../models/adminModel.php";
  class AdminController extends Admin{

    private $admin;

    //Lista todos os profissionais cadastrados no sistema
    public function listarProfissionais(){

      $admin = new Admin();
      // echo $email;
      // die();
      return $admin->listarProfissionais();

    }

    //Lista todas as empresas cadastradas no sistema
    public function listarEmpresas(){

      $admin = new Admin();
      // echo $email;
      // die();
      return $admin->listarEmpresas();

    }
    
    //Valida se os dados de acesso do administrador são válidos
    public function validar($email, $senha){

      $admin = new Admin();
      $busca = $admin->validar($email, $senha);
      $lista = $busca->fetch();
       if($lista > 0){

        //Inicia a sessão para passar os dados do usuario
        session_start();
        $_SESSION['Email'] = $email;
        $_SESSION['Senha'] = $senha;
        $_SESSION['Conta'] = 4;

        echo "<script type='text/javascript'>
				alert('Login feito com sucesso');
				window.location.href = '../admin/painelAdmin.php';
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
    if($action == 1){

      //Se o action for 1 a ação será validar
      $operation = new AdminController();
      $operation->validar($_POST["email"], $_POST["senha"]);

    }


  }
  




  




?>