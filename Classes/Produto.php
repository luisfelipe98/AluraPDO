<?php

require_once("Categoria.php");

class Produto {

  private $id;
  private $nome;
  private $preco;
  private $quantidade;
  private $categoria;

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

  public function getPreco() {
    return $this->preco;
  }

  public function setPreco($preco) {
    $this->preco = $preco;
  }

  public function getQuantidade() {
    return $this->quantidade;
  }

  public function setQuantidade($quantidade) {
    $this->quantidade = $quantidade;
  }

  public function getCategoria() {
    return $this->categoria;
  }

  public function setCategoria($categoria) {
    $this->categoria = $categoria;
  }

}

?>
