<?php
session_start();

if(!isset($_SESSION["usuario"])){
    header("Location: ../login.php");
    exit();
}

include("../conexion.php");

$sql = "SELECT * FROM vista_productos ORDER BY id_producto";

$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Productos</title>

<style>

body{
    font-family:Arial;
    background:#ececec;
}

table{
    width:90%;
    margin:auto;
    border-collapse:collapse;
    background:white;
}

th,td{
    border:1px solid #ccc;
    padding:10px;
    text-align:center;
}

th{
    background:#222;
    color:white;
}

h1{
    text-align:center;
}

a{
    text-decoration:none;
    padding:8px 12px;
    background:#222;
    color:white;
}

.boton{
    width:90%;
    margin:20px auto;
}

</style>

</head>

<body>

<h1>Lista de Productos</h1>

<div class="boton">

<a href="../dashboard.php">← Volver</a>

<a href="agregar.php">Agregar Producto</a>

</div>

<table>

<tr>

<th>ID</th>
<th>Nombre</th>
<th>Categoría</th>
<th>Marca</th>
<th>Precio</th>
<th>Acciones</th>

</tr>

<?php

while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){

echo "<tr>";

echo "<td>".$fila["id_producto"]."</td>";
echo "<td>".$fila["nombre"]."</td>";
echo "<td>".$fila["nombre_categoria"]."</td>";
echo "<td>".$fila["nombre_marca"]."</td>";
echo "<td>".$fila["precio"]."</td>";
echo "<td>

<a href='editar.php?id=".$fila["id_producto"]."'>Editar</a>

<a href='eliminar.php?id=".$fila["id_producto"]."'>Eliminar</a>

</td>";

echo "</tr>";

}

?>

</table>

</body>

</html>