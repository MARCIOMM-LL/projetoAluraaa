<?php

namespace App\Alura;

class Contato
{

    private $email;

    public function __construct(string $email)
    {
        $this->email = $email;

        if($this->validarEmail($email) !== false){
            $this->validarEmail($email);
        }else{
            $this->validarEmail("Email inválido");
        }
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getUsuario(): string
    {
        $posicaoArroba = strpos($this->email, "@");

        if ($posicaoArroba === false) {
            return "Usuario Inválido";
        }

        return substr($this->email, 0, $posicaoArroba);
    }

    private function validarEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
?>