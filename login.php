<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Login</title>

    <link rel="stylesheet" href="css/estilo.css">

</head>

<body>

<div class="login">

    <h2>Sistema Tienda de Ropa</h2>

    <form action="validar_login.php" method="POST">

        <input
        type="email"
        name="correo"
        placeholder="Correo electrónico"
        required>

        <input
        type="password"
        name="password"
        placeholder="Contraseña"
        required>

        <button type="submit">

            Ingresar

        </button>

    </form>

</div>

</body>

</html>