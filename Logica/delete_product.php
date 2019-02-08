<?php

require_once("../Banco/produtos.php");
require_once("../Classes/Produto.php");
require_once("../Classes/Erro.php");

try {

  $id = $_POST['id'];

  $produto = new Produto();
  $produto->setId($id);

  $produtos = new produtos();
  $produtos->deletar($produto);

  header("Location: ../Views/listar-produtos.php");
}catch(Exception $e) {
  Erro::trataErro($e);
}

?>
