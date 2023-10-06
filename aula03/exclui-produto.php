<?php
global $pdo;

use Repositorio\ServicoEsteticoRepositorio;

require_once "./src/conexao-bd.php";
require_once "./src/Model/Produto.php";
require_once "./src/Repositorio/ProdutoRepositorio.php";

//echo "Será excluido o produto de id = " . ;

$produtoRepositorio = new ServicoEsteticoRepositorio($pdo);
$produtoIdDeletar = $_POST["id"];

if(isset($produtoIdDeletar)) {
    $produtoRepositorio->deletarServico($produtoIdDeletar);
    header("Location: admin.php");
}
?>