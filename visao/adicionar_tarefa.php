<?php
// Starts session to manage user login
session_start();

// Connects to the database
require_once '../banco/conexao.php';

// Redirects to login page if user is not authenticated
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../visao/login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario']; // Gets logged-in user's ID

// Checks if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gets and trims form input values
    $titulo = trim($_POST['titulo']);
    $descricao = trim($_POST['descricao']);
    $prazo = $_POST['prazo'] ?? null; // Optional deadline
    $status = $_POST['status'] ?? 'pendente'; // Default status is "pending"

    // Validates required fields
    if ($titulo === '' || $descricao === '') {
        $erro = "Título e descrição são obrigatórios.";
        // Title and description are required.
    } else {
        // Prepares and executes SQL query to insert task
        $sql = "INSERT INTO tarefas (id_usuario, titulo, descricao, prazo, status) 
                VALUES (:id_usuario, :titulo, :descricao, :prazo, :status)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':prazo', $prazo);
        $stmt->bindParam(':status', $status);
        $stmt->execute();

        // Redirects to task list page after insertion
        header("Location: listar_tarefas.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Task</title>
    <link rel="stylesheet" href="../public/css/style.css?v=1.0">
</head>
<body class="container-add">

    <!-- Button to toggle dark mode -->
    <button id="theme-toggle" class="theme-toggle">🌙 DarkMode</button>

    <div class="pagina-add-tarefas">
        <h2>Add New Task</h2>

        <!-- Displays validation error if any -->
        <?php if (!empty($erro)): ?>
            <p style="color:red;"><?= htmlspecialchars($erro) ?></p>
        <?php endif; ?>

        <!-- Task creation form -->
        <form method="POST">

            <!-- Task title -->
            <label for="titulo">Tittle:</label>
            <div class="input-box">
                <input type="text" id="titulo" name="titulo" required 
                    value="<?= isset($titulo) ? htmlspecialchars($titulo) : '' ?>">
            </div>

            <!-- Task description -->
            <label for="descricao">Description:</label>
            <div class="input-box">
                <textarea id="descricao" name="descricao" rows="4" required>
                    <?= isset($descricao) ? htmlspecialchars($descricao) : '' ?>
                </textarea>
            </div>

            <!-- Task deadline -->
            <label for="prazo">Term:</label>
            <div class="input-box">
                <input type="date" id="prazo" name="prazo" 
                    value="<?= isset($prazo) ? htmlspecialchars($prazo) : '' ?>">
            </div>

            <!-- Task status -->
            <label for="status">Status:</label>
            <div class="input-box">
                <select id="status" name="status">
                    <option value="pendente" <?= (isset($status) && $status === 'pendente') ? 'selected' : '' ?>>Pending</option>
                    <option value="em andamento" <?= (isset($status) && $status === 'em andamento') ? 'selected' : '' ?>>In progress</option>
                    <option value="concluida" <?= (isset($status) && $status === 'concluida') ? 'selected' : '' ?>>Completed</option>
                </select>
            </div>

            <!-- Submit button -->
            <button type="submit" class="submit-mit">Add Task</button>
        </form>

        <!-- Link to go back to task list -->
        <p style="margin-top: 10px;">
            <a class="registro" href="listar_tarefas.php">Back to list</a>
        </p>
    </div>

</body>
<!-- Script to toggle dark/light mode -->
<script src="../public/js/darkmode.js"></script>
</html>
