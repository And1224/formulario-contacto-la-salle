<?php
$host     = "localhost";
$usuario  = "usuarioweb";      // Cambia si usaste otro
$password = "contrasena123";   // Cambia si usaste otra
$dbname   = "bd_prueba";
$asunto = $_POST['asunto'] ?? '';

$conn = new mysqli($host, $usuario, $password, $dbname);
if ($conn->connect_error) {
  die("Conexión falló: " . $conn->connect_error);
}

$nombre  = $_POST['nombre'] ?? '';
$correo  = $_POST['correo'] ?? '';
$mensaje = $_POST['mensaje'] ?? '';

if (empty($nombre) || empty($correo) || empty($mensaje)) {
  die("Todos los campos son obligatorios.");
}

$sql = "INSERT INTO contactos (nombre, correo, asunto, mensaje) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nombre, $correo, $asunto, $mensaje);

if ($stmt->execute()) {
  echo "¡Datos guardados exitosamente!<br><br>";
  echo "<a href='mostrar_datos.php'>Ver datos en la base de datos</a>";
} else {
  echo "Error al guardar los datos: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
