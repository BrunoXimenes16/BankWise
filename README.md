-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS bankwise CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE bankwise;

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
