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

<li><a href="#">Categorías</a></li>

<li><a href="#">Marcas</a></li>

<li><a href="#">Proveedores</a></li>

<li><a href="#">Inventario</a></li>

<li><a href="#">Ventas</a></li>

<li><a href="logout.php">Cerrar sesión</a></li>

</ul>

</body>

</html>