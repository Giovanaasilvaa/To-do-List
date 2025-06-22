<?php
require_once __DIR__ . '/../banco/conexao.php'; // Include database connection

class Usuario {

    // Check if an email already exists in the users table
    public static function emailExiste($email) {
        global $conn;
        $sql = "SELECT id FROM usuarios WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        // Returns true if at least one record with this email exists
        return $stmt->rowCount() > 0;
    }

    // Register a new user with name, email, and hashed password
    public static function cadastrar($nome, $email, $senhaHash) {
        global $conn;
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaHash);
        // Executes the statement and returns true if successful
        return $stmt->execute();
    }

    // Authenticate a user by fetching their id and password hash by email
    public static function autenticar($email) {
        global $conn;
        try {
            $sql = "SELECT id, senha FROM usuarios WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            // Returns associative array with user's id and hashed password or false if not found
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log error message and return false in case of exception
            error_log("Error authenticating user: " . $e->getMessage());
            return false;
        }
    }
}
?>

