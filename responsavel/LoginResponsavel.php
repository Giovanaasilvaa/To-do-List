<?php
// Starts the session to store user login info
session_start();

// Includes the User model (for database access and logic)
require_once '../model/Usuario.php';

// If user is already logged in, redirect to "cadastrar.php"
// Se o usuário já estiver logado, redireciona para a página principal
if (isset($_SESSION['id_usuario'])) {
    header("Location: ../visao/cadastrar.php");
    exit();
}

// Checks if the request method is POST (login form submitted)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);       // Get and clean the email input
    $senha = $_POST['senha'];             // Get the password input

    // Try to authenticate user by email
    $usuario = Usuario::autenticar($email);

    // If user exists and password is correct
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Store user ID in session and redirect to main page
        $_SESSION['id_usuario'] = $usuario['id'];
        header("Location: ../visao/cadastrar.php");
        exit();
    } else {
        // If login fails, redirect back to login page with error
        header("Location: ../index.php?erro=login");
        exit();
    }
}
