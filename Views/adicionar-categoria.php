<html>
<title>Adicionar Categoria</title>
<head>
  <link rel="stylesheet" type="text/css" href="../Css/menu.css">
  <link rel="stylesheet" type="text/css" href="../Css/listar-categorias.css">
  <link rel="stylesheet" type="text/css" href="../Css/footer.css">
</head>
<body>
  <header>
    <?php require_once('../Escopos/menu1.php'); ?>
  </header>
  <form method="POST" action="../Logica/add_category.php">
    <h3>Criar Nova Categoria</h3>
    <p>Adicionar uma nova categoria</p>
    <input type="text" name="nome_categoria">
    <input type="submit" value="Adicionar">
  </form>
  <footer>
    <hr>
    <h4>&copy All Rights Reserved, 2018-2019 -- Luis Felipe</h4>
  </footer>
</body>
</html>
