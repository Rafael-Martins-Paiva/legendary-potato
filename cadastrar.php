<?php

require 'Aluno.class.php';

function logError($message) {
    $logFile = 'erros.log';
    $formattedMessage = '[' . date('Y-m-d H:i:s') . '] ' . $message . PHP_EOL;
    file_put_contents($logFile, $formattedMessage, FILE_APPEND | LOCK_EX);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $cpf = preg_replace('/[^0-9]/', '', filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING));

    if ( !$name || !$email || !$password || !$cpf || strlen($cpf) !== 11) {
        logError("Tentativa de cadastro com dados inválidos ou incompletos.");
        header("Location: cadastro.html?erro=dados_invalidos");
        exit();
    }

    try {
        $aluno = new Aluno();
        $con = $aluno->conectar();

        if (!$con) {
            throw new Exception("Erro ao conectar com o banco de dados.");
        }

        $al = $aluno->consultar($email);

        if ($al) {
            throw new Exception("Email '$email' já cadastrado.");
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $aluno->cadastrar($email, $cpf, $name, $hashed_password);

        header("Location: sucesso_cadastro.html");
        exit();

    } catch (Exception $e) {
        logError($e->getMessage());
        header("Location: cadastro.html?erro=falha_no_cadastro");
        exit();
    }
}
