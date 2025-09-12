<?php
require 'Aluno.class.php';

function logError($message) {
    $logFile = __DIR__ . '/erros.log';
    $formattedMessage = '[' . date('Y-m-d H:i:s') . '] ' . $message . PHP_EOL;
    file_put_contents($logFile, $formattedMessage, FILE_APPEND | LOCK_EX);
}

ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/php_error.log');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim(strip_tags($_POST['name'] ?? ''));
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';
    $cpf = preg_replace('/\D/', '', $_POST['cpf'] ?? '');

    if (!$name || !$email || !$password || !$cpf || strlen($cpf) !== 11) {
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

        $aluno->cadastrar($email, $cpf,  $hashed_password, $name);

        header("Location: sucesso_cadastro.html");
        exit();
    } catch (Exception $e) {
        logError($e->getMessage());
        header("Location: cadastro.html?erro=falha_no_cadastro");
        exit();
    }
}