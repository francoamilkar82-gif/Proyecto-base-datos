<?php
include("../conexion.php");

$sql="SELECT * FROM categoria ORDER BY id_categoria";

$resultado=$conexion->query($sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>Categorias</title>

</head>

<body>

<h2>Categorías</h2>

<table border="1">

<tr>

<th>ID</th>

<th>Nombre</th>

<th>Descripción</th>

</tr>

<?php

while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){

echo "<tr>";

echo "<td>".$fila["id_categoria"]."</td>";

echo "<td>".$fila["nombre_categoria"]."</td>";

echo "<td>".$fila["descripcion"]."</td>";

echo "</tr>";

}

?>

</table>

</body>

</html>