<?php
include("conexion.php");

$sql = "SELECT * FROM vista_ventas";
$stmt = $conexion->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Vista Ventas</title>
</head>
<body>

<h1>Vista Ventas</h1>

<table border="1">

<tr>
<th>ID Venta</th>
<th>Cliente</th>
<th>Fecha</th>
<th>Total</th>
</tr>

<?php
while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
?>

<tr>
<td><?= $fila["id_venta"] ?></td>
<td><?= $fila["nombre"] . " " . $fila["apellido"] ?></td>
<td><?= $fila["fecha_venta"] ?></td>
<td><?= $fila["total_venta"] ?></td>
</tr>

<?php } ?>

</table>

</body>
</html>