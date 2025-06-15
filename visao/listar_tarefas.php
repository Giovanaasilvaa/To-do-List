<?php
session_start();
require_once '../model/Tarefa.php';

if (!isset($_SESSION['id_usuario'])) {
    header('Location: ../index.php');
    exit();
}

$id_usuario = $_SESSION['id_usuario'];
$tarefas = Tarefa::listar($id_usuario);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Minhas Tarefas</title>
    <link rel="stylesheet" href="../public/css/style.css" />
</head>
<body class="container-lista">
         <button id="theme-toggle" class="theme-toggle">🌙 Modo Escuro</button>
    <div class="pagina-lista-tarefas">
        <a href="../logout.php" class="back">Sair da Conta</a>
        
        <h1>Minhas Tarefas</h1>
        <a href="adicionar_tarefa.php" class="btn btn-primario">Adicionar nova tarefa</a>
    <ul>
        <?php foreach ($tarefas as $tarefa): ?>
    <li>
        <div class="tarefa">
       <div class="tarefa-conteudo">
        
       <div class="titulo-prazo">
        <strong>Tarefa: <?= htmlspecialchars($tarefa['titulo']) ?></strong>
        <span class="hora"><strong>Prazo: </strong> <?= htmlspecialchars(date('d/m/Y', strtotime($tarefa['prazo']))) ?></span>
       </div>
       
       <p class="descricao"><?= htmlspecialchars($tarefa['descricao']) ?></p>

       
       <p><strong class="status">Status:</strong> <?= htmlspecialchars($tarefa['status']) ?></p>
       </div>
       

        <div class="tarefa-acoes">
            <a href="editar_tarefa.php?id=<?= $tarefa['id'] ?>">Editar</a>
            <a href="excluir_tarefa.php?id=<?= $tarefa['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
        </div>
        </div>
    </li>
        <?php endforeach; ?>
    </ul>
</body>
<script src="../public/js/darkmode.js"></script>
</html>
