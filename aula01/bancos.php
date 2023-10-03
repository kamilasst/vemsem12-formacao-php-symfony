<?php

$bancos =   ["4444" => ["nome" => "Banco 1",
                      "cidade" => "Porto Alegre",
                      "estado" => "Rio Grande do Sul"],
            "5555" => ["nome" => "Banco 2",
                       "cidade" => "Rio de Janeiro",
                       "estado" => "Rio de Janeiro"],
            "6666" => ["nome" => "Banco 3",
                       "cidade" => "São Paulo",
                       "estado" => "São Paulo"],
            "7777" => ["nome" => "Banco 4",
                       "cidade" => "Gravataí",
                       "estado" => "Santa Catarina"]
            ];

/*
echo "Listando todos os bancos \n";
foreach($bancos as $agencia => $banco) {
    echo "$agencia - {$banco["nome"]}, {$banco["cidade"]}, {$banco["estado"]}" . PHP_EOL;
}

echo "\nAdicionando um novo banco de agência número 8888 \n";
$bancos["8888"] = [
    "nome" => "Banco 5",
    "cidade" => "Cachoeirinha",
    "estado" => "Rio Grande do Sul"
];

foreach($bancos as $agencia => $banco) {
    echo "$agencia - {$banco["nome"]}, {$banco["cidade"]}, {$banco["estado"]}" . PHP_EOL;
}

echo "\nExcluindo o banco de número da agência 4444 \n";
unset($bancos["4444"]);

foreach($bancos as $agencia => $banco) {
    echo "$agencia - {$banco["nome"]}, {$banco["cidade"]}, {$banco["estado"]}" . PHP_EOL;
}

echo "\nEditando a agência 7777 \n";
$bancos["7777"] = [
    "nome" => "Banco 4",
    "cidade" => "Gravataí",
    "estado" => "Rio Grande do Sul"
];

foreach($bancos as $agencia => $banco) {
    echo "$agencia - {$banco["nome"]}, {$banco["cidade"]}, {$banco["estado"]}" . PHP_EOL;
}

echo "\nValindando se o array tem banco cadastrado \n";
if(empty($bancos)){
    echo "Desculpe, não foi possível encontrar nenhum banco cadastrado.";
} else{
    foreach($bancos as $agencia => $banco) {
        echo "$agencia - {$banco["nome"]}, {$banco["cidade"]}, {$banco["estado"]}" . PHP_EOL;
    }
}

echo "\nQuantidade de bancos cadastrados no array \n";
echo "Bancos cadastrados na lista - Quantidade: " , count($bancos);
*/
