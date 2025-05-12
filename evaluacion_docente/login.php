<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "evaluacion_docente";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si los campos 'email' y 'password' están presentes
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Preparar la consulta para evitar inyección SQL
        // Asegúrate de que 'email' y 'password' sean las columnas correctas en tu tabla
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password); // 'ss' indica que ambos son cadenas (string)
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener el resultado
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // Si se encontró el usuario
            echo "¡Bienvenido!";
            // Aquí puedes redirigir a otra página si el login es exitoso
            // header('Location: dashboard.php');
        } else {
            // Si no se encontró el usuario
            echo "Credenciales incorrectas.";
        }
        
        // Cerrar la declaración y la conexión
        $stmt->close();
    } else {
        echo "Por favor, ingrese un correo y una contraseña.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h2>Formulario de Login</h2>

    <form action="login.php" method="POST">
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" required>
        <br><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br><br>
        
        <button type="submit">Iniciar sesión</button>
    </form>

</body>
</html>

