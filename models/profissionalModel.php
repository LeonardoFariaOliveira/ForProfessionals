<?php

 
  include "usuarioModel.php";
  class Profissional extends Usuario{

    private $data_nasc;
    private $cidade;

    public function setData_nasc($data_nasc){

      $this->data_nasc = $data_nasc;


    }
    public function getData_nasc(){

      return $this->data_nasc;

    }

    public function setCidade($cidade){

      $this->cidade = $cidade;


    }
    public function getCidade(){

      return $this->cidade;

    }

    public function cadastrar(){

      $con = new Conexao();
      $con->conectar();
      $sql = "INSERT INTO profissional(NomeProfissional, EmailProfissional, SenhaProfissional, 
      ContatoProfissional, DataNascimento, CidadeProfissional, 
      AtivoProfissional) 
      VALUES('".$this->getNome()."', '".$this->getEmail()."', '".$this->getSenha()."', 
      '".$this->getContato()."', '".$this->getData_Nasc()."', '".$this->getCidade()."',
      '".$this->getAtivo()."')";
      if($con->executaSQL($sql))
      {

        return true;

      }
      else{

        return false;

      }


    }

    public function listarInfo($email){
      $con = new Conexao();
      $con->conectar();
      // echo $email;
      // die();
      $sql = "SELECT idProfissional, NomeProfissional, EmailProfissional, ContatoProfissional, CidadeProfissional, SenhaProfissional, DataNascimento FROM profissional WHERE EmailProfissional = '$email'";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }


    public function EditarDados($id){
      $con = new Conexao();
      $con->conectar();
      $sql = "UPDATE profissional SET NomeProfissional='".$this->getNome()."',
               SenhaProfissional='".$this->getSenha()."', ContatoProfissional='".$this->getContato()."', CidadeProfissional='".$this->getCidade()."' WHERE idProfissional = '".$id."'";
      // echo $sql;
      // die();
      return $con->executaSql($sql);
  }

    public function validar($email, $senha){

      $con = new Conexao();
      $con->conectar();
      $sql = "SELECT EmailProfissional, SenhaProfissional FROM profissional WHERE EmailProfissional = '$email' and SenhaProfissional = '$senha' ";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);



    }

 


  




  }



?>