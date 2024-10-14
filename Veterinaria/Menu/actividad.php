<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "alfa_veterinaria");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener los registros de actividad
$sql = "SELECT usuario, pagina, fecha FROM actividad ORDER BY fecha DESC";
$resultado = $conexion->query($sql);

echo "<table border='1'>
<tr>
<th>Usuario</th>
<th>Página Visitada</th>
<th>Fecha y Hora</th>
</tr>";

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>
    <td>" . $fila['usuario'] . "</td>
    <td>" . $fila['pagina'] . "</td>
    <td>" . $fila['fecha'] . "</td>
    </tr>";
}

echo "</table>";
$conexion->close();
?>
