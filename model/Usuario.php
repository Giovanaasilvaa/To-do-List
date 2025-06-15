<?php
require_once __DIR__ . '/../banco/conexao.php';

class Usuario {
    public static function emailExiste($email) {
        global $conn;
        $sql = "SELECT id FROM usuarios WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public static function cadastrar($nome, $email, $senhaHash) {
        global $conn;
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaHash);
        return $stmt->execute();
    }

   public static function autenticar($email) {
    global $conn;
    try {
        $sql = "SELECT id, senha FROM usuarios WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Erro ao autenticar usuário: " . $e->getMessage());
        return false;
    }
}


}
?>
