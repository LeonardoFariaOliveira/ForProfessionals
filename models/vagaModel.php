<?php

  include "../conexao.php";
  class Vaga{

    private $titulo;
    private $descricao;
    private $remuneracao;
    private $idEmpresa;
    private $cidadeAtuacao;
    private $ativoVaga;
    private $denuncias;

    public function setTitulo($titulo){

      $this->titulo = $titulo;


    }
    public function getTitulo(){

      return $this->titulo;

    }

    public function setDescricao($descricao){

      $this->descricao = $descricao;


    }
    public function getDescricao(){

      return $this->descricao;

    }

    public function setRemuneracao($remuneracao){

      $this->remuneracao = $remuneracao;


    }
    public function getRemuneracao(){

      return $this->remuneracao;

    }

    public function setIdEmpresa($idEmpresa){

      $this->idEmpresa = $idEmpresa;


    }
    public function getIdEmpresa(){

      return $this->idEmpresa;

    }

    public function setCidadeAtuacao($cidadeAtuacao){

      $this->cidadeAtuacao = $cidadeAtuacao;


    }
    public function getCidadeAtuacao(){

      return $this->cidadeAtuacao;

    }

    public function setAtivoVaga($ativoVaga){

      $this->ativoVaga = $ativoVaga;


    }
    public function getAtivoVaga(){

      return $this->ativoVaga;

    }

    public function setDenuncias($denuncias){

      $this->denuncias = $denuncias;


    }
    public function getDenuncias(){

      return $this->denuncias;

    }

    public function cadastrar(){

      $con = new Conexao();
      $con->conectar();
      $sql = "INSERT INTO vagas(Titulo, DescricaoVaga, Remuneracao, CidadeAtuacao, AtivoVaga, 
      idEmpresa)
      VALUES('".$this->getTitulo()."', '".$this->getDescricao()."', '".$this->getRemuneracao()."', '".$this->getCidadeAtuacao()."', '".$this->getAtivoVaga()."',
      '".$this->getIdEmpresa()."')";
      if($con->executaSQL($sql)){

        return true;

      }
      else{

        return false;

      }

    }

    public function listarVagas($inicio, $total_registros){
      $con = new Conexao();
      $con->conectar();
      // echo $email;
      // die();
      $sql = "SELECT idVaga, Titulo, DescricaoVaga, Remuneracao FROM vagas WHERE AtivoVaga > 0 ORDER BY idVaga DESC LIMIT $inicio, $total_registros  ";
      // $sql = "SELECT idVaga, Titulo, DescricaoVaga, Remuneracao FROM vagas WHERE vagas.AtivoVaga = 1 LIMIT $inicio, $total_registros";

      
      //echo $sql;
      // die();
      return $con->executaBusca($sql);


    }

    public function RetornarNumeroPaginas($inicio, $total_registros){
      $con = new Conexao();
      $con->conectar();
      // echo $total_registros;
      // die();

      $sql = "SELECT idVaga FROM vagas WHERE AtivoVaga = true LIMIT $inicio, $total_registros";
      // $total_r = $con->executaBusca($sql
      // $total_paginas =  $total_r /  $total_registros;
      // echo $sql;
      // die();
      //SELECT COUNT(idVaga) FROM vagas WHERE idVaga IN (SELECT idVaga FROM vagas WHERE AtivoVaga = true) LIMIT 5, 5 
      return  $con->executaBusca($sql);


    }


    
    public function listarDetalheVaga($id_vaga){
      $con = new Conexao();
      $con->conectar();
      // echo $email;
      // die();
      $sql = "SELECT vagas.idVaga, vagas.Titulo, vagas.DescricaoVaga, vagas.Remuneracao, vagas.CidadeAtuacao, vagas.idEmpresa,
      empresa.NomeEmpresa, empresa.ContatoEmpresa, empresa.EmailEmpresa FROM vagas, empresa WHERE vagas.AtivoVaga > 0 and vagas.idEmpresa = empresa.idEmpresa and idVaga = '$id_vaga'";
    

      //echo $sql;
      // die();
      return $con->executaBusca($sql);


    }

    public function concluirVaga($id){
      $con = new Conexao();
      $con->conectar();
      $sql = "UPDATE vagas SET AtivoVaga = false WHERE idVaga = '$id'"; 
      // echo $sql;
      // die();
      if($con->executaSql($sql)){

        
        return true;
    
      }
      else{
    

        return false;
    
      }
    

    }

    public function excluirVaga($id){
      $con = new Conexao();
      $con->conectar();
      $sql = "DELETE FROM vagas WHERE idVaga = '$id'"; 
      // echo $sql;
      // die();
      if($con->executaSql($sql)){

        
        return true;
    
      }
      else{
    
        
        return false;  
    
      }
    

    }


    public function EditarDados($id){
      $con = new Conexao();
      $con->conectar();
      $sql = "UPDATE vagas SET Titulo='".$this->getTitulo()."',
              DescricaoVaga='".$this->getDescricao()."',  Remuneracao='".$this->getRemuneracao()."', CidadeAtuacao='".$this->getCidadeAtuacao()."' WHERE idVaga = '".$id."'";
      // echo $sql;
      // die();
      return $con->executaSql($sql);
  }
  








    



  } 



?>