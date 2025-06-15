<?php
session_start();
require_once '../banco/conexao.php';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../visao/login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST['titulo']);
    $descricao = trim($_POST['descricao']);
    $prazo = $_POST['prazo'] ?? null;
    $status = $_POST['status'] ?? 'pendente';

    if ($titulo === '' || $descricao === '') {
        $erro = "Título e descrição são obrigatórios.";
    } else {
        $sql = "INSERT INTO tarefas (id_usuario, titulo, descricao, prazo, status) 
                VALUES (:id_usuario, :titulo, :descricao, :prazo, :status)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':prazo', $prazo);
        $stmt->bindParam(':status', $status);
        $stmt->execute();

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
    <title>Adicionar Tarefa</title>
    <link rel="stylesheet" href="../public/css/style.css?v=1.0">
</head>
<body class="container-add">
     <button id="theme-toggle" class="theme-toggle">🌙 Modo Escuro</button>
<div class="pagina-add-tarefas">
        <h2>Adicionar Nova Tarefa</h2>

        <?php if (!empty($erro)): ?>
            <p style="color:red;"><?= htmlspecialchars($erro) ?></p>
        <?php endif; ?>

        <form method="POST">
            <label for="titulo">Título:</label>
            <div class="input-box">
                <input type="text" id="titulo" name="titulo" required value="<?= isset($titulo) ? htmlspecialchars($titulo) : '' ?>">
            </div>

            <label for="descricao">Descrição:</label>
            <div class="input-box">
                <textarea id="descricao" name="descricao" rows="4" required><?= isset($descricao) ? htmlspecialchars($descricao) : '' ?></textarea>
            </div>

            <label for="prazo">Prazo:</label>
            <div class="input-box">
                <input type="date" id="prazo" name="prazo" value="<?= isset($prazo) ? htmlspecialchars($prazo) : '' ?>">
            </div>

            <label for="status">Status:</label>
            <div class="input-box">
                <select id="status" name="status">
                    <option value="pendente" <?= (isset($status) && $status === 'pendente') ? 'selected' : '' ?>>Pendente</option>
                    <option value="em andamento" <?= (isset($status) && $status === 'em andamento') ? 'selected' : '' ?>>Em andamento</option>
                    <option value="concluida" <?= (isset($status) && $status === 'concluida') ? 'selected' : '' ?>>Concluída</option>
                </select>
            </div>

            <button type="submit" class="submit-mit">Adicionar Tarefa</button>
        </form>

        <p style="margin-top: 10px;">
            <a class="registro" href="listar_tarefas.php">Voltar para lista</a>
        </p>
</div>
</body>
<script src="../public/js/darkmode.js"></script>
</html>
