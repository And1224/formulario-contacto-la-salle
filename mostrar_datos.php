<?php
$host     = "localhost";
$usuario  = "root";
$password = "";
$dbname   = "bd_prueba";

$conn = new mysqli($host, $usuario, $password, $dbname);

if ($conn->connect_error) {
  die("Conexión falló: " . $conn->connect_error);
}

// Consulta SELECT de todos los contactos
$sql = "SELECT id, nombre, correo, mensaje FROM contactos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<h1>Datos de Contacto</h1>";
  echo "<table border='1'>";
  echo "<tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Mensaje</th></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['correo'] . "</td>";
    echo "<td>" . $row['mensaje'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "No hay registros en la tabla de contactos.";
}

$conn->close();
?>