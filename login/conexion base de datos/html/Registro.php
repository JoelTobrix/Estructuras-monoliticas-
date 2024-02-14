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

// Verificar si se enviaron datos desde el formulario de registro
if(isset($_POST['usuario_reg']) && isset($_POST['contrasena_reg'])) {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario_reg'];
    $contrasena = $_POST['contrasena_reg'];

    // Consulta SQL para verificar si el usuario ya existe en la base de datos
    $sql_verificar = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $resultado_verificar = $conexion->query($sql_verificar);

    if ($resultado_verificar->num_rows > 0) {
        // El usuario ya existe
        echo "El usuario ya existe";
    } else {
        // El usuario no existe, realizar el registro
        $sql_registro = "INSERT INTO usuarios (usuario, contraseña) VALUES ('$usuario', '$contrasena')";
        if ($conexion->query($sql_registro) === TRUE) {
            echo "Registro exitoso";
        } else {
            echo "Error al registrar: " . $conexion->error;
        }
    }
} else {
    // Mensaje de error si no se enviaron datos desde el formulario
    echo "Por favor, complete todos los campos del formulario de registro.";
}

// Cerrar la conexión
$conexion->close();
?>
