<?php
   include "../conexao.php"; 
  class Usuario{

    private $nome;
    private $email;
    private $senha;
    private $contato;
    private $ativo;

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

    public function setContato($contato){

      $this->contato = $contato;


    }
    public function getContato(){

      return $this->contato;

    }

    public function setAtivo($ativo){

      $this->ativo = $ativo;


    }
    public function getAtivo(){

      return $this->ativo;

    }

  

    





  }



?>