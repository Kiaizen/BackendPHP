<?php
require_once 'db.php';

class Tarefa {
    private $pdo;

    public function __construct() {
        $this->pdo = getDBConnection();
    }

    public function criar($titulo, $descricao) {
        $stmt = $this->pdo->prepare("INSERT INTO tarefas (titulo, descricao) VALUES (:titulo, :descricao)");
        return $stmt->execute([
            ':titulo' => htmlspecialchars($titulo),
            ':descricao' => htmlspecialchars($descricao)
        ]);
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM tarefas ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $titulo, $descricao) {
        $stmt = $this->pdo->prepare("UPDATE tarefas SET titulo = :titulo, descricao = :descricao WHERE id = :id");
        return $stmt->execute([
            ':id' => $id,
            ':titulo' => htmlspecialchars($titulo),
            ':descricao' => htmlspecialchars($descricao)
        ]);
    }

    public function deletar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tarefas WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
