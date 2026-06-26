<?php

include("conexion.php");

$sql = "SELECT * FROM producto";

$resultado = $conexion->query($sql);

echo "<table border='1'>";

echo "<tr>
<th>ID</th>
<th>Nombre</th>
<th>Precio</th>
</tr>";

while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){

    echo "<tr>";

    echo "<td>".$fila['id_producto']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo "<td>".$fila['precio']."</td>";

    echo "</tr>";

}

echo "</table>";

?>