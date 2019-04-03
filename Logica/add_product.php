<?php
require_once("../Banco/produtos.php");
require_once("../Banco/imagens.php");
require_once("../Classes/Produto.php");
require_once("../Classes/Categoria.php");
require_once("../Classes/Imagem.php");
require_once("../Classes/Erro.php");

try {
  $nome = utf8_decode($_POST['nome']);
  $preco = $_POST['preco'];
  $descricao = utf8_decode($_POST['descricao']);
  $quantidade = $_POST['quantidade'];
  $categoria = $_POST['categoria'];
  $imagem = $_FILES['imagem'];

  // explode serve para seperar uma string através de um delimitador específico
  $tipo = explode("/", $imagem["type"]);
  $novo_nome = explode(".", $imagem["name"]);

  $img = new Imagem();
  $p = new Produto();
  // validando a imagem que foi passada pelo usuário
  if ($imagem["error"] == 0) {
    if ($tipo[1] == "jpeg" || $tipo[1] == "jpg" || $tipo[1] == "png") {
      if ($imagem["size"] < 100000) {
        $img->setNome($novo_nome[0] . "." . $tipo[1]);
        $img->setExtensao($tipo[1]);
        $img->setTamanho($imagem["size"]);
        $img->setCaminho("Imagens/" . $novo_nome[0] . "." . $tipo[1]);
        $p->setId(0);
        $img->setProduto($p);
      } else {
        header("Location: ../Views/adicionar-produto.php");
        die();
      }
    } else {
      header("Location: ../Views/adicionar-produto.php");
      die();
    }
  } else {
    header("Location: ../Views/adicionar-produto.php");
    die();
  }

  $i = new imagens();
  $imagemId = $i->inserir($img);

  if ($imagemId == 0) {
    header("Location: ../Views/adicionar-produto.php");
    die();
  } else {
    //mover a imagem para o diretório a qual ficará armazenado
    move_uploaded_file($imagem["tmp_name"], "../Imagens/" . $novo_nome[0] . "." . $tipo[1]);
    $img->setId($imagemId);
  }

  $cat = new Categoria();
  $cat->setId($categoria);

  $produto = new Produto();
  $produto->setNome($nome);
  $produto->setPreco($preco);
  $produto->setDescricao($descricao);
  $produto->setQuantidade($quantidade);
  $produto->setCategoria($cat);
  $produto->setImagem($img);
  if ($imagem["size"] != 0) {
    $produto->setTemImagem(true);
  } else {
    $produto->setTemImagem(false);
  }

  $prod = new produtos();
  $produtoId = $prod->inserir($produto);

  echo $produtoId;
  die();

  header("Location: ../Views/listar-produtos.php");

} catch (Exception $e) {
  Erro::trataErro($e);
}

?>
