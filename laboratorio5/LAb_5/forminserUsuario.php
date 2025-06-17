<?php session_start();
    require("verificarsesion.php");
    require("verificarnivel.php");
    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="javascript:usuarioCreado()"method="post" id="form-crearUsuario">
        
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
        <input type="radio" name="rol" value="1">Administrador
        <input type="radio" name="rol" value="2">Cliente
        <br>
        <input type="submit" value="Crear Usuario">

    </form>
    
</body>
</html>