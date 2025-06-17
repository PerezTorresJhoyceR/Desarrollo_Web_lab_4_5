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
    include("conexion.php");
    require("verificarsesion.php");
    require("verificarnivel.php");
    $id = $_GET['id'];
    $sql = "SELECT id,nombre,correo,password,rol FROM usuarios WHERE id=$id";

    $resultado = $con->query($sql);
    $row = $resultado->fetch_assoc();
    ?>
    
        <form action="javascript:guareditUsuario('<?php echo $id; ?>')" method="post" id="form-editUsuario">

            <label for="nombre">Nombres:</label><br>
            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>">
            <br>
            <label for="correo">Correo:</label><br>
            <input type="email" name="correo" value="<?php echo $row['correo']; ?>">
            <br>
            <label for="password">Contraseña:</label><br>
            <input type="password" name="password" value="<?php echo $row['password']; ?>">
            <br>
            <label for="rol">Rol:</label><br>
            <input type="radio" name="rol" value=1 <?php echo $row['rol'] == 1 ? 'checked' : ''; ?>>Administrador
            <input type="radio" name="rol" value=2 <?php echo $row['rol'] == 2 ? 'checked' : ''; ?>>Usuario

            <br>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="submit" value="Guardar">

        </form>
    


</body>

</html>