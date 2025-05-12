<<?php
session_start();
include 'conexion.php';

$id_curso = $_SESSION['id_curso'];
$id_alumno = $_SESSION['id'];

$sql = "SELECT a.id AS id_asignacion, d.nombre AS docente, m.nombre AS materia
        FROM asignaciones a
        JOIN docentes d ON a.id_docente = d.id
        JOIN materias m ON a.id_materia = m.id
        WHERE a.id_curso = $id_curso";

$resultado = $conexion->query($sql);

echo "<h2>Bienvenido, " . $_SESSION['nombre'] . "</h2>";
echo "<h3>Calificá a tus docentes:</h3>";

while ($fila = $resultado->fetch_assoc()) {
    echo "<form method='POST' action='guardar_evaluacion.php'>
            <strong>{$fila['docente']} - {$fila['materia']}</strong><br>
            Nota (1-5): <input type='number' name='nota' min='1' max='5' required><br>
            Comentario: <input type='text' name='comentario'><br>
            <input type='hidden' name='id_asignacion' value='{$fila['id_asignacion']}'>
            <button type='submit'>Enviar</button>
          </form><hr>";
}
?>
