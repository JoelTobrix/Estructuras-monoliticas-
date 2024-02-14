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




// Cerrar la conexión
$conexion->close();
?>

