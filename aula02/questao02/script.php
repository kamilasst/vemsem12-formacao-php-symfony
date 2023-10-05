<?php

require_once "./src/Visitante.php";
require_once "./src/ListaVisitantes.php";

$visitante1 = new Visitante("245.879.532-54", "Kamila Santos", "kamialsantos@email.com");
$visitante2 = new Visitante( "354.852.412-07", "Maria Oliveira", "mariaoliveira@email.com");
$visitante3 = new Visitante( "789.546.258-25", "Pedro Rodrigues", "pedrorodrigues@email.com");

$visitantes = new ListaVisitantes();

$visitantes->adicionar($visitante1);
$visitantes->adicionar($visitante2);
$visitantes->adicionar($visitante3);

$visitantes = $visitantes->listar();
foreach ($visitantes as $visitante) {
    echo $visitante->exibirDados() . PHP_EOL;
}

//$visistante = $visitantes->buscarPorCpf("245.879.532-54");











