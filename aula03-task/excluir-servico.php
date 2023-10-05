<?php
global $pdo;

use Repositorio\ServicoEsteticoRepositorio;

require_once "./src/conexao-bd.php";
require_once "./src/Model/ServicoEstetico.php";
require_once "./src/Repositorio/ServicoEsteticoRepositorio.php";

//echo "Será excluido o produto de id = " . ;

$servicoRepositorio = new ServicoEsteticoRepositorio($pdo);
$servicoIdDeletar = $_POST["id"];

if(isset($servicoIdDeletar)) {
    $servicoRepositorio->deletarServico($servicoIdDeletar);
    header("Location: admin.php");
}
?>