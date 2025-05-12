

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Panel Directivo</title>
</head>
<body>

<h2>Bienvenido, DIRECTIVO: <?php echo $_SESSION["nombre_usuario"]; ?></h2>

<?php if (isset($mensaje)) echo "<p style='color:green;'>$mensaje</p>"; ?>

<!-- 📋 FORMULARIO DE CALIFICACIÓN -->
<h3>Calificar Profesores</h3>
<form method="POST" action="">
    <label>Profesor:</label><br>
    <select name="profesor_id" required>
        <option value="">-- Seleccionar --</option>
        <?php
        mysqli_data_seek($profesores, 0); // reiniciar puntero
        while ($p = mysqli_fetch_assoc($profesores)) { ?>
            <option value="<?php echo $p['id']; ?>">
                <?php echo $p['nombre'] . " " . $p['apellido']; ?>
            </option>
        <?php } ?>
    </select><br><br>

    <label>Calificación (1-10):</label><br>
    <input type="number" name="calificacion" min="1" max="10" required><br><br>

    <label>Observación:</label><br>
    <textarea name="observacion" rows="4" cols="40" required></textarea><br><br>

    <button type="submit">Guardar Calificación</button>
</form>

<hr>

<!-- 📊 CALIFICACIONES DE ESTUDIANTES -->
<h3>Evaluaciones de Estudiantes</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>Profesor</th>
        <th>Estudiante ID</th>
        <th>Calificación</th>
        <th>Observación</th>
        <th>Acción</th>
    </tr>
    <?php
    $evaluaciones = mysqli_query($conn, "
        SELECT e.id, p.nombre, p.apellido, e.estudiante_id, e.calificacion, e.observacion
        FROM evaluaciones e
        INNER JOIN profesores p ON e.profesor_id = p.id
        ORDER BY p.nombre
    ");
    while ($fila = mysqli_fetch_assoc($evaluaciones)) {
        echo "<tr>";
        echo "<td>{$fila['nombre']} {$fila['apellido']}</td>";
        echo "<td>{$fila['estudiante_id']}</td>";
        echo "<td>{$fila['calificacion']}</td>";
        echo "<td>{$fila['observacion']}</td>";
        echo "<td><a href='?eliminar_eval={$fila['id']}' onclick=\"return confirm('¿Eliminar esta evaluación?');\">Eliminar</a></td>";
        echo "</tr>";
    }
    ?>
</table>

<hr>

<!-- 📊 CALIFICACIONES DEL DIRECTIVO -->
<h3>Mis Calificaciones a Profesores</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>Profesor</th
