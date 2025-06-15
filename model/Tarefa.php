<?php
require_once __DIR__ . '/../banco/conexao.php';

class Tarefa {
    public static function listar($id_usuario) {
        global $conn;
        $sql = "SELECT * FROM tarefas WHERE id_usuario = :id_usuario ORDER BY criado_em DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscarPorId($id, $id_usuario) {
        global $conn;
        $sql = "SELECT * FROM tarefas WHERE id = :id AND id_usuario = :id_usuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function adicionar($titulo, $descricao, $id_usuario) {
        global $conn;
        $sql = "INSERT INTO tarefas (titulo, descricao, id_usuario, data_criacao) VALUES (:titulo, :descricao, :id_usuario, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':id_usuario', $id_usuario);
        return $stmt->execute();
    }

    public static function editar($id, $titulo, $descricao, $id_usuario) {
        global $conn;
        $sql = "UPDATE tarefas SET titulo = :titulo, descricao = :descricao WHERE id = :id AND id_usuario = :id_usuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':id_usuario', $id_usuario);
        return $stmt->execute();
    }

    public static function excluir($id, $id_usuario) {
        global $conn;
        $sql = "DELETE FROM tarefas WHERE id = :id AND id_usuario = :id_usuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':id_usuario', $id_usuario);
        return $stmt->execute();
    }
}
