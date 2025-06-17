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
    ?>
    <h2>Agregar nuevo tipo de habitación</h2>
    <div class="form">
    <form action="javascript:crear()"method="post" id="form-crear">
    <label for="nombre">Nombre del tipo de Habitacion</label>
    <input type="text" name="nombre"><br><br>
    <label for="superficie">Superficie</label>
    <input type="text" name="superficie"><br><br>
    <label for="max_personas">Numero de personas</label>
    <input type="text"  name="max_personas"><br><br>
    <button type="button" onclick="cargarTipohabitacion()">Cancelar</button>
    <input type="submit" value="Guardar">
    </form>
    </div>
</body>
</html>
