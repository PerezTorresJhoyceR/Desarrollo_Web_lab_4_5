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
   
    $id = $_GET['id'];
    $sql = "SELECT id,nombre,correo,contraseña,rol,estado FROM usuarios WHERE id=$id";
    
    $resultado = $con->query($sql);
    $row = $resultado->fetch_assoc();
    ?>
    <div class="fomr">
        
    
      <form action="javascript:crearUsuario('<?php echo $id; ?>')"method="post" id="form-edit">
        
        <label for="nombre">Nombres:</label>
        <input type="text" name="nombre" value="<?php echo $row['nombre'];?>">
        <br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" value="<?php echo $row['correo'];?>">
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" value="<?php echo $row['contraseña'];?>" >
        <br>
        <label for="rol">Rol:</label>
        <input type="radio" name="rol" value=1 <?php echo $row['rol'] == 1 ? 'checked' : ''; ?>>Administrador
        <input type="radio" name="rol" value=2 <?php echo $row['rol'] == 2 ? 'checked' : ''; ?>>Usuario
        <br>
        <label for="estado">Estado:</label>
        <select name="estado">
        <option value="activo" <?php echo $row['estado'] == 'activo' ? 'selected' : ''; ?>>Activo</option>
        <option value="suspendido" <?php echo $row['estado'] == 'suspendido' ? 'selected' : ''; ?>>Suspendido
        </option>
        </select>
        <br>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="submit" value="Guardar">

    </form>
</div>
</body>

</html>