<?php

require_once("../Classes/Conexao.php");
require_once("../Classes/Imagem.php");

class imagens {

    public function inserir(Imagem $imagem) {
      $query = "INSERT INTO imagens (nome, extensao, tamanho, caminho, produto_id)
                VALUES (:nome, :extensao, :tamanho, :caminho, :produto_id)";
      $conexao = Conexao::pegarConexao();
      $stmt = $conexao->prepare($query);
      $stmt->bindValue(":nome", $imagem->getNome());
      $stmt->bindValue(":extensao", $imagem->getExtensao());
      $stmt->bindValue(":tamanho", $imagem->getTamanho());
      $stmt->bindValue(":caminho", $imagem->getCaminho());
      $stmt->bindValue(":produto_id", $imagem->getProduto()->getId());
      $resposta = $stmt->execute();
      return $resposta;
    }






}


 ?>
