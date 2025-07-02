# 🌍 Consumo da API REST Countries e Salvamento em Banco de Dados

Este projeto em PHP consome dados da [API REST Countries](https://restcountries.com/) e salva as informações de países (como nome, capital e moeda) em um banco de dados MySQL.

## 📌 Objetivo

Demonstrar o consumo de uma API pública com `cURL`/`file_get_contents`, tratamento de dados em JSON e inserção de registros em um banco relacional usando `PDO`.

---

## 🚀 Como Funciona

1. Conecta ao banco de dados utilizando PDO.
2. Consome os dados de todos os países a partir da API REST Countries.
3. Itera sobre os países, extrai informações específicas.
4. Salva os dados tratados em uma tabela MySQL (`pais`).

---

## 🧱 Estrutura de Arquivos

📁 projeto/
├── Database.php # Classe de conexão com o banco usando PDO
├── importador.php # Script que consome a API e salva os dados
└── README.md # Este arquivo

1. Clone o repositório:
```bash
git clone https://github.com/seuusuario/nome-do-repo.git
cd nome-do-repo

composer install

CREATE TABLE paises (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome_comum VARCHAR(100),
  nome_oficial VARCHAR(10),
  capital VARCHAR(100),
  moeda VARCHAR(100),
);

php importador.php
