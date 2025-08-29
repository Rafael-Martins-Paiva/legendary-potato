<?php
class Aluno{
    private $id;
    private $rm;
    private $nome;
    private $cpf;
    private $email;
    private $pdo;

    public function conectar(){
        $dns    = "mysql:dbname=etimpwiialuno;host=localhost";
        $dbUser = "root";
        $dbPass = "";

        try {
            $this->pdo = new PDO($dns, $dbUser, $dbPass);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getId(){
        return $this->id;
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
    
    public function setRm($rm){
        $this ->rm =$rm;
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
        $sql = "INSERT INTO aluno set rm = :r, nome = :n, email = :e, cpf = :c";
        $sql = $this->pdo->prepare($sql);

        $sql-> bindValue(":n", $nome);
        $sql-> bindValue(":r", $rm);
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