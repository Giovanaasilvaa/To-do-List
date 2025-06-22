<?php
session_start(); // Start the session
require_once '../banco/conexao.php'; // Include database connection

$erro = ''; // Initialize error message variable

// If user is already logged in, redirect to task list
if (isset($_SESSION['id_usuario'])) {
    header("Location: listar_tarefas.php");
    exit();
}

// If form was submitted (method is POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];     // Get the email from POST
    $senha = $_POST['senha'];     // Get the password from POST

    // Prepare SQL to fetch user by email
    $sql = "SELECT id, senha FROM usuarios WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // If user exists and password matches
    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['id_usuario'] = $user['id']; // Set session
        header("Location: listar_tarefas.php"); // Redirect to dashboard
        exit();
    } else {
        $erro = "E-mail ou senha inválidos."; // Error message for invalid login
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS file -->
    <link rel="stylesheet" href="../public/css/style.css?v=1.0">
</head>

<body class="pagina-login">
    <!-- Dark mode toggle button -->
    <button id="theme-toggle" class="theme-toggle">🌙 Modo Escuro</button>

    <!-- Background video -->
    <video autoplay muted loop id="bg-video">
        <source src="/todo-list/assets/fundo.mp4" type="video/mp4">
    </video>

    <!-- Main login container -->
    <div class="container-login">
        <div class="login-box">
            <!-- Back button -->
            <a href="../index.php" class="back">Voltar</a>

            <h2>Login</h2>

            <!-- Display error message if exists -->
            <?php if ($erro) echo "<p style='color: red;'>$erro</p>"; ?>

            <!-- Login form -->
            <form method="POST" action="">

                <!-- Email input -->
                <label for="email">E-mail:</label>
                <div class="input-box">
                    <input type="email" name="email" required placeholder="Digite seu e-mail">
                </div>

                <!-- Password input with show/hide toggle -->
                <label for="senha">Senha:</label>
                <div class="input-box">
                    <div class="senha-container">
                        <input type="password" name="senha" id="senha" required placeholder="Digite sua senha">
                        <span class="toggle-senha" onclick="mostrarSenha()">
                            <img src="../assets/olho_aberto.png" id="icone-senha" alt="Mostrar senha" width="24">
                        </span>
                    </div>
                </div><br>

                <!-- Forgot password link -->
                <p class="esqueceu">
                    <a class="esqueceu" href="visao/esqueci_senha.php">Esqueceu a senha?</a>
                </p><br><br>

                <!-- Submit button -->
                <button type="submit">Log in</button>
            </form>

            <!-- Register link -->
            <p style="margin-top: 10px;">
                Não tem uma conta?
                <a class="registro" href="cadastro.php">Cadastre-se</a>
            </p>
        </div>
    </div>
</body>

<!-- JavaScript for dark mode and password toggle -->
<script src="../public/js/login.js"></script>
<script src="../public/js/darkmode.js"></script>
</html>
