<?php

require_once("../Banco/categorias.php");
require_once("../Classes/Categoria.php");

$id = $_POST['id'];

$categoria = new Categoria();
$categoria->setId($id);

$cat = new categorias();
$cat->deletar($categoria->getId());

header("Location: ../Views/listar-categorias.php");

?>
