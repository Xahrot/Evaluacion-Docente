<?php
$host = "localhost";
$usuario = "root";
$contrasena = ""; // XAMPP suele no tener contraseña por defecto
$base_datos = "evaluación_docente"; // Este es el nombre correcto según tu base

$conn = mysqli_connect($host, $usuario, $contrasena, $base_datos);

if (!$conn) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}
?>

