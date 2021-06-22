<?php

 
  include "usuarioModel.php";
  class Empresa extends Usuario{

    private $denuncias;
    private $cidade_sede;

    public function setDenuncias($denuncias){

      $this->denuncias = $denuncias;


    }
    public function getDenuncias(){

      return $this->denuncias;

    }

    public function setCidade_sede($cidade_sede){

      $this->cidade_sede = $cidade_sede;


    }
    public function getCidade_sede(){

      return $this->cidade_sede;

    }

    public function cadastrar(){

      $con = new Conexao();
      $con->conectar();
      $sql = "INSERT INTO empresa(NomeEmpresa, EmailEmpresa, SenhaEmpresa, 
      ContatoEmpresa, CidadeSedeEmpresa, AtivoEmpresa) 
      VALUES('".$this->getNome()."', '".$this->getEmail()."', '".$this->getSenha()."', 
      '".$this->getContato()."',  '".$this->getCidade_sede()."',
      '".$this->getAtivo()."')";
      // echo $sql;
      // die();
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
      $sql = "SELECT idEmpresa, NomeEmpresa, EmailEmpresa, ContatoEmpresa, CidadeSedeEmpresa, SenhaEmpresa FROM empresa WHERE EmailEmpresa = '$email'";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }

    
    public function EditarDados($id){
      $con = new Conexao();
      $con->conectar();
      $sql = "UPDATE empresa SET NomeEmpresa='".$this->getNome()."',
               SenhaEmpresa='".$this->getSenha()."', ContatoEmpresa='".$this->getContato()."', CidadeSedeEmpresa='".$this->getCidade_sede()."' WHERE idEmpresa = '".$id."'";
      // echo $sql;
      // die();
      return $con->executaSql($sql);
  }

    public function validar($email, $senha){

      $con = new Conexao();
      $con->conectar();
      $sql = "SELECT EmailEmpresa, SenhaEmpresa FROM empresa WHERE EmailEmpresa = '$email' and SenhaEmpresa = '$senha' ";
      return $con->executaBusca($sql);
      // echo $sql;
      // die();
      



    }
    


    public function listarVagaperEmpresaAtivo($id_empresa){
      $con = new Conexao();
      $con->conectar();
      $sql = "SELECT vagas.idVaga, vagas.Titulo, vagas.DescricaoVaga, vagas.Remuneracao, vagas.CidadeAtuacao, vagas.idEmpresa, vagas.AtivoVaga FROM vagas, empresa WHERE vagas.AtivoVaga = 1 and vagas.idEmpresa = empresa.idEmpresa and empresa.idEmpresa = '$id_empresa' ORDER BY vagas.idVaga DESC";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }

    public function listarVagaperEmpresaInativo($id_empresa){
      $con = new Conexao();
      $con->conectar();
      $sql = "SELECT vagas.idVaga, vagas.Titulo, vagas.DescricaoVaga, vagas.Remuneracao, vagas.CidadeAtuacao, vagas.idEmpresa, vagas.AtivoVaga FROM vagas, empresa WHERE vagas.AtivoVaga = 0 and vagas.idEmpresa = empresa.idEmpresa and empresa.idEmpresa = '$id_empresa' ORDER BY vagas.idVaga DESC";
      // echo $sql;
      // die()
        return  $con->executaBusca($sql);

  


    }


    public function Bloquear($id){
      $con = new Conexao();
      $con->conectar();
      $sql = "UPDATE empresa SET AtivoEmpresa = 0 WHERE idEmpresa = '".$id."'";
      // echo $sql;
      // die();

       if($con->executaSql($sql)){
  
        return true;
  
       }
       else{
  
        return false;
  
       }
       
  }



 


  




  }



?>