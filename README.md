# 📑 Sistema de Licitações

Aplicação em **Laravel** para importação, listagem e marcação de licitações públicas como visualizadas.

---

## ⚙️ Tecnologias

- **Backend:** Laravel 10+
- **Banco de Dados:** MySQL/MariaDB
- **API RESTful:** com paginação, filtros e marcação de licitacoes lidas
- **Testes:** PHPUnit
- **Documentação:** Swagger (OpenAPI)

---

## ⚙️ Pré-requisitos

- Docker e Docker Compose instalados.  
  (https://docs.docker.com/get-docker/)


## 🚀 Instalação

### Clonando o Repositório

- Utilize o comando abaixo clonar o projeto:

```bash
https://github.com/vitoreal/licitacao-api.git
cd licitacao-api
```

### Configuração de Ambiente

1. Copie o arquivo `.env.example` para `.env` e configure-o conforme o ambiente necessário.
2. Execute os containers usando Docker com o Compose configurado.

### Build e Execução com Podman

- Utilize o comando abaixo para rodar os containers:
    ```bash
    docker-compose up -d
    ```

### Criação de Migrations

- Entre no container:
  ```bash
  docker exec -it licitacao-api-php-1 bash
  ```
- Execute o composer:
  ```bash
  composer install
  ```
- Execute as migrations:
  ```bash
  php artisan migrate
  ```

## 📂 Estrutura da Aplicação

```plaintext
licitacao-api/
├── app/
│   ├── Exceptions/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Licitacao/
│   │   │   ├── Swagger/
│   ├── Models/
│   └── Services/
│   └── Repository/
│   └── Providers/
│
├── bootstrap/
├── config/
├── database/
├── docker/
├── public/
├── resource/
├── routes/
├── storage/
│
├── tests/
│
├── composer.json
└── .env

 ```

 ## 🧪 Testes

### Backend

- Entre no container:
  ```bash
  docker exec -it licitacao-api-php-1 bash
  php artisan test
  ```

## 📝 Documentação / Swagger

A documentação da API está disponível via Swagger. Após iniciar os containers, acesse:

http://localhost:8080/api/docs

## 🔗 Links dos Ambientes

### Ambiente de DEV
- **Backend:** [http://localhost:8080](http://localhost:8080)