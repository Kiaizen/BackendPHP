<?php
header("Access-Control-Allow-Origin: https://portfolioharao.netlify.app");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}


require_once 'Tarefa.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? 0;

if ($id <= 0) {
    http_response_code(400);
    echo json_encode(['erro' => 'ID inválido']);
    exit;
}

$tarefa = new Tarefa();
$tarefa->deletar($id);
echo json_encode(['sucesso' => true]);
