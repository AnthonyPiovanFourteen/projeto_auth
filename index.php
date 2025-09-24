<?php
/**
 * User.php -> Define a estrutura de um usuário (ID, nome, e-mail, hash da senha).
 * Validator.php -> Centraliza as regras de validação (formato de e-mail, força da senha), aplicando o princípio DRY.
 * UserManager.php -> Gerencia todas as operações de usuário: registrar, logar e resetar a senha, aplicando as regras de negócio.
 */


require_once __DIR__. '/src/Model/User.php';
require_once __DIR__. '/src/Service/Validator.php';
require_once __DIR__. '/src/Service/UserManager.php';

use App\Service\UserManager;

$userManager = new UserManager();

echo "---TESTES DE AUTENTICAÇÃO ---\n\n";

echo "Tentando cadastrar um usuário válido\n";
$resultado1 = $userManager->register('Wendell Pereira', 'wendell@email.com', 'Wendell123');
echo "Resultado: ". $resultado1. "\n\n";

echo "Tentando cadastrar com um e-mail inválido\n";
$resultado2 = $userManager->register('Pedro', 'pedro@@email', 'SenhaForte123');
echo "Resultado: ". $resultado2. "\n\n";

echo "Tentando login com a senha errada\n";
$resultado3 = $userManager->login('maria@email.com', 'SenhaErrada123');
echo "Resultado: ". $resultado3. "\n\n";

echo "Tentando resetar a senha do usuário ID 1\n";
$resultado4 = $userManager->resetPassword(1, 'NovaSenhaSegura1');
echo "Resultado: ". $resultado4. "\n\n";

echo "Tentando cadastrar um usuário com e-mail já existente\n";
$resultado5 = $userManager->register('Wendell Ribeiro', 'wendell@email.com', 'Wendell123');
echo "Resultado: ". $resultado5. "\n\n";
