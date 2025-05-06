<?php
include("db.php");

$docente_id = $_POST["docente_id"];
$calificacion = $_POST["calificacion"];
$comentario = $_POST["comentario"];

$conn->query("INSERT INTO evaluaciones (docente_id, calificacion, comentario) VALUES ($docente_id, $calificacion, '$comentario')");

echo "<p>¡Evaluación guardada correctamente!</p>";
echo "<a href='index.php'>Volver al inicio</a>";
?>