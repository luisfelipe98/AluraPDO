<?php

require_once('../Banco/categorias.php');
require_once("../Classes/Categoria.php");

$nome = utf8_decode($_POST['novo_nome']);
$id = $_POST['id'];

$categoria = new Categoria();
$categoria->setNome($nome);
$categoria->setId($id);

var_dump($categoria->getId());
var_dump($categoria->getNome());

$cat = new categorias();
$cat->atualizar($categoria->getId(), $categoria->getNome());

header('Location: ../Views/listar-categorias.php');


?>
