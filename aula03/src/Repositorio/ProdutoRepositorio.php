<?php

namespace Repositorio;

use Model\ServicoEstetico;
use PDO;

class ProdutoRepositorio
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    private function formarObjeto(array $produto): ServicoEstetico
    {
        return new ServicoEstetico(
            $produto['id'],
            $produto['tipo'],
            $produto['nome'],
            $produto['descricao'],
            $produto['preco'],
            $produto['imagem'],
        );
    }

    public function buscaTodos(): array
    {
        $sql = "SELECT * from produtos";
        $statement = $this->pdo->query($sql);
        $dadosBD = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $dadosNegocio = array_map(function ($produto) {
            return $this->formarObjeto($produto);
        }, $dadosBD);

        return $dadosNegocio;
    }

    public function buscaOpcoesCafe(): array
    {
        $sql = "SELECT * FROM produtos WHERE tipo = 'cafe' order by preco;";
        $statement = $this->pdo->query($sql);
        $dadosBD = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $dadosCafe = array_map(function ($cafe) {
            return $this->formarObjeto($cafe);
        }, $dadosBD);

        return $dadosCafe;
    }

    public function buscaOpcoesAlmoco(): array
    {
        $sql = "SELECT * FROM produtos WHERE tipo = 'almoco' order by preco;";
        $statement = $this->pdo->query($sql);
        $dadosBD = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $dadosAlmoco = array_map(function ($almoco) {
            return $this->formarObjeto($almoco);
        }, $dadosBD);

        return $dadosAlmoco;
    }

    public function deletaProduto(int $idProdutoDeletar): bool
    {
        $sql = "DELETE FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $idProdutoDeletar);
        return $statement->execute();
    }

    public function cadastraProduto(ServicoEstetico $produto): bool
    {
        $sql = "INSERT INTO produtos (tipo, nome, descricao, imagem, preco) VALUES(?, ?, ?, ?, ?);";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->getTipo());
        $statement->bindValue(2, $produto->getNome());
        $statement->bindValue(3, $produto->getDescricao());
        $statement->bindValue(4, $produto->getImagem());
        $statement->bindValue(5, $produto->getPreco());
        return $statement->execute();
    }

    public function buscaProdutoUnico(int $produtoId): ServicoEstetico
    {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produtoId);
        $statement->execute();
        $dadoBD = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dadoBD);
    }

    public function editaProduto(ServicoEstetico $produto): bool
    {
        $sql = "UPDATE produtos SET tipo = ?, nome = ?, descricao = ?, imagem = ?, preco = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->getTipo());
        $statement->bindValue(2, $produto->getNome());
        $statement->bindValue(3, $produto->getDescricao());
        $statement->bindValue(4, $produto->getImagem());
        $statement->bindValue(5, $produto->getPreco());
        $statement->bindValue(6, $produto->getId());
        return $statement->execute();
    }
}

