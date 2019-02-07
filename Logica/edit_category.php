<?php

require_once('../Banco/categorias.php');
require_once("../Classes/Categoria.php");
require_once("../Classes/Erro.php");

try {
    $nome = utf8_decode($_POST['novo_nome']);
    $id = $_POST['id'];

    $categoria = new Categoria();
    $categoria->setNome($nome);
    $categoria->setId($id);

    $cat = new categorias();
    $cat->atualizar($categoria);

    header('Location: ../Views/listar-categorias.php');
} catch(Exception $e) {
  Erro::trataErro($e);
}

?>
