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

  public function inserir(Categoria $cat) {

    $query = "INSERT INTO categorias (nome) VALUES (:nome)";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":nome", $cat->getNome());
    $stmt->execute();

  }

  public function atualizar(Categoria $cat) {

    $query = "UPDATE categorias SET nome = :nome WHERE id = :id";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":nome", $cat->getNome());
    $stmt->bindValue(":id", $cat->getId());
    $stmt->execute();

  }

  public function carregarNome(Categoria $cat) {

    $query = "SELECT nome FROM categorias WHERE id = :id";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":id", $cat->getId());
    $stmt->execute();
    $linha = $stmt->fetch();
    return $linha;

  }

  public function deletar(Categoria $categoria) {

    $query= "DELETE FROM categorias WHERE id = :id";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":id", $categoria->getId());
    $stmt->execute();

  }

}
?>
