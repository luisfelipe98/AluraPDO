<?php
require_once("../Banco/produtos.php");
require_once("../Classes/Produto.php");
require_once("../Classes/Erro.php");

try {
  $nome = utf8_decode($_POST['nome']);
  $preco = $_POST['preco'];
  $quantidade = $_POST['quantidade'];
  $categoria = $_POST['categoria'];

  $produto = new Produto();
  $produto->setNome($nome);
  $produto->setPreco($preco);
  $produto->setQuantidade($quantidade);
  $produto->setCategoria($categoria);

  $prod = new produtos();
  $prod->inserir($produto);

  header("Location: ../Views/listar-produtos.php");

} catch (Exception $e) {
  Erro::trataErro($e);
}

?>
