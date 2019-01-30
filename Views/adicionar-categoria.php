<html>
<title>Adicionar Categoria</title>
<head>
  <link rel="stylesheet" type="text/css" href="../Css/menu.css">
  <link rel="stylesheet" type="text/css" href="../Css/adicionar-categoria.css">
  <link rel="stylesheet" type="text/css" href="../Css/footer.css">
</head>
<body>
  <header>
    <?php require_once('../Escopos/menu1.php'); ?>
  </header>
  <div>
    <h3>Criar Nova Categoria</h3>
    <form method="POST" action="../Logica/add_category.php">
      <p>Adicionar uma nova categoria</p>
      <input type="text" name="nome_categoria"> <br>
      <input type="submit" value="Adicionar">
    </form>
  </div>
  <footer>
    <hr>
    <h4>&copy All Rights Reserved, 2018-2019 -- Luis Felipe</h4>
  </footer>
</body>
</html>
