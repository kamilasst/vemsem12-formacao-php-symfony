<?php

class visitante
{
    private string $cpf;
    private string $nome;
    private string $email;

    private static int $numeroDeVisitantes = 0;

    public function __construct(string $cpf, string $nome, string $email)
    {
        $this->validaCpf($cpf);
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;

        self::$numeroDeVisitantes++;
    }

    public function __destruct()
    {
        self::$numeroDeVisitantes--;
    }

    public function getCpf(): string {
        return $this->cpf;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    private function validaCpf(string $cpf): void
    {
        $cpfFormatado = preg_replace("/[^0-9]/", "", $cpf);
        if(strlen($cpfFormatado) != 11) {
            echo "O CPF não possui 11 caracteres" . PHP_EOL;
            exit();
        }
    }

    public function exibirDados() {
        return "Nome: {$this->nome}, Email: {$this->email}";
    }
}