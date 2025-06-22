-- Script de criação do banco de dados e tabelas
-- Este script configura a estrutura inicial do banco de dados para o sistema de login

-- Criar o banco de dados se não existir
CREATE DATABASE IF NOT EXISTS login_db;

-- Selecionar o banco de dados para uso
USE login_db;

-- Remover a tabela users se já existir (reset da tabela)
DROP TABLE IF EXISTS users;

-- Criar a tabela de usuários com os campos necessários
CREATE TABLE users (
    -- ID único auto-incrementado como chave primária
    id INT AUTO_INCREMENT PRIMARY KEY,
    -- Nome de usuário único
    username VARCHAR(50) UNIQUE NOT NULL,
    -- Senha criptografada (usando BCRYPT que gera uma string de 60 caracteres)
    password VARCHAR(255) NOT NULL,
    -- Data e hora de criação do registro
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserir um usuário padrão para testes
-- Usuário: admin
-- Senha: admin123 (já com hash BCRYPT)
INSERT INTO users (username, password) VALUES 
('admin', '$2y$10$GQzZQynVyBLabf270GjcZ.PnJ4Vy6B8YaMiz9mGmdbnT7xy5MawBS');