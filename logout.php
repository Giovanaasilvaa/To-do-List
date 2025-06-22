<?php
session_start(); // Starts the session to access session variables

// Checks if the request method is POST (form submitted)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_unset();  // Clears all session variables
    session_destroy(); // Destroys the current session
    header("Location: index.php"); // Redirects to the homepage (login or landing page)
    exit; // Ensures the script stops here
} 
?>

<!DOCTYPE html>
<html lang="pt-BR"> <!-- Document language is Brazilian Portuguese -->
<head>
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Sair da Conta</title> <!-- Page title (Portuguese: "Log out of account") -->
  <link rel="stylesheet" href="public/css/style.css"> 
</head>

<body class="pagina-sair"> <!-- Applies styling for logout page -->
  <!-- Dark mode toggle button -->
  <button id="theme-toggle" class="theme-toggle">🌙 Modo Escuro</button> <!-- "Dark Mode" -->

  <div class="confirmar"> <!-- Confirmation box container -->

    <h2>Sair da Conta</h2> <br> <!-- "Log Out of Account" -->
    <p>Você tem certeza que deseja sair da conta?</p><br> <!-- "Are you sure you want to log out?" -->

    <!-- Form that submits a POST request to this page -->
    <form method="POST">
        <!-- Confirm button styled with green background -->
        <button type="submit" style="background-color:rgb(71, 152, 44);">SIM</button> <!-- "YES" -->
    </form> 

    <!-- Cancel and return link -->
    <p style="margin-top: 10px;">
      <a class="registro" href="visao/listar_tarefas.php">Cancelar e voltar</a> <!-- "Cancel and go back" -->
    </p>

  </div>
</body>

<script src="public/js/darkmode.js"></script>
</html>
