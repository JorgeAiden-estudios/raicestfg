<?php

session_start();
if(!isset($pdo)){
    include '../includes/dbconfig.php';
}

// SIN ARREGLAR
//Configuración de errores
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/errors.log');


$data = json_decode(file_get_contents("php://input"), true);

if (!isset($_COOKIE['user_id'])) {
    echo json_encode(["error" => "No autenticado"]);
    exit;
}

$user_id = $_COOKIE['user_id'];

//SIN ARREGLAR
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    error_log("[GET] DATOS RECIBIDOS: " . json_encode($data));

    $sql = "SELECT * FROM asignaturas";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([]);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}
//ARREGLANDO (USO POST PARA RECOGER DE LA TABLA prof_asignaturas)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    error_log("[POST] DATOS RECIBIDOS: " . json_encode($data));


    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id_profesor'];

    $sql = 'SELECT * FROM profesores_asignaturas WHERE id_profesor = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $asignaturas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($asignaturas);
}

//SIN ARREGLAR (USO PUT PARA APUNTARSE/QUITARSE DE UNA ASIGNATURA)

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

    error_log("[PUT] DATOS RECIBIDOS: " . json_encode($data));

    $error;
    $mensaje;

    $data = json_decode(file_get_contents("php://input"), true);
    $id_profesor = $data['id_profesor'];
    $id_asignatura = $data['id_asignatura'];

    $sql = 'SELECT * FROM profesores_asignaturas WHERE id_profesor = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_profesor]);
    $asignaturas_apuntado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if(!empty($asignaturas_apuntado)){
        // Hay asignaturas con ese profesor
        // Aquí hay que ver si la asig ya está en la tabla o no y asignar o borrar en función.
        $flag = false;
        foreach ($asignaturas_apuntado as $key => $asignatura_ap) {
            error_log(json_encode($key) . " => " . json_encode($asignatura_ap));
            if($id_asignatura == $asignatura_ap["id_asignatura"])
            {
                //La asignatura está en la tabla asignaturas así que nada
                error_log("La asignatura ya está asignada a este profesor");
                $mensaje = "La asignatura ya está asignada.";
                $flag = true;
                //Aquí habría que borrar, upgradear o algo
            }
        }
        if(!($flag)) {
            error_log("La asignatura no está en la tabla, introduciendo");
            $mensaje = "Apuntado con éxito.";
            $sql = "INSERT INTO profesores_asignaturas (id_asignatura, id_profesor) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id_asignatura, $id_profesor]);
            $mensaje = "Apuntado con éxito.";
        }
    }
    else {
        // El profesor no tiene NINGUNA asignatura en la tabla relacional
        // Quizá un refactor aquí estaría bien?? Da error si no tiene ninguna
        $sql = "INSERT INTO profesores_asignaturas (id_asignatura, id_profesor) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_asignatura, $id_profesor]);
        $mensaje = "Apuntado con éxito.";
    }

    echo json_encode(["message" => $mensaje]);
}

//N/A DELETE NI CREATE PORQUE LO HACE ADMINISTRADOR

?>
