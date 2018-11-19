<?php

require_once('../Classes/Categoria.php');

$categoria = new Categoria();
$resultado = $categoria->listar();

echo "<pre>";
print_r($resultado);
echo "</pre>";












 ?>
