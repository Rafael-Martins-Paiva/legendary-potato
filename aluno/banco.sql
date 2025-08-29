drop database etimpwiiAluno;

CREATE DATABASE etimpwiiAluno;
USE etimpwiiAluno;
CREATE TABLE aluno(
    id int primary key auto_increment,
    rm int,
    nome varchar(100),
    email varchar(150),
    senha varchar(32), 
    cpf varchar(14)
);
