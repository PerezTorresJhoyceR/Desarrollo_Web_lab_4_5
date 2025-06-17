<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include("conexion.php"); 
    $id=$_GET['id'];
    $sql="SELECT id,nombre,superficie,max_personas FROM tipos_habitacion WHERE id=$id";
    $resultado=$con->query($sql);
    $row = $resultado->fetch_assoc();
    ?>
    <h2>Editar el tipo de habitación</h2>
    <div class="form">
    <form action="javascript:editar('<?php echo $id; ?>')"method="post" id="form-editar">
    <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
    <label for="nombre">Nombre del tipo de Habitacion</label>
    <input type="text" name="nombre" value="<?php echo $row ['nombre']; ?>"><br><br>
    <label for="superficie">Superficie</label>
    <input type="text" name="superficie" value="<?php echo $row ['superficie']; ?>"><br><br>
    <label for="max_personas">Numero de personas</label>
    <input type="text"  name="max_personas" value="<?php echo $row ['max_personas']; ?>"><br><br>
    <input type="submit" value="Actualizar">
    </form>
    </div>
    
</body>
</html>