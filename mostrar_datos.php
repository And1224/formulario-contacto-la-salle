<?php
$host     = "localhost";
$usuario  = "usuarioweb";
$password = "contrasena123";
$dbname   = "bd_prueba";

$conn = new mysqli($host, $usuario, $password, $dbname);
if ($conn->connect_error) {
  die("Conexión falló: " . $conn->connect_error);
}

$sql = "SELECT id, nombre, correo, mensaje FROM contactos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mensajes recibidos</title>
  <link rel="stylesheet" href="estilos.css">
  <style>
    table {
      width: 90%;
      margin: 50px auto;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    th, td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #eee;
    }

    th {
      background-color: #0d6efd;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    h1 {
      text-align: center;
      color: #333;
      margin-top: 40px;
    }
  </style>
</head>
<body>
  <h1>📋 Mensajes recibidos</h1>

  <?php
  if ($resultado->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Mensaje</th></tr>";
    while ($fila = $resultado->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . htmlspecialchars($fila['id']) . "</td>";
      echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
      echo "<td>" . htmlspecialchars($fila['correo']) . "</td>";
      echo "<td>" . htmlspecialchars($fila['mensaje']) . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "<p style='text-align: center;'>No hay datos registrados aún.</p>";
  }

  $conn->close();
  ?>
</body>
</html>
