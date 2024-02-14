<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "login";

// Establecer la conexión con la base de datos MySQL
$conexion = new mysqli($server, $user, $pass, $db);

// Verificar la conexión
if ($conexion->connect_errno) {
    die("Error de conexión: " . $conexion->connect_errno);
} else {
    echo "Conexión exitosa<br>";
}

// Verificar si se enviaron datos desde el formulario de inicio de sesión
if(isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Consulta SQL para verificar la existencia del usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$contrasena'";
    $resultado = $conexion->query($sql);

    // Verificar si se encontró algún registro
    if ($resultado->num_rows > 0) {
        // Usuario autenticado correctamente
        echo "Bienvenido, $usuario"; // Mensaje de bienvenida
    } else {
        // Usuario no autenticado
        echo "Credenciales incorrectas";
    }
} else {
    // Mensaje de error si no se enviaron datos desde el formulario de inicio de sesión
    echo "Por favor, complete todos los campos del formulario de inicio de sesión.";
}

// Cerrar la conexión
$conexion->close();
?>