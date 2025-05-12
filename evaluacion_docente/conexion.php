<?php
$conexion = new mysqli("localhost", "root", "", "evaluacion_docente");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
