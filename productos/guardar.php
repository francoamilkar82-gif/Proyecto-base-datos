<?php

include("../conexion.php");

$nombre=$_POST["nombre"];
$descripcion=$_POST["descripcion"];
$precio=$_POST["precio"];
$categoria=$_POST["categoria"];
$marca=$_POST["marca"];
$proveedor=$_POST["proveedor"];
$talla=$_POST["talla"];
$color=$_POST["color"];
$sucursal=$_POST["sucursal"];

$sql="CALL registrar_producto(?,?,?,?,?,?,?,?,?)";

$stmt=$conexion->prepare($sql);

$stmt->execute([
$nombre,
$descripcion,
$precio,
$categoria,
$marca,
$proveedor,
$talla,
$color,
$sucursal
]);

header("Location:listar.php");

?>