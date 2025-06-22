<?php
// Start the session
session_start();

// Include database connection
require_once '../banco/conexao.php';

// Check if the user is logged in
if (!isset($_SESSION['id_usuario'])) {
    // Redirect to login page if not authenticated
    header("Location: login.php");
    exit;
}

// Get logged-in user ID from session
$id_usuario = $_SESSION['id_usuario'];

// Get task ID from the URL, or null if not set
$id = $_GET['id'] ?? null;

// If no task ID is provided, redirect to task list
if (!$id) {
    header("Location: listar_tarefas.php");
    exit;
}

// Fetch the task that matches the ID and belongs to the user
$sql = "SELECT * FROM tarefas WHERE id = :id AND id_usuario = :id_usuario";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->execute();
$tarefa = $stmt->fetch(PDO::FETCH_ASSOC);

// If task not found, redirect back to list
if (!$tarefa) {
    header("Location: listar_tarefas.php");
    exit;
}

// Handle the delete request (when user confirms deletion)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "DELETE FROM tarefas WHERE id = :id AND id_usuario = :id_usuario";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->execute();

    // After deletion, redirect back to task list
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
    <link rel="stylesheet" href="../public/css/style.css?v=1.0" />
</head>

<body class="pagina-excluir">

    <!-- Button to toggle dark mode -->
    <button id="theme-toggle" class="theme-toggle">🌙 Modo Escuro</button>

    <div class="confirmar">
        <h2>Deletar Tarefa</h2>

        <!-- Display confirmation message with task title -->
        <p>
            Tem certeza que deseja deletar a tarefa 
            <strong><?= htmlspecialchars($tarefa['titulo']) ?></strong>?
        </p>
        
        <!-- Form to confirm deletion -->
        <form method="POST">
            <button 
                type="submit" 
                style="background-color: #e74c3c; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                🗑️ Deletar
            </button>
        </form>

        <!-- Option to cancel and go back -->
        <p style="margin-top: 10px;">
            <a class="registro" href="listar_tarefas.php">Cancelar e voltar</a>
        </p>
    </div>

    <!-- Missing closing tag fixed -->
</body>

<!-- JavaScript for dark mode functionality -->
<script src="../public/js/darkmode.js"></script>
</html>
