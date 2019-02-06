<?php require_once("../Classes/Erro.php"); ?>
<html>
<title>Listar Categorias</title>
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
      try {
        $cat = new categorias();
        $resultado = $cat->listar();
      } catch(Exception $e) {
        Erro::trataErro($e);
      }
    ?>
    <h1>Categorias</h1>
    <form action="adicionar-categoria.php">
      <button>Adicionar Categoria</button>
    </form>
    <?php if (count($resultado) > 0): ?>
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
              <form action="editar-categoria.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">
                <button>Editar</button>
              </form>
              <form action="../Logica/delete_category.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">
                <button>Excluir</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php else: ?>
      <p>Nenhuma categoria foi cadastrada</p>
    <?php endif; ?>
  </div>
  <footer>
    <hr>
    <h4>&copy All Rights Reserved, 2018-2019 -- Luis Felipe</h4>
  </footer>
</body>
</html>
