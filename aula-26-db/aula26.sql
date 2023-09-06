-- aula 26

CREATE DATABASE aula26primeirosql;

CREATE TABLE clientes (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ts TIMESTAMP,
    nome VARCHAR(500),
    idade DECIMAL(3) UNSIGNED,
    pais VARCHAR(100),
    cidade VARCHAR(100)
);

INSERT INTO clientes (nome, idade, pais, cidade) VALUES ("Victória", 17, "Brasil", "Vila Velha");
INSERT INTO clientes (nome, idade, pais, cidade) VALUES ("Rebeca Leite", 17, "Brasil", "Vitória");
INSERT INTO clientes (nome, idade, pais, cidade) VALUES ("Natalia", 16, "Brasil", "Vitória");
INSERT INTO clientes (nome, idade, pais, cidade) VALUES ("Izabelly", 16, "Brasil", "Vila Velha");
INSERT INTO clientes (nome, idade, pais, cidade) VALUES ("Gil", 33, "Brasil", "Linhares");
INSERT INTO clientes (nome, idade, pais, cidade) VALUES ("Fábia", 40, "Itália", "Viena");
INSERT INTO clientes (nome, idade, pais, cidade) VALUES ("Biacco", 87, "Alemanha", "Berlim");
INSERT INTO clientes (nome, idade, pais, cidade) VALUES ("Luísa", 27, "Portugal", "Porto");

-- SELECT (selecionar informações) | WHERE ("onde" - insere condições)
SELECT * FROM clientes;
SELECT * FROM clientes WHERE pais = "Brasil";
SELECT nome, idade FROM clientes;
SELECT * FROM clientes WHERE idade >= 18;
SELECT * FROM clientes WHERE nome > "l";
SELECT * FROM clientes WHERE (pais, cidade) = ("Brasil", "Vila Velha");

-- DISTINCT
SELECT DISTINCT pais FROM clientes;
SELECT DISTINCT pais, cidade FROM clientes;

SELECT DISTINCT cidade
FROM clientes
WHERE pais = "Brasil";

-- ORDER BY
SELECT * FROM clientes ORDER BY idade;

SELECT DISTINCT cidade
FROM clientes
WHERE pais = "Brasil"
ORDER BY cidade;

-- OR
SELECT * FROM clientes WHERE NOT pais = "Brasil";
SELECT * FROM clientes WHERE pais = "Brasil" AND idade >= 18;
SELECT * FROM clientes WHERE pais = "Itália" OR pais = "Alemanha";

-- IN: está dentro de uma lista de opções
SELECT * FROM clientes
WHERE pais IN (
    'Itália',
    'Austrália',
    'Bali'
);

-- novas tabelas e FOREIGN KEY
CREATE TABLE produtos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ts TIMESTAMP,
    titulo VARCHAR(500),
    marca VARCHAR(100),
    preco DECIMAL(9,2) UNSIGNED
);

INSERT INTO produtos (titulo, marca, preco) VALUES ('Erva medicinal não especificada', 'Limpa Limpa', 10.0);
INSERT INTO produtos (titulo, marca, preco) VALUES ('Brisadeiro', 'Limpa Limpa', 15.0);
INSERT INTO produtos (titulo, marca, preco) VALUES ('Café', 'Milkshakespeare', 17.5);
INSERT INTO produtos (titulo, marca, preco) VALUES ('Insenso', 'Limpa Limpa', 2.0);
INSERT INTO produtos (titulo, marca, preco) VALUES ('Urbaninha', 'City', 7.5);

-- tabela RELACIONAL
-- FOREIGN KEY -> | FOREIGN KEY (variavel_local) REFERENCES nome_tabela_estrageira(variavel_estrangeira)
CREATE TABLE vendas (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ts TIMESTAMP,
    id_cliente INT UNSIGNED,
    id_produto INT UNSIGNED,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id);
    FOREIGN KEY (id_produto) REFERENCES produtos(id);
);

INSERT INTO vendas (id_cliente, id_produto) VALUES (1, 1);
INSERT INTO vendas (id_cliente, id_produto) VALUES (1, 2);
INSERT INTO vendas (id_cliente, id_produto) VALUES (2, 4);
INSERT INTO vendas (id_cliente, id_produto) VALUES (5, 5);

-- UPDATE / SET
UPDATE produtos
SET preco = 3.00
WHERE id = 4;

-- IN (SELECT)
-- Clientes que já fizeram compras
SELECT * FROM clientes WHERE id IN (
    SELECT DISTINCT id_cliente
    FROM vendas
);

-- produtos que não fizeram nenhuma venda
SELECT * FROM produtos WHERE id NOT IN (
    SELECT DISTINCT id_produto
    FROM vendas
);

-- tabela de vendas puxando informções das outras tabelas
SELECT vendas.id, vendas.ts, clientes.nome, produtos.titulo, produtos.preco
FROM vendas
INNER JOIN clientes ON vendas.id_cliente = clientes.id
INNER JOIN produtos ON vendas.id_produto = produtos.id;

-- AS: define apelido
SELECT 
    vendas.id AS 'ID da venda', 
    vendas.ts AS 'Timestamp da venda',
    clientes.nome AS 'Nome do cliente',
    produtos.titulo AS 'Título do produto', 
    produtos.preco AS 'Preço do produto'
FROM vendas
INNER JOIN clientes ON vendas.id_cliente = clientes.id
INNER JOIN produtos ON vendas.id_produto = produtos.id;