<?php include("conexion.php");
$sql="SELECT r.*, u.nombre AS usuario, h.numero AS habitacion 
          FROM reservas r
          JOIN usuarios u ON r.usuario_id = u.id
          JOIN habitaciones h ON r.habitacion_id = h.id";

$resultado=$con->query($sql);
?>

<div class="espacio-usuario">
<div class="contenido-usuario">
    <div class="cuerpo-usuario">
        <table class="table">
    <thead>
        <tr>
            <th width="80px">Nombre</th>
            <th width="80px">Habitacion</th>
            <th width="100px">Fecha de entrada</th>
            <th width="100px">Fecha de salida</th>
            <th width="80px">Estado</th>
            <th width="200px">Operaciones</th>
        </tr>
    </thead>
    <?php while($row=mysqli_fetch_array($resultado)){ ?>
    <tr>
        <td><?php echo $row['usuario'];?></td>
        <td><?php echo $row['habitacion'];?></td>
        <td><?php echo $row['fecha_inicio'];?></td>
        <td><?php echo $row['fecha_fin'];?></td>
        <td><?php echo $row['estado'];?></td>
        <td>
            <button class="btn btn-outline-warning" onclick="edit_reserva(<?php echo $row['id']; ?>)">Editar</button>
            <button class="btn btn-outline-danger" onclick="eliminar_reserva(<?php echo $row['id']; ?>)">Eliminar</button>
        </td>
    </tr>
    <?php } ?>
</table>
</div>
</div>
<script src="script.js"></script>
