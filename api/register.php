<?php
if(!isset($pdo)){
include '../includes/dbconfig.php';
}

$data = json_decode(file_get_contents("php://input"), true);
$nombre = $data['nombre'];
$apellido = $data['apellido'];
$DNI = $data['DNI'];
$userType = $data['userType'];
$password = password_hash($data['password'], PASSWORD_DEFAULT);


$message = null;
$error = null;

if($userType == "Profesor"){
    $sql = "SELECT * FROM profesores WHERE DNI = ?";
    $stmt = $pdo->prepare($sql);
    try {
        $stmt->execute([$DNI]);
        $validDNI = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = "Error al ejecutar SELECT";
    }
    if(!empty($validDNI)){
        $error = "DNI ya registrado.";
    }
    else{
        $sql = "INSERT INTO profesores (nombre, apellido, DNI, password) VALUES (?, ?, ?, ?)";
    }
}
else if($userType == "Alumno"){
    
    $sql = "SELECT * FROM alumnos WHERE DNI = ?";
    $stmt = $pdo->prepare($sql);
    try {
        $stmt->execute([$DNI]);
        $validDNI = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      
        $error = "Error al ejecutar SELECT";
    }
    if(!empty($validDNI)){
        $error = "DNI ya registrado.";
    }
    else{
        $sql = "INSERT INTO alumnos (nombre, apellido, DNI, password) VALUES (?, ?, ?, ?)";
    }
    
}
else {
    $error = "Error al crear la SQL (Ni alumno ni profesor)";

}

$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([$nombre, $apellido, $DNI, $password]);

    $message = "Usuario creado con éxito";
    if(!empty($error))
        echo json_encode(["error" => "$error"]);
    else
        echo json_encode(["message" => "$message"]);
} catch (Exception $e) {
    if(!empty($error))
        echo json_encode(["error" => "$error"]);
    else
        echo json_encode(["error" => "Error al registrar el usuario: " . $e->getMessage()]);

}
?>
