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
    $sql = "SELECT p.nombre, p.apellido, p.DNI 
            FROM profesores p
            JOIN alumnos_profesores ap ON p.id = ap.id_profesor
            WHERE ap.id_alumno = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $id_profesor = $data['id_profesor'];
    $centro = $data['centro'];

    $sql = "INSERT INTO alumnos_profesores (id_alumno, id_profesor, centro) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $id_profesor, $centro]);
    echo json_encode(["message" => "Profesor asignado con éxito"]);
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);
    $id_profesor = $data['id_profesor'];
    $centro = $data['centro'];

    $sql = "UPDATE alumnos_profesores SET centro = ? WHERE id_alumno = ? AND id_profesor = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$centro, $user_id, $id_profesor]);
    echo json_encode(["message" => "Relación actualizada con éxito"]);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);
    $id_profesor = $data['id_profesor'];

    $sql = "DELETE FROM alumnos_profesores WHERE id_alumno = ? AND id_profesor = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $id_profesor]);
    echo json_encode(["message" => "Relación eliminada con éxito"]);
}
?>