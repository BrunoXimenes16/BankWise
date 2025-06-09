CREATE DATABASE IF NOT EXISTS bankwise;
USE bankwise;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
  id INT(11) NOT NULL AUTO_INCREMENT,
  usuario VARCHAR(50) NOT NULL,
  senha VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY usuario (usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO usuarios (usuario, senha) VALUES
('admin', '$2y$10$7hEvNCRJxD5Zx6jPEcb1I.Wv/EJZT8lXVD9VUXPDbi4dx5y1Q7W.i'),
('joao', '$2y$10$A4M4k5V3vvQKMZ0u0CItkOrwMf4PXW9bbvTYTDX6blWekcwhbLkCS');

DROP TABLE IF EXISTS transacoes;
CREATE TABLE transacoes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  tipo VARCHAR(20),
  valor DECIMAL(10,2),
  data DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

INSERT INTO transacoes (usuario_id, tipo, valor) VALUES
(1, 'entrada', 250.00),
(1, 'saida', 100.00),
(2, 'entrada', 300.00);

SELECT 
  usuarios.usuario,
  transacoes.tipo,
  transacoes.valor,
  transacoes.data
FROM 
  transacoes
INNER JOIN 
  usuarios ON transacoes.usuario_id = usuarios.id;
