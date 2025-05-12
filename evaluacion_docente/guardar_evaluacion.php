<?php
session_start();
include 'conexion.php';

$id_alumno = $_SESSION['id'];
$id_asignacion = $_POST['id_asignacion'];
$nota = $_POST['nota'];
$comentario = $_POST['comentario'];
$fecha = date('Y-m-d');

$sql = "INSERT INTO evaluaciones (id_alumno, id_asignacion, nota, comentario, fecha)
        VALUES ($id_alumno, $id_asignacion, $nota, '$comentario', '$fecha')";

if ($conexion->query($sql)) {
    echo "Evaluación guardada correctamente. <a href='panel_alumno.php'>Volver</a>";
} else {
    echo "Error: " . $conexion->error;
}
?>

