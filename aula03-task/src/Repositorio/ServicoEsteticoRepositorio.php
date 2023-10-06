<?php

namespace Repositorio;

use Model\ServicoEstetico;
use PDO;

class ServicoEsteticoRepositorio
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarTodos(): array
    {
        $sql = "SELECT * from servicos_esteticos";
        $statement = $this->pdo->query($sql);
        $dadosBD = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $dadosServico = array_map(function ($servico) {
            return $this->formarObjeto($servico);
        }, $dadosBD);

        return $dadosServico;
    }

    public function buscaOpcoesFacial(): array
    {
        $sql = "SELECT * FROM servicos_esteticos WHERE tipo = 'facial' order by preco;";
        $statement = $this->pdo->query($sql);
        $dadosBD = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $dadosFacial = array_map(function ($facial) {
            return $this->formarObjeto($facial);
        }, $dadosBD);

        return $dadosFacial;
    }

    public function buscarOpcoesCorporal(): array
    {
        $sql = "SELECT * FROM servicos_esteticos WHERE tipo = 'corporal' order by preco;";
        $statement = $this->pdo->query($sql);
        $dadosBD = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $dadosCorporal = array_map(function ($corporal) {
            return $this->formarObjeto($corporal);
        }, $dadosBD);

        return $dadosCorporal;
    }

    public function buscarServicoPeloId(int $servicoId): ServicoEstetico
    {
        $sql = "SELECT * FROM servicos_esteticos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $servicoId);
        $statement->execute();
        $dadoBD = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dadoBD);
    }

    public function cadastrarServico(ServicoEstetico $servico): bool
    {
        $sql = "INSERT INTO servicos_esteticos (tipo, nome, descricao, imagem, preco) VALUES(?, ?, ?, ?, ?);";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $servico->getTipo());
        $statement->bindValue(2, $servico->getNome());
        $statement->bindValue(3, $servico->getDescricao());
        $statement->bindValue(4, $servico->getImagem());
        $statement->bindValue(5, $servico->getPreco());
        return $statement->execute();
    }

    public function editarServico(ServicoEstetico $servico): bool
    {
        $sql = "UPDATE servicos_esteticos SET tipo = ?, nome = ?, descricao = ?, imagem = ?, preco = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $servico->getTipo());
        $statement->bindValue(2, $servico->getNome());
        $statement->bindValue(3, $servico->getDescricao());
        $statement->bindValue(4, $servico->getImagem());
        $statement->bindValue(5, $servico->getPreco());
        $statement->bindValue(6, $servico->getId());
        return $statement->execute();
    }

    public function deletarServico(int $idServicoDeletar): bool
    {
        $sql = "DELETE FROM servicos_esteticos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $idServicoDeletar);
        return $statement->execute();
    }

    private function formarObjeto(array $servico): ServicoEstetico
    {
        return new ServicoEstetico(
            $servico['id'],
            $servico['tipo'],
            $servico['nome'],
            $servico['descricao'],
            $servico['preco'],
            $servico['imagem'],
        );
    }
}

