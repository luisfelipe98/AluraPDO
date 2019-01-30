<html>
<title>P&aacute;gina Inicial</title>
</head>
  <link rel="stylesheet" type="text/css" href="../Css/menu.css">
  <link rel="stylesheet" type="text/css" href="../Css/listar-categorias.css">
  <link rel="stylesheet" type="text/css" href="../Css/footer.css">
</head>
<body>
  <header>
    <?php require_once('../Escopos/menu1.php'); ?>
  </header>
  <div>
    <?php
      require_once('../Banco/categorias.php');
      $cat = new categorias();
      $resultado = $cat->listar();
    ?>
    <h1>Categorias</h1>
    <form action="adicionar-categoria.php">
      <button>Adicionar Categoria</button>
    </form>
    <table>
      <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Ações</th>
      </tr>
      <?php foreach($resultado as $linha) :?>
        <tr>
          <td><?php echo $linha["id"]; ?></td>
          <td><?php echo utf8_encode($linha["nome"]); ?></td>
          <td>
            <form action="editar-categoria.php">
              <button>Editar</button>
            </form>
            <form action="excluir-categoria.php">
              <button>Excluir</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
  <footer>
    <hr>
    <h4>&copy All Rights Reserved, 2018 -- Luis Felipe</h4>
  </footer>
</body>
</html>
