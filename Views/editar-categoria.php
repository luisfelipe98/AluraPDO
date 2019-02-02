<?php

require_once("../Banco/categorias.php");
require_once("../Classes/Categoria.php");
require_once("../Classes/Erro.php");

try{
  $id = $_POST['id'];
  $categoria = new Categoria();
  $categoria->setId($id);
} catch (Exception $e) {
  Erro::trataErro($e);
}

try {
  $categorias = new categorias();
  $resultado = $categorias->carregarNome($categoria->getId());
} catch (Exception $e) {
  Erro::trataErro($e);
}
?>

<html>
<title>Editar Categoria</title>
<head>
  <link rel="stylesheet" type="text/css" href="../Css/menu.css">
  <link rel="stylesheet" type="text/css" href="../Css/editar-categoria.css">
  <link rel="stylesheet" type="text/css" href="../Css/footer.css">
</head>
<body>
  <header>
    <?php require_once('../Escopos/menu1.php'); ?>
  </header>
  <div>
    <h3>Editar Categoria</h3>
    <form action="../Logica/edit_category.php" method="POST">
      <input type="hidden" value="<?php echo $categoria->getId(); ?>" name="id">
      <p>Nome</p>
      <input type="text" value="<?php echo utf8_encode($resultado['nome']); ?>" name="novo_nome">
      <input type="submit" value="Editar">
    </form>
  </div>
  <footer>
    <hr>
    <h4>&copy All Rights Reserved, 2018-2019 -- Luis Felipe</h4>
  </footer>
</body>
</html>
