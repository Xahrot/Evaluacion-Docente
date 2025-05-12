<?php
session_start();
include 'conexion.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$clave = $_POST['contraseña'];

$sql = "SELECT * FROM usuarios WHERE nombre='$nombre' and correo='$correo' AND contraseña='$clave'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
    $_SESSION['id'] = $usuario['id'];
    $_SESSION['tipo'] = $usuario['tipo'];
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['id_curso'] = $usuario['id_curso'];

    if ($usuario['tipo'] == 'directivo') {
        header("Location: panel_directivo.php");
    } elseif ($usuario['tipo'] == 'docente') {
        header("Location: panel_docente.php");
    } else {
        header("Location: panel_alumno.php");
    }
} else {
    echo "Datos incorrectos";
}
?>
<?php
session_start();
echo "Bienvenido, " . $_SESSION['nombre'];
?>

