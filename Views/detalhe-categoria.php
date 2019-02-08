<?php
  require_once("../Classes/Categoria.php");
  require_once("../Banco/categorias.php");
  require_once("../Banco/produtos.php");
  require_once("../Classes/Produto.php");
  require_once("../Classes/Erro.php");
?>
<?php
  try {
    if (isset($_POST['id'])) {
      $id = $_POST['id'];
    } else {
      $id = $_GET['id'];
    }

    $categoria = new Categoria();
    $categoria->setId($id);

    $produtos = new produtos();
    $prod = $produtos->exibirProdutos($categoria);

    $categorias = new categorias();
    $cat = $categorias->carregarNome($categoria);
  } catch(Exception $e) {
    Erro::trataErro($e);
  }
?>
<html>
<title>Detalhes</title>
<head>
  <link rel="stylesheet" type="text/css" href="../Css/menu.css">
  <link rel="stylesheet" type="text/css" href="../Css/listar-categorias.css">
  <link rel="stylesheet" type="text/css" href="../Css/footer.css">
</head>
<body>
  <header>
    <?php require_once('../Escopos/menu1.php'); ?>
  </header>
  <div>
    <h3>Detalhes da Categoria</h3>
    <p>Id:</p>
    <p><?php echo $categoria->getId(); ?></p>
    <p>Nome:</p>
    <p><?php echo utf8_encode($cat["nome"]); ?></p>
    <p>Produtos:</p>
    <?php if(count($prod) > 0) : ?>
      <ul>
        <?php foreach($prod as $linha): ?>
          <li>
            <a href="detalhe-produto?id=<?php echo $linha['id']; ?>">
              <?php echo utf8_encode($linha['nome']); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else : ?>
      <p>Nenhum produto cadastrado nessa categoria</p>
    <?php endif; ?>
  </div>
  <footer>
    <hr>
    <h4>&copy All Rights Reserved, 2018-2019 -- Luis Felipe</h4>
  </footer>
</body>
<html>
