<?php
// Start session to access user data
session_start();

// Include the Task model (assumes you have a Tarefa class)
require_once '../model/Tarefa.php';

// Redirect to homepage if user is not logged in
if (!isset($_SESSION['id_usuario'])) {
    header('Location: ../index.php');
    exit();
}

// Get the current user's ID from the session
$id_usuario = $_SESSION['id_usuario'];

// Retrieve all tasks for the logged-in user
$tarefas = Tarefa::listar($id_usuario);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Minhas Tarefas</title>
    <!-- Link to CSS stylesheet -->
    <link rel="stylesheet" href="../public/css/style.css" />
</head>

<body class="container-lista">

    <!-- Dark mode toggle button -->
    <button id="theme-toggle" class="theme-toggle">🌙 Modo Escuro</button>

    <div class="pagina-lista-tarefas">
        <!-- Logout link -->
        <a href="../logout.php" class="back">Sair da Conta</a>
        
        <h1>Minhas Tarefas</h1>

        <!-- Link to add a new task -->
        <a href="adicionar_tarefa.php" class="btn btn-primario">Adicionar nova tarefa</a>

        <!-- Unordered list to display tasks -->
        <ul>
            <?php foreach ($tarefas as $tarefa): ?>
                <li>
                    <div class="tarefa">

                        <div class="tarefa-conteudo">

                            <div class="titulo-prazo">
                                <!-- Task title -->
                                <strong>Tarefa: <?= htmlspecialchars($tarefa['titulo']) ?></strong>

                                <!-- Task deadline formatted as DD/MM/YYYY -->
                                <span class="hora">
                                    <strong>Prazo: </strong> 
                                    <?= htmlspecialchars(date('d/m/Y', strtotime($tarefa['prazo']))) ?>
                                </span>
                            </div>

                            <!-- Task description -->
                            <p class="descricao"><?= htmlspecialchars($tarefa['descricao']) ?></p>

                            <!-- Task status -->
                            <p>
                                <strong class="status">Status:</strong> 
                                <?= htmlspecialchars($tarefa['status']) ?>
                            </p>
                        </div>

                        <!-- Action links for editing and deleting -->
                        <div class="tarefa-acoes">
                            <a href="editar_tarefa.php?id=<?= $tarefa['id'] ?>">Editar</a>
                            <a href="excluir.php?id=<?= $tarefa['id'] ?>">Excluir</a>
                        </div>

                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

<!-- JavaScript for dark mode functionality -->
<script src="../public/js/darkmode.js"></script>
</html>
