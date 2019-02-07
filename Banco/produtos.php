<?php
require_once("../Classes/Produto.php");
require_once("../Classes/Conexao.php");

class produtos {

  public function listar() {

    $query = "SELECT produtos.*, categorias.nome as categoria_nome FROM produtos INNER JOIN categorias ON
              produtos.categoria_id = categorias.id ORDER BY produtos.id";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;

  }

  public function inserir(Produto $prod) {

    $query = "INSERT INTO produtos (nome, preco, quantidade, categoria_id) VALUES
              (:nome, :preco, :quantidade, :categoria_id)";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':nome', $prod->getNome());
    $stmt->bindValue(':preco', $prod->getPreco());
    $stmt->bindValue(':quantidade', $prod->getQuantidade());
    $stmt->bindValue(':categoria_id', $prod->getCategoria());
    $stmt->execute();

  }

}

?>