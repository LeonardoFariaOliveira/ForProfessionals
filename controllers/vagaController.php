<?php

  include "../models/vagaModel.php";
  class VagaController{

    private $vaga;

    //Recebe os dados digitados no arquivo: CriaVaga.php e cadastra-os criando assim uma nova vaga
    public function cadastrar(){

      $vaga = new Vaga();
      $vaga->setTitulo($_POST["titulo"]);
      $vaga->setDescricao($_POST["descricao"]);
      $vaga->setRemuneracao($_POST["remuneracao"]);
      $vaga->setCidadeAtuacao($_POST["cidade_atuacao"]);
      $vaga->setAtivoVaga(true);
      $vaga->setIdEmpresa($_POST["id"]);
      if($vaga->cadastrar()){

        echo "<script type='text/javascript'>
				alert('O cadastro foi concluido com sucesso');
				window.location.href = '../views/empresaUserPage.php';
				</script>";

      }
      else{

        echo "<script type='text/javascript'>
				alert('Houve um erro tente novamente');
				window.location.href = '../views/index.php';
				</script>";


      }
      
    }

    //Recebe apartir de que numero de registros que irá pular, e o total de registros que irá retornar
    //Assim ele lista o número de registros que será exibido nas paginas
    //Utilizado no index.php
    public function listarVagas($inicio, $total_registros){

      $vaga = new Vaga();
      return $vaga->listarVagas($inicio, $total_registros);

    }

    //Recebe apartir de que numero de registros que irá pular, e o total de registros que irá retornar
    //Com esses valores, calcula o número de paginas que o sistema terá e retorna
    public function RetornarNumeroPaginas($inicio, $total_registros){

      $vaga = new Vaga();

      $paginas = $vaga->RetornarNumeroPaginas($inicio, $total_registros);
      $result_paginas = $paginas->fetch(); 
      if($result_paginas > 0)
      {
      
        $pages = $result_paginas["idVaga"];
        $total_paginas = $pages / $total_registros;
        return $total_paginas;
 
      }

    }

    //Retorna informações da vaga selecionada pelo id
    public function listarDetalheVaga($id_vaga){

      $vaga = new Vaga();
      return $vaga->listarDetalheVaga($id_vaga);

    }

    //Seta o campo Ativo da vaga como false, dando a entender que a vaga foi concluída
    public function concluirVaga($id){
        $vaga = new Vaga(); 
      if($vaga->concluirVaga($id)){

        
        echo "<script type='text/javascript'>
        alert('Vaga concluída com sucesso');
        window.location.href = '../views/empresaUserPage.php';
        </script>";
      
    
      }
      else{
    
        
        echo "<script type='text/javascript'>
        alert('Houve um erro, usuario não encontrado');
        window.location.href = '../views/index.php';
        </script>";
      
    
      }
    

    }

    //Exclui a vaga do banco dando a entender que houve um problema com a vaga
    public function excluirVaga($id){
      $vaga = new Vaga(); 
    if($vaga->excluirVaga($id)){

      
      echo "<script type='text/javascript'>
      alert('Vaga exluida com sucesso');
      window.location.href = '../views/empresaUserPage.php';
      </script>";
    
  
    }
    else{
  
      
      echo "<script type='text/javascript'>
      alert('Houve um erro, usuario não encontrado');
      window.location.href = '../views/index.php';
      </script>";
    
  
    }
  

  }

  //Recebe os dados digitados no arquivo: AlterarDadosVaga.php e altera-os no banco
  public function EditaDados($id){	
    $vaga = new Vaga();			
    $vaga->setTitulo($_POST["titulo"]);
    $vaga->setDescricao($_POST["descricao"]);	
    $vaga->setRemuneracao($_POST["remuneracao"]);	
    $vaga->setCidadeAtuacao($_POST["cidade_atuacao"]);
    if($vaga->EditarDados($id))
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






  }

  //Recebe de um formulario dados pelo metodo POST
  //Um desses dados é o action($_POST["action"]), que vai definir qual ação será realizada no sistema
  if(isset($_POST["action"]))
  {

    $action = $_POST["action"];
    //Se o action for 1 a ação será cadastrar
    if($action == 1){

      $operation = new VagaController();
      $operation->cadastrar();

    }
    //Se o action for 2 a ação será editar
    else if($action == 2){
      $operation = new VagaController();
      $operation->EditaDados($_POST["id"]);

    }

  }
  
  //Recebe de um link dados pelo metodo GET
  //Um desses dados é o action($_GET["action"]), que vai definir qual ação será realizada no sistema
  else if(isset($_GET["action"])){

    $action = $_GET["action"];
    if($action == 1){

      //Se o action for 1 a ação será concluir a vaga
      $crudVaga = new VagaController();
      $crudVaga->concluirVaga($_GET["id"]);

    }
    else if($action == 2){

      //Se o action for 2 a ação será excluir a vaga
      $crudVaga = new VagaController();
      $crudVaga->excluirVaga($_GET["id"]);

    }

  }



?>