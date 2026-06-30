-- ============================================
-- Script de Criação do Banco de Dados
-- Farmácia - Sistema de Gerenciamento de Estoque
-- ============================================

CREATE DATABASE IF NOT EXISTS farmacia_estoque
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE farmacia_estoque;

CREATE TABLE IF NOT EXISTS produtos (
    id          INT(11)        NOT NULL AUTO_INCREMENT,
    nome        VARCHAR(150)   NOT NULL,
    fabricante  VARCHAR(100)   NOT NULL,
    preco       DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    estoque     INT(11)        NOT NULL DEFAULT 0,
    criado_em   TIMESTAMP      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    atualizado  TIMESTAMP      NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dados de exemplo para testar o sistema
INSERT INTO produtos (nome, fabricante, preco, estoque) VALUES
('Dipirona 500mg 20 comprimidos',     'EMS',             8.90,   150),
('Amoxicilina 500mg 21 cápsulas',     'Medley',         22.50,    48),
('Paracetamol 750mg 20 comprimidos',  'Neo Química',     6.80,   200),
('Omeprazol 20mg 28 cápsulas',        'Eurofarma',      18.90,    75),
('Vitamina C 1g 10 comprimidos',      'EMS',             9.90,    30),
('Loratadina 10mg 12 comprimidos',    'Legrand',        14.50,    60),
('Ibuprofeno 600mg 20 comprimidos',   'Neo Química',    12.00,     5),
('Metformina 850mg 30 comprimidos',   'Merck',          19.90,    90),
('Azitromicina 500mg 3 comprimidos',  'Sandoz',         28.70,    12),
('Fluconazol 150mg 1 cápsula',        'Medley',         11.40,     2);
