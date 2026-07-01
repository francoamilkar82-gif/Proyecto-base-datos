<?php
include("conexion.php");

$sql = "SELECT * FROM vista_inventario";
$stmt = $conexion->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Vista Inventario</title>
</head>
<body>

<h1>Vista Inventario</h1>

<table border="1">
<tr>
<th>ID</th>
<th>Producto</th>
<th>Stock</th>
<th>Sucursal</th>
</tr>


<?php
while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
?>

<tr>
<td><?= $fila["id_inventario"] ?></td>
<td><?= $fila["nombre"] ?></td>
<td><?= $fila["cantidad"] ?></td>
<td><?= $fila["sucursal"] ?></td>
</tr>

<?php } ?>

</table>

</body>
</html>