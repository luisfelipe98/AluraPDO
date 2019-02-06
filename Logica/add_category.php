<?php
require_once('../Banco/categorias.php');
require_once("../Classes/Categoria.php");
require_once("../Classes/Erro.php");

try {
    $nome = utf8_decode($_POST['nome_categoria']);

    $cat = new Categoria();
    $cat->setNome($nome);

    $categoria = new categorias();
    $categoria->inserir($cat->getNome());

    header("Location: ../Views/listar-categorias.php");
} catch (Exception $e) {
  Erro::trataErro($e);
}

?>
