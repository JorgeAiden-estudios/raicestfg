<?php
include 'config.php';
include '../includes/dbconfig.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "No autenticado"]);
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $fecha = $_GET['fecha'] ?? null;
    if ($fecha) {
        $sql = "SELECT * FROM faltas WHERE alumno_id = ? AND fecha = ? ORDER BY hora";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $fecha]);
    } else {
        $sql = "SELECT * FROM faltas WHERE alumno_id = ? ORDER BY fecha, hora";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id]);
    }
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $fecha = $data['fecha'];
    $hora = $data['hora'];
    $motivo = $data['motivo'];

    $sql = "INSERT INTO faltas (alumno_id, fecha, hora, motivo) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $fecha, $hora, $motivo]);
    echo json_encode(["message" => "Falta creada con éxito"]);
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];
    $fecha = $data['fecha'];
    $hora = $data['hora'];
    $motivo = $data['motivo'];

    $sql = "UPDATE faltas SET fecha = ?, hora = ?, motivo = ? WHERE id = ? AND alumno_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$fecha, $hora, $motivo, $id, $user_id]);
    echo json_encode(["message" => "Falta actualizada con éxito"]);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];

    $sql = "DELETE FROM faltas WHERE id = ? AND alumno_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id, $user_id]);
    echo json_encode(["message" => "Falta eliminada"]);
}

//Done 21 Ene 2025
?>
