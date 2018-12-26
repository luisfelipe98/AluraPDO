<html>
<title>P&aacute;gina Inicial</title>
</head>
  <link rel="stylesheet" type="text/css" href="Css/menu.css">
  <link rel="stylesheet" type="text/css" href="Css/listar-categorias.css">
  <link rel="stylesheet" type="text/css" href="Css/footer.css">
</head>
<body>
  <header>
    <?php require_once('../Escopos/menu.php'); ?>
  </header>
</body>
</html>

<?php

require_once('../Banco/categoria.php');

$categoria = new categoria();
$resultado = $categoria->listar();

?>



<?php


echo "<pre>";
print_r($resultado);
echo "</pre>";












 ?>
