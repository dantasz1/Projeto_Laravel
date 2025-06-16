# Laravel App

Este é um projeto de exemplo em Laravel para gerenciamento de usuários, produtos e contatos, com autenticação simples e painel administrativo.

## Funcionalidades

- Cadastro, edição, listagem e exclusão de usuários
- Cadastro, edição, listagem e exclusão de produtos (com upload de imagem)
- Listagem e exclusão de contatos enviados pelo formulário
- Autenticação de usuários (login/logout)
- Dashboard administrativo com atalhos para todas as funções
- Interface responsiva utilizando Bootstrap

## Instalação

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/seuusuario/laravel-app.git
   cd laravel-app
   ```

2. **Instale as dependências:**
   ```bash
   composer install
   ```

3. **Copie o arquivo de ambiente e configure:**
   ```bash
   cp .env.example .env
   ```
   Edite o `.env` com as configurações do seu banco de dados.

4. **Gere a chave da aplicação:**
   ```bash
   php artisan key:generate
   ```

5. **Execute as migrations:**
   ```bash
   php artisan migrate
   ```

6. **(Opcional) Crie o link simbólico para uploads:**
   ```bash
   php artisan storage:link
   ```

7. **Inicie o servidor:**
   ```bash
   php artisan serve
   ```

## Rotas Principais

- `/home` — Página inicial
- `/sobre` — Sobre o sistema
- `/produtos` — Lista de produtos
- `/usuarios` — Lista de usuários
- `/contatos` — Lista de contatos
- `/cadastro` — Cadastro de usuário
- `/frmlogin` — Login
- `/dashboard` — Painel administrativo

## Estrutura de Pastas

- `app/Http/Controllers/AppController.php` — Controller principal
- `app/Models/Usuario.php` — Model de usuário
- `app/Models/Produto.php` — Model de produto
- `app/Models/Contato.php` — Model de contato
- `resources/views/` — Views Blade (páginas)
- `routes/web.php` — Definição das rotas

## Observações

- O sistema utiliza autenticação simples baseada em sessão.
- Para upload de imagens de produtos, é necessário o diretório `storage/app/public/imagens` com permissão de escrita.
- As rotas utilizam nomes para facilitar o uso do helper `route()` nas views.

## Licença

Este projeto é open-source e está sob a licença MIT.
