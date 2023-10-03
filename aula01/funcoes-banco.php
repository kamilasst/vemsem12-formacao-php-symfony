<?php

require_once("./bancos.php"); 

function listar(&$bancos){
    foreach($bancos as $agencia => $banco) {
        echo "$agencia - {$banco["nome"]}, {$banco["cidade"]}, {$banco["estado"]}" . PHP_EOL;
    }
 }

function adicionar(&$bancos, $banco_novo){
   $bancos = $bancos + $banco_novo;
}

function editar(&$bancos, $agencia, $nome, $cidade, $estado) {
    
    if(isset($bancos[$agencia])){
        $bancos[$agencia]["nome"] = $nome;
        $bancos[$agencia]["cidade"] = $cidade;
        $bancos[$agencia]["estado"] = $estado;
    }
}

function remover(&$bancos, $agencia){
    if(isset($bancos[$agencia])){
        unset($bancos[$agencia]);
        echo "Banco removido com sucesso!" . PHP_EOL;
    } else {
        echo "Não foi possível remover o banco! Tente novamente" . PHP_EOL;
    }
}



