<?php
session_start();

// Verificar si el usuario está logueado y es directivo
if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'directivo') {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Directivo</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION['nombre']; ?> (Directivo)</h2>

    <ul>
        <li><a href="registrar_profesor.php">Registrar Profesor</a></li>
        <li><a href="registrar_alumno.php">Registrar Alumno</a></li>
        <li><a href="evaluar_profesor.php">Evaluar Profesor</a></li>
        <li><a href="ver_evaluaciones.php">Ver Calificaciones</a></li>
        <li><a href="../logout.php">Cerrar sesión</a></li>
    </ul>
</body>
</html>
