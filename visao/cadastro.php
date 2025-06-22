<?php
// Initializes the error message variable
$erro = '';

// Checks if there's an error message in the URL query parameter
if (isset($_GET['erro'])) {
    switch ($_GET['erro']) {
        case 'senhas': // Passwords do not match
            $erro = "As senhas não coincidem.";
            break;
        case 'email': // Email already registered
            $erro = "Este e-mail já está cadastrado.";
            break;
        case 'cadastro': // Generic registration error
            $erro = "Erro ao cadastrar. Tente novamente.";
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cadastro de Usuário</title>
  <link rel="stylesheet" href="../public/css/style.css"/>
</head>
<body>

   <!-- Dark mode toggle button -->
   <button id="theme-toggle" class="theme-toggle">🌙 Modo Escuro</button>

   <!-- Background video -->
   <video autoplay muted loop id="bg-video">
       <source src="/todo-list/assets/fundo.mp4" type="video/mp4">
   </video>

   <!-- Registration form container -->
   <div class="container-registro">
     <div class="login-box-cadastro">
       <h2>Cadastro de Usuário</h2>

       <!-- Display error message if exists -->
       <?php if ($erro) echo "<p style='color: red;'>$erro</p>"; ?>

       <!-- Registration form with validation -->
       <form method="POST" action="../responsavel/UsuarioResponsavel.php" onsubmit="return validarConfirmacao()">

         <!-- Name field -->
         <label for="nome">Nome:</label>
         <div class="input-box">
           <input type="text" name="nome" required placeholder="Digite seu nome">
         </div>

         <!-- Email field -->
         <label for="email">E-mail:</label>
         <div class="input-box">
           <input type="email" name="email" required placeholder="Digite seu e-mail">
         </div>

         <!-- Password field -->
         <label for="senha">Senha:</label>
         <div class="input-box">
           <input type="password" name="senha" id="senha" required placeholder="Crie uma senha" oninput="validarSenha()">
         </div>

         <!-- Password validation rules -->
         <ul class="senha-regras" id="senha-regras">
           <li id="regra1">🔴 No mínimo 8 caracteres</li>
           <li id="regra2">🔴 Pelo menos uma letra maiúscula</li>
           <li id="regra3">🔴 Pelo menos uma letra minúscula</li>
           <li id="regra4">🔴 Pelo menos um número</li>
           <li id="regra5">🔴 Um caractere especial (!@#...)</li>
         </ul>

         <!-- Password confirmation -->
         <label for="confirma_senha">Confirmar Senha:</label>
         <div class="input-box">
           <input type="password" name="confirma_senha" id="confirma_senha" required placeholder="Repita a senha">
         </div>
         <!-- Feedback for password confirmation -->
         <small id="feedback-confirma" style="color: red;"></small>

         <!-- Submit button -->
         <button type="submit">Cadastrar</button>
       </form>

       <!-- Link to login page -->
       <p style="margin-top: 10px;">Já tem uma conta? <a class="registro" href="login.php">Faça login</a></p>
     </div>
   </div>

</body>

<!-- JavaScript for registration validation -->
<script src="../public/js/registro.js"></script>
<!-- JavaScript for dark mode toggle -->
<script src="../public/js/darkmode.js"></script>
</html>
