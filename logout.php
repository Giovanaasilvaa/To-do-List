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
  <title>Log out</title> 
  <link rel="stylesheet" href="public/css/style.css"> 
</head>

<body class="pagina-sair"> 

  <!-- Dark mode toggle button -->
  <button id="theme-toggle" class="theme-toggle">🌙 DarkMode</button> 

  <div class="confirmar"> 

    <h2>Log out</h2> <br> 
    <p>Are you sure you want to log out of your account?</p><br> 

    <!-- Form that submits a POST request to this page -->
    <form method="POST">

        <button type="submit" style="background-color:rgb(71, 152, 44);">YES</button> 
    </form> 

    <!-- Cancel and return link -->
    <p style="margin-top: 10px;">
      <a class="registro" href="visao/listar_tarefas.php">Cancel and return</a> <!-- "Cancel and go back" -->
    </p>

  </div>
</body>

<script src="public/js/darkmode.js"></script>
</html>
