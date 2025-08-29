<?php
session_start();

$_SESSION['nome'] = "Maria Clara";

header("location:pagina2.php");