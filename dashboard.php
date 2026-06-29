<?php
session_start();

if(!isset($_SESSION["usuario"])){

    header("Location: login.php");
    exit();

}
?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Dashboard</title>

<link rel="stylesheet" href="css/estilos.css">

</head>

<body>

<h1>

Bienvenido

<?php echo $_SESSION["usuario"]; ?>

</h1>

<ul>

<li><a href="productos/listar.php">Productos</a></li>

<li><a href="categorias/listar.php">Categorías</a></li>

<li><a href="marcas/listar.php">Marcas</a></li>

<li><a href="proveedores/listar.php">Proveedores</a></li>

<li><a href="inventario/listar.php">Inventario</a></li>

<li><a href="ventas/listar.php">Ventas</a></li>

<li><a href="logout.php">Cerrar sesión</a></li>

</ul>

</body>

</html>