

<?php
session_start();
if ($_SESSION["rol"] != "estudiante") {
    header("Location: login.php");
    exit;
}

include("conexion.php");

// Obtener lista de profesores
$profesores = mysqli_query($conn, "SELECT id, nombre, apellido FROM profesores");

// Si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $estudiante_id = $_SESSION["usuario_id"];
    $profesor_id = $_POST["profesor_id"];
    $calificacion = $_POST["calificacion"];
    $observacion = $_POST["observacion"];

    $sql = "INSERT INTO evaluaciones (estudiante_id, profesor_id, calificacion, observacion) 
            VALUES ('$estudiante_id', '$profesor_id', '$calificacion', '$observacion')";

    if (mysqli_query($conn, $sql)) {
        $mensaje = "¡Evaluación enviada correctamente!";
    } else {
        $mensaje = "Error al guardar: " . mysqli_error($conn);
    }
}
?>

<h2>Bienvenido, <?php echo $_SESSION["nombre_usuario"]; ?></h2>

<?php if (isset($mensaje)) echo "<p style='color:green;'>$mensaje</p>"; ?>

<form method="POST" action="">
    <label>Selecciona un profesor:</label><br>
    <select name="profesor_id" required>
        <option value="">-- Seleccionar --</option>
        <?php while ($prof = mysqli_fetch_assoc($profesores)) { ?>
            <option value="<?php echo $prof["id"]; ?>">
                <?php echo $prof["nombre"] . " " . $prof["apellido"]; ?>
            </option>
        <?php } ?>
    </select><br><br>

    <label>Calificación (1-10):</label><br>
    <input type="number" name="calificacion" min="1" max="10" required><br><br>

    <label>Observación:</label><br>
    <textarea name="observacion" rows="4" cols="40" required></textarea><br><br>

    <button type="submit">Enviar evaluación</button>
</form>
