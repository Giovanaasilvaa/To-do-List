<?php
session_start();
require_once '../banco/conexao.php';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

$id_usuario = $_SESSION['id_usuario'];
$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: listar_tarefas.php");
    exit;
}


$sql = "SELECT * FROM tarefas WHERE id = :id AND id_usuario = :id_usuario";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->execute();
$tarefa = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$tarefa) {
    header("Location: listar_tarefas.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "DELETE FROM tarefas WHERE id = :id AND id_usuario = :id_usuario";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->execute();

    header("Location: listar_tarefas.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Deletar Tarefa</title>
    <link rel="stylesheet" href="../public/css/style.css" />
</head>
<body>
     <button id="theme-toggle" class="theme-toggle">🌙 Modo Escuro</button>
    <div class="container">
        <div class="confirmar">
            <h2>Deletar Tarefa</h2>
            <p>Tem certeza que deseja deletar a tarefa <strong><?= htmlspecialchars($tarefa['titulo']) ?></strong>?</p>
            
            <form method="POST">
                <button type="submit" style="background-color: #e74c3c; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                    🗑️ Deletar
                </button>
            </form>

            <p style="margin-top: 10px;">
                <a class="registro" href="listar_tarefas.php">Cancelar e voltar</a>
            </p>
        </div>
    </div>
</body>
<script src="../public/js/darkmode.js"></script>
</html>
