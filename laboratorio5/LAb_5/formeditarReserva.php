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
    $id = $_GET['id'];
    $sql = "SELECT r.*, u.nombre AS usuario, h.numero AS habitacion 
          FROM reservas r
          JOIN usuarios u ON r.usuario_id = u.id
          JOIN habitaciones h ON r.habitacion_id = h.id WHERE r.id=$id";
    
    $resultado = $con->query($sql);
    $row = $resultado->fetch_assoc();
    ?>
      <form action="javascript:editar_reserva('<?php echo $id; ?>')"method="post" id="form-editReserva">
        
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario_id" value="<?php echo $row['usuario'];?>">
        <br>
        <label for="habitacion">Habitacion:</label>
        <input type="text" name="habitacion_id" value="<?php echo $row['habitacion'];?>">
        <br>
        <label for="fecha inicio">Fecha inicio:</label>
        <input type="date" name="fecha_inicio" value="<?php echo $row['fecha_inicio'];?>" >
        <br>
        <label for="fecha_fin">Fecha fin:</label>
        <input type="date" name="fecha_fin" value="<?php echo $row['fecha_fin'];?>" >
        <br>
        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="pendiente" <?php echo ($row['estado'] == 'pendiente') ? 'selected' : ''; ?>>pendiente</option>
            <option value="rechazado" <?php echo ($row['estado'] == 'rechazado') ? 'selected' : ''; ?>>rechazado</option>
            <option value="reservado" <?php echo ($row['estado'] == 'reservado') ? 'selected' : ''; ?>>reservado</option>
        </select>
        
        <br>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="submit" value="Guardar">

    </form>

</body>

</html>