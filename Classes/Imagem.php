<?php

require_once("Produto.php");

class Imagem {

  private $id;
  private $nome;
  private $extensao;
  private $caminho;
  private $produto;

  public function getId() {
      return $this->id;
  }

  public function setId($id) {
      $this->id = $id;
  }

  public function getNome() {
      return $this->nome;
  }

  public function setNome($nome) {
      $this->nome = $nome;
  }

  public function getExtensao() {
      return $this->extensao;
  }

  public function setExtensao($extensao) {
      $this->extensao = $extensao;
  }

  public function getCaminho() {
      return $this->caminho;
  }

  public function setCaminho($caminho) {
      $this->caminho = $caminho;
  }

  public function getProduto() {
      return $this->produto;
  }

  public function setProduto(Produto $produto) {
      $this->produto = $produto;
  }

}
?>
