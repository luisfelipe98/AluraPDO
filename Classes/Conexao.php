<?php

class Conexao {

  public static function pegarConexao() {
    $conexao = new PDO('mysql:host=localhost;dbname=PDO', 'root', '');
    return $conexao;

  }

}

?>
