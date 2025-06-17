<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php session_start();
    require("verificarsesion.php");
    include("conexion.php");
    ?>
    <div class="form">
    <form action="javascript:crear()"method="post" id="form-crear">
        
        <label for="nombre">Nombres:</label>
        <input type="text" name="nombre">
        <br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo">
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password">
        <br>
        <label for="rol">Rol:</label>
        <input type="radio" name="rol" value=1>Administrador
        <input type="radio" name="rol" value=2>Usuario
        <br>
        <label for="estado">Estado:</label>

        <select name="estado">
        <option value="activo">Activo</option>
        <option value="suspendido">Suspendido</option>
        </select>
        <br>
        <input type="submit" value="Guardar">

    </form>
    </div>
</body>
</html>