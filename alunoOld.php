<?php

require 'Aluno.class.php';
$aluno = new Aluno();

$con = $aluno->conectar();

if( $con ){
    $al = $aluno->consultar("rafael@gmail.com");
    if( !$al ){

    $aluno->cadastrar("rafael@gmail.com", 4117,  "000.111.222-33" , "rafael",);
    }else{
        echo"<script>alert('Esse aluno ja esta cadastrado!!')</script>";   
    }
}else{
    echo"<script>alert('Sem conexao com o banco. Tente mais tarde!')</script>";
}