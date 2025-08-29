<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>cadastro</title>
</head>
<body>
    <div id="login">
        <img src="https://picsum.photos/200/300" alt="img" id="image">
        <div id="form_conteiner">
            <h1>login</h1>
            <form action="" method="post" id="form">     
                <label for="rm">rm</label>
                <input type="number" name="rm" class="input" >
                <label for="name">name</label>
                <input type="text" name="name" class="input">
                <label for="email">email</label>
                <input type="email" name="email" class="input">
                <label for="password">password</label>
                <input type="password" name="password" class="input">
                <label for="cpf"></label>
                <input type="text" name="cpf" class="input">
                <input type="submit">
            </form>
        </div>
    </div>
</body>
</html>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rm = $_POST['rm'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);
    $cpf = $_POST['cpf'];

    echo "rm: " . $rm . "<br>";
    echo "name: " . $name . "<br>";
    echo "email: " . $email . "<br>";
    echo "Password: " . $password . "<br>";
    echo "cpf: " . $cpf;
}
?>
