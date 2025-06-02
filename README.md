-- Criar banco de dados
CREATE DATABASE IF NOT EXISTS bankwise CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE bankwise;

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo_usuario ENUM('cliente', 'admin') DEFAULT 'cliente',
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabela de contas
CREATE TABLE IF NOT EXISTS contas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    numero_conta VARCHAR(20) NOT NULL UNIQUE,
    tipo_conta ENUM('corrente', 'poupanca') NOT NULL,
    saldo DECIMAL(15,2) DEFAULT 0.00,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Tabela de transações
CREATE TABLE IF NOT EXISTS transacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    conta_id INT NOT NULL,
    tipo_transacao ENUM('deposito', 'saque', 'transferencia_entrada', 'transferencia_saida') NOT NULL,
    valor DECIMAL(15,2) NOT NULL,
    descricao VARCHAR(255),
    data_transacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (conta_id) REFERENCES contas(id) ON DELETE CASCADE
);

-- Inserir usuários iniciais
INSERT INTO usuarios (nome, email, senha, tipo_usuario) VALUES
('João Silva', 'joao@email.com', '$2y$10$examplehash', 'cliente'), -- senha deve estar hashed
('Maria Souza', 'maria@email.com', '$2y$10$examplehash2', 'cliente'),
('Admin', 'admin@email.com', '$2y$10$adminhash', 'admin');

-- Inserir contas iniciais
INSERT INTO contas (usuario_id, numero_conta, tipo_conta, saldo) VALUES
(1, '123456-7', 'corrente', 1000.00),
(2, '765432-1', 'poupanca', 2500.00);

-- Inserir transações iniciais
INSERT INTO transacoes (conta_id, tipo_transacao, valor, descricao) VALUES
(1, 'deposito', 1000.00, 'Depósito inicial João'),
(2, 'deposito', 2500.00, 'Depósito inicial Maria');
