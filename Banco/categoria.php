<?php

class categoria {

  public function listar() {

    $query = "SELECT id, nome FROM categorias";
    $conexao = new PDO('mysql:host=localhost;dbname=PDO', 'root', '');
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;

  }

}
?>
