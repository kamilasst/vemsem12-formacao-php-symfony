<?php

function listarVisitantes(array &$visitantes)
{
    if(!isset($visitantes)) {
        echo "Nenhum visitante encontrado na lista." . PHP_EOL;
        return;
    }

    foreach($visitantes as $cpf => $visitante) {
        echo "CPF: $cpf" . PHP_EOL;
        echo "Nome Visitante: {$visitante["nome"]}" . PHP_EOL;
        echo "Email: {$visitante["email"]}" . PHP_EOL;
        echo "---------------------------" . PHP_EOL;
    }
}

function adicionarVisitante(array &$visitantes, array $visitanteNovo)
{
    if(!cpfEhValido($visitanteNovo["cpf"])) {
        return;
    }

    $visitantes[$visitanteNovo["cpf"]] = [
        "nome" => $visitanteNovo["nome"],
        "email" => $visitanteNovo["email"]
    ];
}

function editarNomeVisitante(array &$visitantes, $cpf, $nome)
{
    if(!cpfEhValido($cpf)) {
        return;
    }
    $visitantes[$cpf]["nome"] = $nome;

}

function editarEmailVisitante(array &$visitantes, $cpf, $email)
{
    if(!cpfEhValido($cpf)) {
        return;
    }
    $visitantes[$cpf]["email"] = $email;

}

function editarVisitante(array &$visitantes, $cpf, $nome, $email)
{
    if(!cpfEhValido($cpf)) {
        return;
    }
    $visitantes[$cpf]["nome"] = $nome;
    $visitantes[$cpf]["email"] = $email;

}

function removerVisitante(array &$visitantes, $cpf) {
    if(!cpfEhValido($cpf)) {
        return;
    }

    if(!isset($visitantes[$cpf])) {
        echo "Não é possível deletar uma conta que não existe" . PHP_EOL;
        return;
    }

    unset($visitantes[$cpf]);
}

function cpfEhValido(string $cpf)
{
    $cpfFormatado = preg_replace("/[^0-9]/", "", $cpf);
    if(strlen($cpfFormatado) != 11) {
        echo "O CPF fornecido não possui um formato válido. Tente novamente" . PHP_EOL;
        return false;
    }
    return true;
}
