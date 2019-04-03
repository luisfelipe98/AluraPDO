<?php

require_once("../Classes/Conexao.php");
require_once("../Classes/Imagem.php");
require_once("../Classes/Produto.php");

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
      $stmt->execute();
      return $conexao->lastInsertId();
    }

    public function adicionarProduto (Imagem $imagem) {
      $query = "UPDATE imagens SET produto_id = :produto_id WHERE id = :id";
      $conexao = Conexao::pegarConexao();
      $stmt = $conexao->prepare($query);
      $stmt->bindValue(":produto_id", $imagem->getProduto()->getId());
      $stmt->bindValue(":id", $imagem->getId());
      $resposta = $stmt->execute();
      return $resposta;
    }






}


 ?>
