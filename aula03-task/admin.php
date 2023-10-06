<?php
global $pdo;

use Repositorio\ServicoEsteticoRepositorio;

require_once "./src/conexao-bd.php";
require_once "./src/Model/ServicoEstetico.php";
require_once "./src/Repositorio/ServicoEsteticoRepositorio.php";

$servicoEsteticoRepositorio = new ServicoEsteticoRepositorio($pdo);
$dadosServico = $servicoEsteticoRepositorio->buscarTodos();
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="img/logotipo-clinica-de-estetica-corpus.jpg" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Clinica Estetica - Admin</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <img src="img/logotipo-clinica-de-estetica-corpus.jpg" class="logo-admin" alt="logo-clinica-estetica">
    <h1>Administração</h1>
    <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
  </section>
  <h2>Lista de Produtos</h2>

  <section class="container-table">
    <table>
      <thead>
        <tr>
          <th>Produto</th>
          <th>Tipo</th>
          <th>Descricão</th>
          <th>Valor</th>
          <th colspan="2">Ação</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($dadosServico as $servico):  ?>
      <tr>
        <td><?= $servico->getNome() ?></td>
        <td><?= $servico->getTipo() ?></td>
        <td><?= $servico->getDescricao() ?></td>
        <td><?= $servico->getPrecoFormatado() ?></td>
        <td><a class="botao-editar" href="editar-servico.php?id=<?=$servico->getId()?>">Editar</a></td>
        <td>
          <form action="excluir-servico.php" method="POST">
              <input type="hidden" name="id" value=<?=$servico->getId()?>>
              <input type="submit" class="botao-excluir" value="Excluir">
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  <a class="botao-cadastrar" href="cadastrar-servico.php">Cadastrar produto</a>
  <form action="#" method="post">
    <input type="submit" class="botao-cadastrar" value="Baixar Relatório"/>
  </form>
  </section>
</main>
</body>
</html>