<?php
// Start session to check if user is logged in
session_start();
require_once '../banco/conexao.php';

// Redirect to login if user is not authenticated
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

// Get user ID from session
$id_usuario = $_SESSION['id_usuario'];

// Get task ID from URL or set to null if not provided
$id = $_GET['id'] ?? null;

// If no task ID is provided, redirect to task list
if (!$id) {
    header("Location: listar_tarefas.php");
    exit;
}

// Fetch task from database, making sure it belongs to the logged-in user
$sql = "SELECT * FROM tarefas WHERE id = :id AND id_usuario = :id_usuario";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->execute();
$tarefa = $stmt->fetch(PDO::FETCH_ASSOC);

// If task not found, display message and stop execution
if (!$tarefa) {
    echo "<p>Tarefa não encontrada.</p>"; // Task not found
    exit;
}

// Extract task data into variables
$titulo = $tarefa['titulo'];
$descricao = $tarefa['descricao'];
$prazo = $tarefa['prazo'] ?? '';
$status = $tarefa['status'] ?? '';

// If form was submitted (POST request), update the task
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $prazo = $_POST['prazo'] ?? null;
    $status = $_POST['status'] ?? null;

    // Update query to save changes
    $sql = "UPDATE tarefas 
            SET titulo = :titulo, descricao = :descricao, prazo = :prazo, status = :status 
            WHERE id = :id AND id_usuario = :id_usuario";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':prazo', $prazo);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->execute();

    // Redirect back to the task list after saving
    header("Location: listar_tarefas.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Editar Tarefa</title>
  <link rel="stylesheet" href="../public/css/style.css?v=1.0">
</head>

<body>
   <!-- Dark mode toggle -->
   <button id="theme-toggle" class="theme-toggle">🌙 Modo Escuro</button>

   <!-- Main container -->
   <body class="container-editar">
<div class="pagina-add-editar">
      <h2>Editar Tarefa</h2>

      <!-- Task edit form -->
      <form method="POST">

        <!-- Title field -->
        <label for="titulo">Título:</label>
        <div class="input-box">
          <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($titulo) ?>" required>
        </div>

        <!-- Description field -->
        <label for="descricao">Descrição:</label>
        <div class="input-box">
          <textarea id="descricao" name="descricao" rows="4" required><?= htmlspecialchars($descricao) ?></textarea>
        </div>

        <!-- Due date field -->
        <label for="prazo">Prazo:</label>
        <div class="input-box">
          <input type="date" id="prazo" name="prazo" value="<?= htmlspecialchars($prazo) ?>">
        </div>

        <!-- Task status dropdown -->
        <label for="status">Status:</label>
        <div class="input-box">
          <select id="status" name="status">
            <option value="pendente" <?= $status === 'pendente' ? 'selected' : '' ?>>Pendente</option>
            <option value="em andamento" <?= $status === 'em andamento' ? 'selected' : '' ?>>Em andamento</option>
            <option value="concluida" <?= $status === 'concluida' ? 'selected' : '' ?>>Concluída</option>
          </select>
        </div>

        <!-- Submit button -->
        <button type="submit" class="submit-mit">Salvar Alterações</button>
      </form>

      <!-- Back link -->
      <p style="margin-top: 10px;">
        <a class="registro" href="listar_tarefas.php">Voltar para lista</a>
      </p>
    </div>
  </div>
</body>

<!-- Dark mode script -->
<script src="../public/js/darkmode.js"></script>
</html>
