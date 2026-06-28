<?php
session_start();

if(!isset($_SESSION["usuario"])){
    header("Location: ../login.php");
    exit();
}

include("../conexion.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Agregar Producto</title>
</head>

<body>

<h2>Nuevo Producto</h2>

<form action="guardar.php" method="POST">

Nombre<br>
<input type="text" name="nombre" required><br><br>

Descripción<br>
<input type="text" name="descripcion"><br><br>

Precio<br>
<input type="number" step="0.01" name="precio" required><br><br>

ID Categoría<br>
<input type="number" name="categoria" required><br><br>

ID Marca<br>
<input type="number" name="marca" required><br><br>

ID Proveedor<br>
<input type="number" name="proveedor" required><br><br>

ID Talla<br>
<input type="number" name="talla" required><br><br>

ID Color<br>
<input type="number" name="color" required><br><br>

ID Sucursal<br>
<input type="number" name="sucursal" required><br><br>

<input type="submit" value="Guardar Producto">

</form>

<br>

<a href="listar.php">Volver</a>

</body>
</html>