<?php
require_once("../Classes/Produto.php");
require_once("../Classes/Conexao.php");

class produtos {

  public function listar() {

    $query = "SELECT produtos.*, categorias.nome as categoria_nome FROM produtos INNER JOIN categorias ON
              produtos.categoria_id = categorias.id";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;

  }

}

?>
