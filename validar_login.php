<?php
session_start();

include("conexion.php");

$correo = $_POST['correo'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuario
        WHERE correo = :correo
        AND contraseña = :password";

$stmt = $conexion->prepare($sql);

$stmt->bindParam(":correo", $correo);
$stmt->bindParam(":password", $password);

$stmt->execute();

if($stmt->rowCount() == 1){

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    $_SESSION["usuario"] = $usuario["nombre"];
    $_SESSION["rol"] = $usuario["rol"];
    $_SESSION["id_usuario"] = $usuario["id_usuario"];

    header("Location: dashboard.php");
    exit();

}else{

    echo "<script>
            alert('Correo o contraseña incorrectos');
            window.location='login.php';
          </script>";

}
?>