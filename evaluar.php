<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Evaluar Docente</title>
    <script src="script.js"></script>
</head>
<body>
    <h2>Evaluar Docente</h2>
    <form method="post" action="guardar_evaluacion.php" onsubmit="return validarFormulario()">
        Docente:
        <select name="docente_id" required>
            <option value="">Seleccione</option>
            <?php
            $res = $conn->query("SELECT * FROM docentes");
            while ($row = $res->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['nombre']} - {$row['asignatura']}</option>";
            }
            ?>
        </select><br>
        Calificación (1-10): <input type="number" name="calificacion" id="calificacion" min="1" max="10" required><br>
        Comentario: <textarea name="comentario" required></textarea><br>
        <button type="submit">Enviar Evaluación</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>