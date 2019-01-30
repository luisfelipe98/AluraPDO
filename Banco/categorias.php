<?php
require_once("../Classes/Categoria.php");
require_once("../Classes/Conexao.php");

class categorias {

  public function listar() {

    $query = "SELECT id, nome FROM categorias";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;

  }

  public function inserir($nome) {

    $categoria = new Categoria();
    $categoria->setNome($nome);

    $query = "INSERT INTO categorias (nome) VALUES ('{$categoria->getNome()}')";
    $conexao = Conexao::pegarConexao();
    $conexao->exec($query);
    
  }

}
?>
