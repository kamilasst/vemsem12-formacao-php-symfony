<?php

require_once "visitantes.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP | Visitantes</title>
</head>
<body>
    <h1>Registro de Visitantes</h1>
    <hr>

    <?php
    if(isset($visitantes)) {
    foreach ($visitantes as $cpf => $visitante) : ?>
        <h2>CPF: <?= $cpf ?></h2>
        <h3>Nome Visitante:  <?= $visitante["nome"] ?></h3>
        <h3>Email:  <?= $visitante["email"] ?></h3>
        <hr>
    <?php endforeach; ?>
    <?php } else { ?>
        <h2>Nenhum visitante encontrado!</h2>
    <?php } ?>
</body>
</html>