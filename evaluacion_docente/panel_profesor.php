

<?php
session_start();
if ($_SESSION["rol"] != "profesor") {
    header("Location: login.php");
    exit;
}
echo "Bienvenido, PROFESOR: " . $_SESSION["nombre_usuario"];
?>

<?php
session_start();
if ($_SESSION["rol"] != "profesor") {
    header("Location: login.php");
    exit;
}

include("conexion.php");

$profesor_id = $_SESSION["usuario_id"]; // ID del usuario, no del profesor

// 🟡 Si el profesor tiene un ID en la tabla profesores, buscarlo:
$buscar_profesor = mysqli_query($conn, "SELECT id, nombre, apellido FROM profesores WHERE email = '{$_SESSION['nombre_usuario']}' LIMIT 1");
if (mysqli_num_rows($buscar_profesor) > 0) {
    $datos_profesor = mysqli_fetch_assoc($buscar_profesor);
    $id_profesor = $datos_profesor["id"];
} else {
    die("No se encontró información del profesor.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <
