<?php

require_once("../Banco/produtos.php");
require_once("../Banco/categorias.php");
require_once("../Classes/Produto.php");
require_once("../Classes/Erro.php");

try{
  $id = $_POST['id'];
  $produto = new Produto();
  $produto->setId($id);

  $produtos = new produtos();
  $resultado = $produtos->carregarProduto($produto);

  $categorias = new categorias();
  $cat = $categorias->listar();

  $a = sizeof($cat);
  $cat[$a]["id"] = 0;
  $cat[$a]["nome"] = "N&atilde;o Tem";
} catch (Exception $e) {
  Erro::trataErro($e);
}
?>
<html>
<title>Editar Produto</title>
<head>
  <link rel="stylesheet" type="text/css" href="../Css/menu.css">
  <link rel="stylesheet" type="text/css" href="../Css/editar-produto.css">
  <link rel="stylesheet" type="text/css" href="../Css/footer.css">
</head>
<body>
  <header>
    <?php require_once('../Escopos/menu1.php'); ?>
  </header>
  <div>
    <h3>Editar Produto</h3>
    <form action="../Logica/edit_product.php" method="POST">
      <p>Editar o produto</p>
      <input type="hidden" value="<?php echo $produto->getId(); ?>" name="id">
      <label>Nome</label>
      <input type="text" name="nome" value="<?php echo utf8_encode($resultado['nome']); ?>" placeholder="Nome">
      <label>Preço</label>
      <input type="number" step="0.01" min="0" name="preco" value="<?php echo $resultado['preco']; ?>" placeholder="Preço">
      <label>Quantidade</label>
      <input type="number" step="1" min="1" name="quantidade" value="<?php echo $resultado['quantidade']; ?>" placeholder="Quantidade">
      <label>Categoria</label>
      <select name="categoria">
        <?php $selected = ''; ?>
          <?php foreach($cat as $linha): ?>
            <?php
              if ($linha['id'] == $resultado["categoria_id"]) {
                $selected = "selected";
              }
            ?>
            <option value="<?php echo $linha['id']; ?>" <?php echo $selected; ?> >
              <?php echo utf8_encode($linha['nome']); ?>
            </option>
            <?php $selected = ''; ?>
          <?php endforeach; ?>
      </select>
      <input type="submit" value="Editar">
    </form>
  </div>
  <footer>
    <hr>
    <h4>&copy All Rights Reserved, 2018-2019 -- Luis Felipe</h4>
  </footer>
</body>
</html>
