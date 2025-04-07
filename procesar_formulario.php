<?php
// Parámetros de conexión a la base de datos
$host     = "localhost";
$usuario  = "root";   // usuario por defecto en XAMPP
$password = "";       // sin contraseña por defecto
$dbname   = "bd_prueba"; // cambia si tu base de datos tiene otro nombre

// Crear la conexión
$conn = new mysqli($host, $usuario, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("Conexión falló: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre  = $_POST['nombre'];
$correo  = $_POST['correo'];
$mensaje = $_POST['mensaje'];

// Insertar los datos en la tabla "contactos"
$sql = "INSERT INTO contactos (nombre, correo, mensaje) VALUES ('$nombre', '$correo', '$mensaje')";

if ($conn->query($sql) === TRUE) {
  echo "¡Datos guardados exitosamente!<br><br>";
  echo "<a href='mostrar_datos.php'>Ver datos en la base de datos</a>";
} else {
  echo "Error al guardar los datos: " . $conn->error;
}

$conn->close();
?>