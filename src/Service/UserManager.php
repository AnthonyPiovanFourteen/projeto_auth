<?php

namespace App\Service;

use App\Model\User;

class UserManager
{
    /** @var User */
    private array $users =[];
    private int $nextId = 1;

    private function findByEmail(string $email):?User
    {
        foreach ($this->users as $user) {
            if ($user->getEmail() === $email) {
                return $user;
            }
        }
        return null;
    }

    public function register(string $name, string $email, string $password): string
    {
        if (!Validator::validateEmail($email)) {
            return "E-mail inválido";
        }
        if (!Validator::isPasswordStrong($password)) {
            return "A senha não atende aos requisitos de segurança.";
        }
        if ($this->findByEmail($email)!== null) {
            return "E-mail já está em uso";
        }

        // Gera o hash seguro da senha
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $user = new User($this->nextId++, $name, $email, $passwordHash);
        $this->users[] = $user;

        return "Usuário cadastrado com sucesso.";
    }

    public function login(string $email, string $password): string
    {
        $user = $this->findByEmail($email);

        if ($user === null ||!password_verify($password, $user->getPasswordHash())) {
            return "Credenciais inválidas";
        }

        return "Login bem-sucedido. Bem-vindo, {$user->getName()}!";
    }
    
    public function resetPassword(int $userId, string $newPassword): string
    {
        if (!Validator::isPasswordStrong($newPassword)) {
             return "A nova senha não atende aos requisitos de segurança.";
        }
        
        foreach($this->users as $user) {
            if ($user->getId() === $userId) {
                // Substitui pela nova senha com hash
                $newHash = password_hash($newPassword, PASSWORD_DEFAULT);
                $user->setPasswordHash($newHash);
                return "Senha alterada com sucesso.";
            }
        }
        
        return "Usuário não encontrado.";
    }
}
