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
      <form action="../Logica/add_product.php" method="POST" enctype="multipart/form-data">
        <p>Adicionar um novo produto</p>
        <label>Nome</label>
        <input type="text" name="nome" placeholder="Nome">
        <label>Descrição</label>
        <textarea name="descricao" placeholder="Descrição"></textarea>
        <label>Preço</label>
        <input type="number" step="0.01" min="0" name="preco" placeholder="Preço">
        <label>Quantidade</label>
        <input type="number" step="1" min="1" name="quantidade" placeholder="Quantidade">
        <label>Categoria</label>
        <select name="categoria">
          <option disabled selected>Selecione uma opção</option>
          <?php foreach($resultado as $linha): ?>
            <option value="<?php echo $linha['id']; ?>"><?php echo utf8_encode($linha['nome']); ?></option>
          <?php endforeach; ?>
        </select>
        <label>Imagem</label>
        <input type="file" name="imagem">
        <input type="submit" value="Adicionar">
      </form>
    <?php else: ?>
      <p>Nenhuma categoria cadastrada no sistema. Por favor, crie uma antes de cadastrar um produto</p>
    <?php endif; ?>
  </div>
</body>
</html>
