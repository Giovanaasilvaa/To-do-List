<!DOCTYPE html>
<html lang="pt-BR"> <!-- Document is in Brazilian Portuguese -->
<head>
    <meta charset="UTF-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <title>Bem-vindo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="public/css/style.css"/>
</head>

<body>
    <!-- Toggle button for light/dark mode -->
    <button id="theme-toggle" class="theme-toggle">🌙 Modo Escuro</button> <!-- "Dark Mode" -->

    <!-- Background video playing automatically, muted and in a loop -->
    <video autoplay muted loop id="bg-video">
        <!-- Video source file -->
        <source src="/todo-list/assets/fundo.mp4" type="video/mp4">
    </video>

    <!-- Welcome message container with bounce animation from Animate.css -->
    <div class="welcome-container animate__animated animate__bounce">
        <h1>Bem-vindo ao To-Do List!</h1> <!-- "Welcome to the To-Do List!" -->
        <p>Organize suas tarefas de forma simples e prática.</p> <!-- "Organize your tasks in a simple and practical way." -->
        
        <a href="visao/login.php" class="btn-start typewriter">Vamos começar</a> <!-- "Let's get started" -->
    </div>
</body>

<script src="public/js/darkmode.js"></script>
</html>
