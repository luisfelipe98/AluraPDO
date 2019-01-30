<?php
require_once("../Classes/Categoria.php");

class categorias {

  public function listar() {

    $query = "SELECT id, nome FROM categorias";
    $conexao = new PDO('mysql:host=localhost;dbname=PDO', 'root', '');
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;

  }

  public function inserir($nome) {

    $categoria = new Categoria();
    $categoria->setNome($nome);

    $query = "INSERT INTO categorias (nome) VALUES ('{$categoria->getNome()}')";
    $conexao = new PDO('mysql:host=localhost;dbname=PDO', 'root', '');
    $conexao->exec($query);


  }

}
?>
