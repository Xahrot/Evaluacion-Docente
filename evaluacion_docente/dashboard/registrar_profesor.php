<?php
session_start();
include("../includes/db.php");

// Verificar que sea un directivo
if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'directivo') {
    header("Location: ../index.php");
    exit();
}

// Si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $asignatura = $_POST['asignatura'];

    // Insertar en la base de datos
    $sql = "INSERT INTO docentes (nombre, asignatura) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nombre, $asignatura);

    if ($stmt->execute()) {
        $mensaje = "¡Profesor registrado correctamente!";
    } else {
        $mensaje = "Error al registrar: " . $conn->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Profesor</title>
</head>
<body>
    <h2>Registrar nuevo profesor</h2>

    <?php if (isset($mensaje)) echo "<p><strong>$mensaje</strong></p>"; ?>

    <form method="POST" action="">
        <label>Nombre del profesor:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Asignatura:</label><br>
        <input type="text" name="asignatura" required><br><br>

        <input type="submit" value="Registrar">
    </form>

    <br>
    <a href="directivo.php">← Volver al panel</a>
</body>
</html>
