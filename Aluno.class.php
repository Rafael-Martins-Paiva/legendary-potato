<?php
class Aluno{
    private $rm;
    private $senha;
    private $nome;
    private $cpf;
    private $email;
    private $pdo;

    public function conectar(){
        $dns    = "mysql:dbname=etimpwiialuno;host=127.0.0.1";
        $dbUser = "root";
        $dbPass = "";

        try {
            $this->pdo = new PDO($dns, $dbUser, $dbPass);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getRm(){
        return $this->rm;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getCpf(){
        return $this->cpf;
    }
    
    public function setNome($nome){
        $this ->nome =$nome;
    }
    public function setEmail($email){
        $this ->email =$email;
    }
    public function setCpf($cpf){
        $this ->cpf =$cpf;
    }

    public function cadastrar($email, $cpf, $rm, $nome){
        $sql = "INSERT INTO aluno set nome = :n, email = :e, cpf = :c, senha = :s";
        $sql = $this->pdo->prepare($sql);

        $sql-> bindValue(":n", $nome);
        $sql-> bindValue(":s", $senha);
        $sql-> bindValue(":e", $email);
        $sql-> bindValue(":c", $cpf);

        return $sql->execute();
    }
    
    public function consultar($email){
        $sql = "SELECT * FROM aluno where email = :e";
        $sql = $this->pdo->prepare($sql);
        $sql-> bindValue(":e", $email);
        
        $sql->execute();
        return $sql->rowCount() > 0;
    }
}