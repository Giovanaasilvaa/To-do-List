<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_unset();
    session_destroy();
    header("Location: index.php"); 
    exit;
} 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sair da Conta</title>
  <link rel="stylesheet" href="public/css/style.css">
</head>
<body class="pagina-sair">
   <button id="theme-toggle" class="theme-toggle">🌙 Modo Escuro</button>

<div class="confirmar">

    <h2>Sair da Conta</h2> <br>
    <p>Você tem certeza que deseja sair da conta?</p><br>

    <form method="POST">
        <button type="submit" style="background-color:rgb(71, 152, 44);">SIM</button>
      </form> 

      <p style="margin-top: 10px;"><a class="registro" href="visao/listar_tarefas.php">Cancelar e voltar</a></p>
  </div>
</body>
<script src="public/js/darkmode.js"></script>
</html>