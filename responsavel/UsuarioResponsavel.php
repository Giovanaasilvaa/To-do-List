<?php
// Includes the Usuario model file (handles user-related logic)
require_once '../model/Usuario.php';

// Checks if the request is a POST request (form submission)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize and trim the name and email inputs
    $nome = htmlspecialchars(trim($_POST['nome']));              // User name
    $email = strtolower(trim($_POST['email']));                  // Email, converted to lowercase
    $senha = $_POST['senha'];                                    // Password
    $confirma_senha = $_POST['confirma_senha'];                  // Confirm password

    // If passwords don't match, redirect back with error
    if ($senha !== $confirma_senha) {
        header("Location: ../visao/cadastro.php?erro=senhas");   // Redirects with "passwords do not match" error
        exit;
    }

    // Checks if the email is already registered
    if (Usuario::emailExiste($email)) {
        header("Location: ../visao/cadastro.php?erro=email");    // Redirects with "email already exists" error
        exit;
    }

    // Hashes the password for secure storage
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Attempts to register the user using the model
    if (Usuario::cadastrar($nome, $email, $senha_hash)) {
        header("Location: ../index.php?sucesso=1");              // Redirect to homepage with success flag
    } else {
        header("Location: ../visao/cadastro.php?erro=cadastro"); // Redirect back with "registration failed" error
    }
}
?>
