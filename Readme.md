## Sistema de Gestão de Brinquedos

Sistema web simples em PHP + MySQL para cadastrar, listar, editar e excluir brinquedos. Cada brinquedo tem nome, categoria, faixa etária, preço e quantidade em estoque.

## Requisitos

XAMPP (Apache + MySQL + PHP)

## Como executar:

1. Copie a pasta do projeto para C:\xampp\htdocs\.

2. Abra o XAMPP Control Panel e inicie o Apache e o MySQL.

3. Acesse o phpMyAdmin (http://localhost/phpmyadmin) e crie o banco e a tabela:

   CREATE DATABASE brinquedos_db;
   USE brinquedos_db;

   CREATE TABLE brinquedos (
       id_brinquedo       INT AUTO_INCREMENT PRIMARY KEY,
       nome               VARCHAR(100) NOT NULL,
       categoria          VARCHAR(50)  NOT NULL,
       faixa_etaria       VARCHAR(30)  NOT NULL,
       preco              DECIMAL(10,2) NOT NULL,
       quantidade_estoque INT NOT NULL
   );

4. Confira em infra/conexao.php se o nome do banco, o usuário e a senha estão corretos (no XAMPP, o padrão é usuário root e senha vazia).

No navegador, acesse:
   http://localhost/Sistema de Gestão de Brinquedos/

## Estrutura

├── index.php                  # Listagem e formulário de cadastro
├── infra/conexao.php          # Conexão com o banco
├── public/
│   ├── cadastrar_brinquedo.php
│   ├── editar.php
│   └── deletar.php
└── style/styles.css