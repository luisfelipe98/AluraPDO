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
    $produto = new Produto();
    $produto->setNome($prod->getNome());
    $produto->setPreco($prod->getPreco());
    $produto->setQuantidade($prod->getQuantidade());
    $produto->setCategoria($prod->getCategoria());

    $query = "INSERT INTO produtos (nome, preco, quantidade, categoria_id) VALUES
              ('{$produto->getNome()}',
               {$produto->getPreco()},
               {$produto->getQuantidade()},
               {$produto->getCategoria()})";
    $conexao = Conexao::pegarConexao();
    $conexao->exec($query);
  }

}

?>
