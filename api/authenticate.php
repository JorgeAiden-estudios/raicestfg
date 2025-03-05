<?php
session_start();
include '../includes/dbconfig.php';

$data = json_decode(file_get_contents("php://input"), true);
$dni = $data['dni'];
$password = $data['password'];
$role = $data['role']; 

$sql = "SELECT * FROM users WHERE dni = ? AND rol = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$dni, $role]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['rol'] = $user['rol'];
    setcookie("user_role", $user['rol'], time() + 86400, "/"); // Cookie válida por 1 día
    echo json_encode(["message" => "Login exitoso", "rol" => $user['rol']]);
} else {
    echo json_encode(["error" => "DNI, contraseña o rol incorrectos"]);
}
?>