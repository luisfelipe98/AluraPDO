<?php
require_once("../Banco/produtos.php");
require_once("../Classes/Produto.php");
require_once("../Classes/Categoria.php");
require_once("../Classes/Imagem.php");
require_once("../Classes/Erro.php");

try {
  $nome = utf8_decode($_POST['nome']);
  $preco = $_POST['preco'];
  $descricao = $_POST['descricao'];
  $quantidade = $_POST['quantidade'];
  $categoria = $_POST['categoria'];
  $imagem = $_FILES['imagem'];

  $cat = new Categoria();
  $cat->setId($categoria);

  $produto = new Produto();
  $produto->setNome($nome);
  $produto->setPreco($preco);
  $produto->setQuantidade($quantidade);
  $produto->setCategoria($cat);

  $prod = new produtos();
  $prod->inserir($produto);

  header("Location: ../Views/listar-produtos.php");

} catch (Exception $e) {
  Erro::trataErro($e);
}

?>
