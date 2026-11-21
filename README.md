# Sistema de Biblioteca

Aplicação web desenvolvida em Laravel para cadastro e consulta de livros, autores e resenhas. O projeto inclui uma interface web e uma API REST protegida por autenticação.

## Tecnologias

- PHP 8.3 ou superior
- Laravel 13
- Composer
- Node.js e npm
- SQLite (configuração local padrão) ou PostgreSQL
- Laravel Sanctum

## Pré-requisitos

Instale as ferramentas abaixo antes de iniciar:

- PHP 8.3 ou superior com as extensões necessárias para Laravel
- Composer
- Node.js 20 ou superior
- npm
- Docker e Docker Compose, somente para a instalação com Sail

## Instalação local com SQLite

1. Clone o repositório e acesse a pasta do projeto:

```bash
git clone https://github.com/francisprg/TSI-Desenvolvimento-Back-End-2.git
cd TSI-Desenvolvimento-Back-End-2
```

2. Instale as dependências PHP e JavaScript:

```bash
composer install
npm install
```

3. Crie o arquivo de ambiente:

```bash
cp .env.example .env
```

No Linux ou macOS, crie o arquivo do banco SQLite:

```bash
touch database/database.sqlite
```

No Windows (PowerShell), use:

```powershell
New-Item database/database.sqlite -ItemType File
```

4. Gere a chave da aplicação:

```bash
php artisan key:generate
```

5. Execute as migrations e os dados iniciais:

```bash
php artisan migrate --seed
```

6. Compile os arquivos frontend:

```bash
npm run build
```

7. Inicie o servidor de desenvolvimento:

```bash
composer run dev
```

A aplicação estará disponível em `http://localhost:8000`.

O seed cria um usuário administrador para testes:

- E-mail: `admin@admin.test`
- Senha: `adminpass`

## Instalação com Laravel Sail e PostgreSQL

O Docker Compose deste projeto cria os serviços da aplicação, PostgreSQL e pgAdmin.

1. Instale as dependências PHP antes de iniciar o Sail:

```bash
composer install
cp .env.example .env
```

2. Configure o banco PostgreSQL no arquivo `.env`:

```dotenv
APP_PORT=8080

DB_CONNECTION=pgsql
DB_HOST=pgsql
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

3. Gere a chave e execute os containers:

```bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
./vendor/bin/sail npm install
```

4. Inicie o Vite em outro terminal:

```bash
./vendor/bin/sail npm run dev
```

A aplicação estará disponível em `http://localhost:8080`.

Para acessar o pgAdmin, utilize:

- Endereço: `http://localhost:8093`
- E-mail: `admin@admin.com`
- Senha: `admin`

Para encerrar os containers:

```bash
./vendor/bin/sail down
```

## Configuração em um único comando

Para uma instalação local já configurada, o projeto também oferece o script `setup`:

```bash
composer run setup
```

Esse comando instala as dependências PHP, cria `.env` quando necessário, gera a chave, executa as migrations e compila os assets.

> Com SQLite, crie `database/database.sqlite` antes de executar as migrations.


## Endpoints principais

| Recurso | Caminho |
| --- | --- |
| Página inicial | `/` |
| Livros | `/livros` |
| Autores | `/autores` |
| Resenhas | `/resenhas` |
| API de livros | `/api/livros` |
| API de autores | `/api/autores` |
| API de resenhas | `/api/resenhas` |
| API de usuários | `/api/users` |

