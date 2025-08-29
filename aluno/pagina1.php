<?php
session_start();

//criacao de uma sessao 
$_SESSION['nome'] = "Fabio Claret";

header("location:pagina2.php");
