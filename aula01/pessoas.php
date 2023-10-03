<?php

$pessoas =   ["532.647.893-25" => ["nome" => "Ana Maria",
                      "idade" => "24",
                      "telefone" => "81-9999-5555"],
            "456.321.458-79" => ["nome" => "Catarina Sales",
                       "idade" => "30",
                       "telefone" => "81-98888-2222"],
            "325.741.258-96" => ["nome" => "Silvio Souza",
                       "idade" => "45",
                       "telefone" => "81-97777-1111"],
            "258.431.257-42" => ["nome" => "Angelica Santos",
                       "idade" => "33",
                       "telefone" => "81-9966-8888"]
            ];

foreach($pessoas as $cpf => $pessoa) {
    echo "$cpf - {$pessoa["nome"]}, {$pessoa["idade"]}, {$pessoa["telefone"]}" . PHP_EOL;
}

$pessoas["754.128.742-65"] = [
    "nome" => "Gabriella Maria",
    "idade" => "20",
    "telefone" => "81-9933-2222"
];

foreach($pessoas as $cpf => $pessoa) {
    echo "$cpf - {$pessoa["nome"]}, {$pessoa["idade"]}, {$pessoa["telefone"]}" . PHP_EOL;
}

unset($pessoas["532.647.893-25"]);

foreach($pessoas as $cpf => $pessoa) {
    echo "$cpf - {$pessoa["nome"]}, {$pessoa["idade"]}, {$pessoa["telefone"]}" . PHP_EOL;
}