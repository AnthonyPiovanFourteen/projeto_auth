<?php

require_once __DIR__. '/src/Model/User.php';
require_once __DIR__. '/src/Service/Validator.php';
require_once __DIR__. '/src/Service/UserManager.php';

use App\Service\UserManager;

$userManager = new UserManager();

echo "---TESTES DE AUTENTICAÇÃO ---<br>";

echo "Tentando cadastrar um usuário válido\n";
$resultado1 = $userManager->register('Wendell Pereira', 'wendell@email.com', 'Wendell123');
echo "Resultado: ". $resultado1. "<br>";

echo "Tentando cadastrar com um e-mail inválido\n";
$resultado2 = $userManager->register('Pedro', 'pedro@@email', 'SenhaForte123');
echo "Resultado: ". $resultado2. "<br>";

echo "Tentando login com a senha errada\n";
$resultado3 = $userManager->login('maria@email.com', 'SenhaErrada123');
echo "Resultado: ". $resultado3. "<br>";

echo "Tentando resetar a senha do usuário com e-mail\n";
$resultado4 = $userManager->resetPassword('wendell@email.com', 'Wendell1234');
echo "Resultado: ". $resultado4. "<br>";

echo "Tentando cadastrar um usuário com e-mail já existente\n";
$resultado5 = $userManager->register('Wendell Ribeiro', 'wendell@email.com', 'Wendell1234');
echo "Resultado: ". $resultado5. "<br>";
