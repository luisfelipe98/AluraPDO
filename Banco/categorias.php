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

  public function atualizar($id, $nome) {

    $categoria = new Categoria();
    $categoria->setNome($nome);
    $categoria->setId($id);

    $query = "UPDATE categorias SET nome = '{$categoria->getNome()}' WHERE id = {$categoria->getId()}";
    $conexao = Conexao::pegarConexao();
    $conexao->exec($query);

  }

  public function carregarNome($id) {

    $categoria = new Categoria();
    $categoria->setId($id);

    $query = "SELECT nome FROM categorias WHERE id = {$categoria->getId()}";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    foreach ($lista as $linha) {
      return $linha;
    }

  }

}
?>
