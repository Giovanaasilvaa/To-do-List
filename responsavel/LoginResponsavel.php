<?php
session_start();
require_once '../model/Usuario.php';

if (isset($_SESSION['id_usuario'])) {
    header("Location: ../visao/cadastrar.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    $usuario = Usuario::autenticar($email);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['id_usuario'] = $usuario['id'];
        header("Location: ../visao/cadastrar.php");
        exit();
    } else {
        header("Location: ../index.php?erro=login");
        exit();
    }
}
