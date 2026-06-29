<?php
include("../conexion.php");

$sql = "SELECT * FROM marca ORDER BY id_marca";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Marcas</title>
</head>
<body>

<h2>Lista de Marcas</h2>

<a href="../dashboard.php">← Volver al Dashboard</a>

<br><br>

<table border="1">

<tr>
    <th>ID</th>
    <th>Nombre</th>
</tr>

<?php
while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
?>
<tr>
    <td><?= $fila["id_marca"] ?></td>
    <td><?= $fila["nombre_marca"] ?></td>
</tr>
<?php
}
?>

</table>

</body>
</html>