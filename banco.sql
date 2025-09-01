DROP DATABASE IF EXISTS etimpwiiAluno;

CREATE DATABASE etimpwiiAluno;

USE etimpwiiAluno;

CREATE TABLE aluno (
    id INT PRIMARY KEY AUTO_INCREMENT,
    rm INT UNIQUE NOT NULL,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    INDEX idx_rm (rm),
    INDEX idx_email (email)
);
