<?php
   include "../conexao.php"; 
  class Admin{

    private $nome;
    private $email;
    private $senha;
    private $con;

    public function setNome($nome){

      $this->nome = $nome;


    }
    public function getNome(){

      return $this->nome;

    }

    public function setEmail($email){

      $this->email = $email;


    }
    public function getEmail(){

      return $this->email;

    }

    public function setSenha($senha){

      $this->senha = $senha;


    }
    public function getSenha(){

      return $this->senha;

    }

    public function listarProfissionais(){
      $con = new Conexao();
      $con->conectar();
      // echo $email;
      // die();
      $sql = "SELECT idProfissional, NomeProfissional, EmailProfissional, ContatoProfissional, CidadeProfissional, YEAR(DataNascimento) FROM profissional WHERE 1";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }

    public function listarEmpresas(){
      $con = new Conexao();
      $con->conectar();
      // echo $email;
      // die();
      $sql = "SELECT idEmpresa, NomeEmpresa, EmailEmpresa, ContatoEmpresa, CidadeSedeEmpresa, Denuncias, AtivoEmpresa FROM empresa WHERE 1";
      // echo $sql;
      // die();
      return $con->executaBusca($sql);


    }

    public function validar($email, $senha){

      $con = new Conexao();
      $con->conectar();
      $sql = "SELECT EmailAdmin, SenhaAdmin FROM admin WHERE EmailAdmin = '$email' and SenhaAdmin = '$senha' ";
      return $con->executaBusca($sql);
      // echo $sql;
      // die();
      



    }

  

    





  }



?>