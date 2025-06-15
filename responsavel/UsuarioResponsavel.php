<?php
require_once '../model/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = strtolower(trim($_POST['email']));
    $senha = $_POST['senha'];
    $confirma_senha = $_POST['confirma_senha'];

    if ($senha !== $confirma_senha) {
        header("Location: ../visao/cadastro.php?erro=senhas");
        exit;
    }

    if (Usuario::emailExiste($email)) {
        header("Location: ../visao/cadastro.php?erro=email");
        exit;
    }

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    if (Usuario::cadastrar($nome, $email, $senha_hash)) {
        header("Location: ../index.php?sucesso=1");
    } else {
        header("Location: ../visao/cadastro.php?erro=cadastro");
    }
}
?>
