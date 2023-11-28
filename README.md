# PHP Backend System

* Visão Gera

Esse Sistema de Backend em PHP foi projetado para gerenciar contatos. Ele inclui funcionalidades CRUD (Criar, Ler, Atualizar, Excluir) e autenticação de usuários.

## Installation

Siga estas etapas para baixar e configurar o sistema:

## Download from GitHub:

* Abra o XAMPP:
    - Start Apache.
    - Start MySQL.

* Setup do Bando de dados:
    - Crie um banco de dados nomeando-o "contacts" no MySQL.

* Cole o projeto:
    - Cole a pasta "crud" dentr do arquivo `htdocs` dentro do XAMPP.

* Abra no VS Code:
    - Abra a pasta "crud" no VS Code. Garanta que a pasta seja aberta do diretorio `htdocs`.

## Criação das tabelas no banco de dados 'contacts':
    - Abra o arquivo "contacts.sql" no VS Code e use o script para criar a tabela "contacts".
    ```sql
    CREATE TABLE `contacts` (
      `id` int(11) NOT NULL AUTO_INCREMENT primary key,
      `fullName` varchar(200) NOT NULL,
      `phone` varchar(100) NOT NULL,
      `email` varchar(200) NOT NULL,
      `address` varchar(300) NOT NULL,
      `relation` varchar(100) NOT NULL,
      `created_at` datetime NOT NULL DEFAULT current_timestamp()
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ```

    - Crie uma outra tabela chamada "user" usando esse script:
    ```sql
    CREATE TABLE `user` (
        `id` int(11) NOT NULL AUTO_INCREMENT primary key,
        `email` varchar(100) DEFAULT NULL,
        `password` varchar(255) DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ```

* Acesse o sistema:
    - Digite no seu navegador: "localhost/crud/login.php" - sem aspas.
