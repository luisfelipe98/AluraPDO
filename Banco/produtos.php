<?php
require_once("../Classes/Produto.php");
require_once("../Classes/Categoria.php");
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

    $query = "INSERT INTO produtos (nome, preco, descricao, quantidade, temImagem, categoria_id, imagem_id) VALUES
              (:nome, :preco, :descricao, :quantidade, :temImagem, :categoria_id, :imagem_id)";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':nome', $prod->getNome());
    $stmt->bindValue(':preco', $prod->getPreco());
    $stmt->bindValue(':descricao', $prod->getDescricao());
    $stmt->bindValue(':quantidade', $prod->getQuantidade());
    $stmt->bindValue(':temImagem', $prod->getTemImagem());
    $stmt->bindValue(':categoria_id', $prod->getCategoria()->getId());
    $stmt->bindValue(':imagem_id', $prod->getImagem()->getId());
    $stmt->execute();
    return $conexao->lastInsertId();

  }

  public function carregarProduto(Produto $prod) {

    $query = "SELECT id, nome, preco, quantidade, categoria_id FROM produtos WHERE id = :id";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":id", $prod->getId());
    $stmt->execute();
    $linha = $stmt->fetch();
    return $linha;

  }

  public function atualizar(Produto $prod) {

    $query = "UPDATE produtos SET
                              nome = :nome,
                              preco = :preco,
                              quantidade = :quantidade,
                              categoria_id = :categoria_id
                              WHERE id = :id";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":nome", $prod->getNome());
    $stmt->bindValue(":preco", $prod->getPreco());
    $stmt->bindValue(":quantidade", $prod->getQuantidade());
    $stmt->bindValue(":categoria_id", $prod->getCategoria());
    $stmt->bindValue(":id", $prod->getId());
    $stmt->execute();

  }

  public function deletar(Produto $prod) {

    $query = "DELETE FROM produtos WHERE id = :id";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":id", $prod->getId());
    $stmt->execute();

  }

  public function exibirProdutos(Categoria $cat) {

    $query = "SELECT id, nome FROM produtos WHERE categoria_id = :id";
    $conexao = Conexao::pegarConexao();
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":id", $cat->getId());
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $resultado;

  }
}
?>
