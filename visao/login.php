<?php
session_start();
require_once '../banco/conexao.php';

$erro = '';

if (isset($_SESSION['id_usuario'])) {
    header("Location: listar_tarefas.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT id, senha FROM usuarios WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['id_usuario'] = $user['id'];
        header("Location: listar_tarefas.php");
        exit();
    } else {
        $erro = "E-mail ou senha inválidos.";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../public/css/style.css?v=1.0">
</head>
<body class="pagina-login">
    <button id="theme-toggle" class="theme-toggle">🌙 Modo Escuro</button>
     <video autoplay muted loop id="bg-video">
        <source src="/todo-list/assets/fundo.mp4" type="video/mp4">
    </video>

    <div class="container-login">
        <div class="login-box">
            <a href="../index.php" class="back">Voltar</a>
            <h2>Login</h2>
            <?php if ($erro) echo "<p style='color: red;'>$erro</p>"; ?>
            <form method="POST" action="">

            <label for="email">E-mail:</label>
            <div class="input-box">
                <input type="email" name="email" required placeholder="Digite seu e-mail">
            </div>

                <label for="senha">Senha:</label>
                <div class="input-box">
                <div class="senha-container"> <input type="password" name="senha" id="senha" required placeholder="Digite sua senha"> <span class="toggle-senha" onclick="mostrarSenha()"> <img src="../assets/olho_aberto.png" id="icone-senha" alt="Mostrar senha" width="24"></span></div></div> <br>

                <p class="esqueceu">
                    <a class="esqueceu" href="visao/esqueci_senha.php">Esqueceu a senha?</a>
                </p> <br><br>

                <button type="submit">Log in</button>
            </form>

            <p style="margin-top: 10px;">Não tem uma conta?
                <a class="registro" href="cadastro.php">Cadastre-se</a>
            </p>
        </div>
    </div>
</body>
<script src="../public/js/login.js"></script>
</html>
