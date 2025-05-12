<?php
$host = "localhost";
$usuario = "root";
$contraseña = "";
$bd = "evaluacion_docente";

// Crear conexión
$conn = new mysqli($host, $usuario, $contraseña, $bd);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
