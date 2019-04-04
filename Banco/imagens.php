<?php

require_once("../Classes/Conexao.php");
require_once("../Classes/Imagem.php");
require_once("../Classes/Produto.php");

class imagens {

    public function inserir(Imagem $imagem) {
      $id = "";
      $conexao = Conexao::pegarConexao();
      try {
        $query = "INSERT INTO imagens (nome, extensao, tamanho, caminho, produto_id)
                  VALUES (:nome, :extensao, :tamanho, :caminho, :produto_id)";
        $conexao->beginTransaction();
          $stmt = $conexao->prepare($query);
          $stmt->bindValue(":nome", $imagem->getNome());
          $stmt->bindValue(":extensao", $imagem->getExtensao());
          $stmt->bindValue(":tamanho", $imagem->getTamanho());
          $stmt->bindValue(":caminho", $imagem->getCaminho());
          $stmt->bindValue(":produto_id", $imagem->getProduto()->getId());
          $stmt->execute();
          $id = $conexao->lastInsertId();
        $conexao->commit();
        return $id;
        $stmt->close();
      } catch (PDOException $e) {
        $conexao->rollback();
        return "Erro " . $e->getMessage();
      }
      $conexao->close();
    }

    public function adicionarProduto (Imagem $imagem) {
      $resposta = "";
      $conexao = Conexao::pegarConexao();
      try {
        $query = "UPDATE imagens SET produto_id = :produto_id WHERE id = :id";
        $conexao->beginTransaction();
          $stmt = $conexao->prepare($query);
          $stmt->bindValue(":produto_id", $imagem->getProduto()->getId());
          $stmt->bindValue(":id", $imagem->getId());
          $resposta = $stmt->execute();
        $conexao->commit();
        return $resposta;
        $stmt->close();
      } catch(PDOException $e) {
        $conexao->rollback();
        return "Erro " . $e->getMessage();
      }
      $conexao->close();
    }

    public function apagarImagem(Imagem $imagem) {
      $conexao = Conexao::pegarConexao();
      try {
        $query = "DELETE FROM imagens WHERE id = :id";
        $conexao->beginTransaction();
          $stmt = $conexao->prepare($query);
          $stmt->bindValue(":id", $imagem->getId());
          $resposta = $stmt->execute();
          $apagou = $resposta;
        $conexao->commit();
        return $apagou;
        $stmt = null;
      } catch (PDOException $e) {
        $conexao->rollback();
        return "Erro " . $e->getMessage();
      }
        $conexao = null;
    }

}

?>
