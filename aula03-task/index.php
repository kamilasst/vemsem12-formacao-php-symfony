<?php

global $pdo;

use Repositorio\ServicoEsteticoRepositorio;

require_once "./src/conexao-bd.php";
require_once "./src/Model/ServicoEstetico.php";
require_once "./src/Repositorio/ServicoEsteticoRepositorio.php";

$servicoEstaticoRepositorio = new ServicoEsteticoRepositorio($pdo);
$dadosFacial= $servicoEstaticoRepositorio->buscaOpcoesFacial();
$dadosCorporal = $servicoEstaticoRepositorio->buscarOpcoesCorporal();
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/logotipo-clinica-de-estetica-corpus.jpg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Clínica de Estética - Serviços</title>
</head>
<body>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">

            </div>
        </section>
        <h2>Serviços</h2>
        <section class="container-facial">
            <div class="container-facial-titulo">
                <h3>Serviços Faciais</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-facial-servicos">
                <?php
                foreach($dadosFacial as $facial): ?>
                <div class="container-servico">
                    <div class="container-foto">
                        <img src=<?= $facial->getImagemFormatado()?>>
                    </div>
                    <p><?= $facial->getNome() ?></p>
                    <p><?= $facial->getDescricao() ?></p>
                    <p><?= $facial->getPrecoFormatado() ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="container-corporal">
            <div class="container-corporal-titulo">
                <h3>Serviços Corporais</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-corporal-servicos">
                <?php
                foreach($dadosCorporal as $corporal): ?>
                <div class="container-servico">
                    <div class="container-foto">
                        <img src=<?=$corporal->getImagemFormatado()?>>
                    </div>
                    <p><?= $corporal->getNome() ?></p>
                    <p><?= $corporal->getDescricao() ?></p>
                    <p><?= $corporal->getPrecoFormatado() ?></p>
                </div>
                <?php endforeach; ?>
            </div>

        </section>
    </main>
</body>
</html>