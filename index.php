<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bem-vindo</title>
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="public/css/style.css"/>
</head>
<body>
     <button id="theme-toggle" class="theme-toggle">🌙 Modo Escuro</button>
    <video autoplay muted loop id="bg-video">
        <source src="/todo-list/assets/fundo.mp4" type="video/mp4">
    </video>

    <div class="welcome-container animate__animated animate__bounce">
        <h1>Bem-vindo ao To-Do List!</h1>
        <p>Organize suas tarefas de forma simples e prática.</p>
        <a href="visao/login.php" class="btn-start typewriter">Vamos começar</a>
    </div>
</body>
<script src="public/js/darkmode.js"></script>
</html>
