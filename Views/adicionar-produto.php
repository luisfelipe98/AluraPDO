<?php require_once("../Classes/Erro.php"); ?>
<?php require_once("../Banco/categorias.php"); ?>
<html>
<title>Adicionar Produto</title>
<head>
  <link rel="stylesheet" type="text/css" href="../Css/menu.css">
  <link rel="stylesheet" type="text/css" href="../Css/adicionar-produto.css">
  <link rel="stylesheet" type="text/css" href="../Css/footer.css">
</head>
<body>
  <?php
    try {
      $cat = new categorias();
      $resultado = $cat->listar();
    } catch (Exception $e) {
      Erro::trataErro($e);
    }
  ?>
  <header>
    <?php require_once('../Escopos/menu1.php'); ?>
  </header>
  <div>
    <h3>Criar Novo Produto</h3>
    <?php if (count($resultado) > 0): ?>
      <form action="../Logica/add_product.php" method="POST">
        <p>Adicionar um novo produto</p>
        <label>Nome</label>
        <input type="text" name="nome" placeholder="Nome">
        <label>Preço</label>
        <input type="text" name="preco" placeholder="Preço">
        <label>Quantidade</label>
        <input type="number" step="0.01" min="0" name="quantidade" placeholder="Quantidade">
        <label>Categoria</label>
        <select>
          <?php foreach($resultado as $linha): ?>
            <option value="<?php echo $linha['id']; ?>"><?php echo utf8_encode($linha['nome']); ?></option>
          <?php endforeach; ?>
        </select>
        <input type="submit" value="Adicionar">
      </form>
    <?php else: ?>
      <p>Nenhuma categoria cadastrada no sistema. Por favor, crie uma antes de cadastrar um produto</p>
    <?php endif; ?>
  </div>
</body>
</html>
