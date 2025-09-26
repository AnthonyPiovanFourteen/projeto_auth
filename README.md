# Sistema de Usuários e Autenticação em PHP

## Requisitos do Projeto
- Seguir a PSR-12, DRY (Don't Repeat Yourself) e KISS (Keep It Simple, Stupid)
- Dados dos usuários armazenados em arrays PHP (sem DB)
- Uso de PHP puro, rodando em ambiente XAMPP
- Segurança com hash seguro para senhas 
- Validação de e-mail e força da senha

## Funcionalidades Implementadas
- Cadastro de usuário:
  - Validação do formato do e-mail
  - Validação da força da senha (mínimo 8 caracteres, ao menos 1 número e 1 letra maiúscula)
  - Geração de hash seguro para senha
  - Proibição de cadastro com e-mail duplicado
- Login de usuário:
  - Validação dos dados de acesso
  - Verificação da senha com hash armazenado
  - Retorno de mensagens claras para sucesso ou erro
- Reset de senha:
  - Atualização da senha com validações e novo hash
  - Aplicação de regras de força da senha

## Casos de Uso Testados
1. Cadastro válido com dados corretos
2. Tentativa de cadastro com e-mail inválido
3. Tentativa de login com senha incorreta
4. Reset de senha válido para usuário existente
5. Tentativa de cadastro com e-mail já cadastrado

## Como Executar
1. Configure ambiente XAMPP com PHP 7.4 ou superior
2. Clone este repositório na pasta `htdocs` do XAMPP
3. Acesse `http://localhost/usuarios/index.php` no navegador ou execute via CLI para ver os testes automáticos
4. Adapte o código conforme necessidade para integração em projetos reais

## Estrutura do Código
- `src/Model/User.php`: Classe que representa o usuário e seus atributos
- `src/Service/Validator.php`: Funções de validação de dados
- `src/Service/UserManager.php`: Lógica de cadastro, login e reset de senha
- `index.php`: Script principal para demonstração/testes do sistema
