<?php
include("conexion.php");

$sql = "SELECT * FROM vista_productos";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Vista Productos</title>

<style>

body{
    font-family:Arial;
    background:#f5f5f5;
}

h1{
    text-align:center;
}

table{
    width:90%;
    margin:auto;
    border-collapse:collapse;
}

th{
    background:#222;
    color:white;
    padding:12px;
}

td{
    border:1px solid #ccc;
    padding:10px;
    text-align:center;
}

</style>

</head>

<body>

<h1>Vista de Productos</h1>

<table>

<tr>
<th>ID</th>
<th>Producto</th>
<th>Descripción</th>
<th>Categoría</th>
<th>Marca</th>
<th>Proveedor</th>
<th>Talla</th>
<th>Color</th>
<th>Sucursal</th>
<th>Precio</th>
</tr>

<?php
while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
?>

<tr>

<td><?= $fila['id_producto'] ?></td>

<td><?= $fila['nombre'] ?></td>

<td><?= $fila['descripcion'] ?></td>

<td><?= $fila['nombre_categoria'] ?></td>

<td><?= $fila['nombre_marca'] ?></td>

<td><?= $fila['nombre_proveedor'] ?></td>

<td><?= $fila['nombre_talla'] ?></td>

<td><?= $fila['nombre_color'] ?></td>

<td><?= $fila['sucursal'] ?></td>

<td><?= $fila['precio'] ?></td>

</tr>

<?php
}
?>

</table>

</body>
</html>