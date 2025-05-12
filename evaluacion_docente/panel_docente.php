<?php
session_start();
include 'conexion.php';

$id_docente = $_SESSION['id'];

$sql = "SELECT m.nombre AS materia, c.nombre AS curso, AVG(e.nota) AS promedio
        FROM asignaciones a
        JOIN evaluaciones e ON a.id = e.id_asignacion
        JOIN materias m ON a.id_materia = m.id
        JOIN cursos c ON a.id_curso = c.id
        WHERE a.id_docente = $id_docente
        GROUP BY a.id";

$resultado = $conexion->query($sql);

echo "<h2>Mis Evaluaciones</h2>";
while ($fila = $resultado->fetch_assoc()) {
    echo "Materia: {$fila['materia']} - Curso: {$fila['curso']}<br>";
    echo "Promedio: " . round($fila['promedio'], 2) . "<hr>";
}
?>
