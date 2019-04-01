<?php

require_once("Categoria.php");
require_once("Imagem.php");

class Produto {

  private $id;
  private $nome;
  private $descricao;
  private $preco;
  private $quantidade;
  private $categoria;
  private $temImagem;
  private $imagem;

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

  public function getDescricao() {
    return $this->descricao;
  }

  public function setDescricao($descricao) {
    $this->descricao = $descricao;
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

  public function setCategoria(Categoria $categoria) {
    $this->categoria = $categoria;
  }

  public function getTemImagem() {
    return $this->temImagem;
  }

  public function setTemImagem($temImagem) {
    $this->temImagem = $temImagem;
  }

  public function getImagem(Imagem $imagem) {
    return $this->imagem;
  }

  public function setImagem($imagem) {
    $this->imagem = $imagem;
  }

}

?>
