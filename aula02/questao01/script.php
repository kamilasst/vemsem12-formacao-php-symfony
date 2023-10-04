<?php

require_once "./visitantes.php";
require_once "./operacoes.php";


$visitantes["125.478.563.58"] = [
    "nome" => "Maria Eduarda",
    "email" => "mariaeduarda@email.com"
];

listarVisitantes($visitantes);

editarNomeVisitante($visitantes, "125.478.563.58", "Maria Eduarda Silva");
listarVisitantes($visitantes);

editarEmailVisitante($visitantes, "125.478.563.58", "mariasilva@email.com");
listarVisitantes($visitantes);

editarVisitante($visitantes, "125.478.563.58", "Maria Eduarda Silva","mariasilva@email.com");
listarVisitantes($visitantes);

removerVisitante($visitantes, "125.478.563.58");
listarVisitantes($visitantes);