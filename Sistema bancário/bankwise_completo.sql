-- Criar tabela de transações
CREATE TABLE transacoes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  tipo VARCHAR(20),
  valor DECIMAL(10,2),
  data DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Inserir exemplo
INSERT INTO transacoes (usuario_id, tipo, valor) VALUES
(1, 'entrada', 250.00),
(1, 'saida', 100.00),
(2, 'entrada', 300.00);

-- Ver com INNER JOIN
SELECT 
  usuarios.usuario,
  transacoes.tipo,
  transacoes.valor,
  transacoes.data
FROM 
  transacoes
INNER JOIN 
  usuarios ON transacoes.usuario_id = usuarios.id;
