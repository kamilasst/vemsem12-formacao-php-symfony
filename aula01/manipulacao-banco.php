<?php

require_once("./funcoes-banco.php");

$banco_novo = [
    "9999" => [
        "nome" => "Banco 9",
        "cidade" => "Porto Alegre",
        "estado" => "Rio Grande do Sul"
    ]
];

listar($bancos);

adicionar($bancos, $banco_novo);
listar($bancos);

$agencia = "9999";
$nome = "Banco 10";
$cidade = "Recife";
$estado = "Pernambuco";

editar($bancos, $agencia, $nome, $cidade, $estado);
listar($bancos);

$agencia2 = "4444";
remover($bancos, $agencia2);
listar($bancos);
