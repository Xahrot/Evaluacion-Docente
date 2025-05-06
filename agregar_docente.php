<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Docente</title>
</head>
<body>
    <h2>Registrar Docente</h2>
    <form method="post">
        Nombre: <input type="text" name="nombre" required><br>
        Asignatura: <input type="text" name="asignatura" required><br>
        <button type="submit">Guardar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $asignatura = $_POST["asignatura"];
    $conn->query("INSERT INTO docentes (nombre, asignatura) VALUES ('$nombre', '$asignatura')");
    echo "<p>Docente registrado.</p>";
}
?>