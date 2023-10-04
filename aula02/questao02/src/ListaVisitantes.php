<?php

class ListaVisitantes
{
    private $visitantes = [];

    public function adicionar(Visitante $visitante) {
        $this->visitantes[] = $visitante;
    }

    public function listar()
    {
        return $this->visitantes;
    }

    public function buscarPorCpf($cpf)
    {
        foreach ($this->visitantes as $visitante) {
            if ($visitante->getCpf() === $cpf) {
                return $visitante;
            }
            return null;
        }
    }

    public function alterar($cpf, $novoNome, $novoEmail)
    {
        foreach ($this->visitantes as $visitante) {
            if ($visitante->getCpf() === $cpf) {
                $visitante->setNome($novoNome);
                $visitante->setEmail($novoEmail);
                return true;
            }
        }
        return false;
    }

    public function excluir($cpf)
    {
        foreach ($this->visitantes as $cpf => $visitante) {
            if ($visitante->getCpf() === $cpf) {
                unset($this->visitantes[$cpf]);
                return true;
            }
        }
        return false;
    }
}