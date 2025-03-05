<?php
$host = '127.0.0.1';
$db = 'RAICES_TFG';
$user = 'tfg_DWES_jb';
$pass = 'abc123.';

try {
	$pdo = new PDO("mysql:host=$host;port=3306;dbname=$db;charset=utf8", $user, $pass);
	$okay = $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die("No se pudo conectar a la base de datos: " . $e->getMessage());
}

?>