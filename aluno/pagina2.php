<?php
session_start();

if( isset($_SESSION['nome'])){
    $nome = $_SESSION['nome'];
    echo "<h1>Oi $nome, bem vindo!";
}else{
    echo"<h1>Que pena, voce nao esta logado!!";
}