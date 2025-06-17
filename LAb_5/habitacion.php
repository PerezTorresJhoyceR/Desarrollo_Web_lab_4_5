<?php 
include("conexion.php");

$sql = "SELECT h.id, h.numero, h.piso, h.estado, f.imagen, h.precio, 
               t.nombre AS tipo_habitacion 
        FROM habitaciones h
        JOIN tipos_habitacion t ON h.tipo_id = t.id
        JOIN fotos_habitacion f ON f.habitacion_id = h.id";
$resultado = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Habitaciones</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        .imagen-habitacion {
            max-width: 100px;
            max-height: 100px;
            border-radius: 5px;
        }
        .sin-imagen {
            width: 100px;
            height: 100px;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="espacio-usuario">
    <div class="contenido-usuario">
        <div class="cabecera-usuario">
    <button class="btn-crear" onclick="insertarHabitacion()"><img src="images/mas2.jpg" alt="mas" width="10px" height="10px" background-color="white"> Crear habitacion</button>
    <div class="tabla">
        <table>
            <thead>
                <tr>
                    <th width="80px">Número</th>
                    <th width="80px">Piso</th>
                    <th width="150px">Tipo</th>
                    <th width="100px">Estado</th>
                    <th width="120px">Imagen</th>
                    <th width="80px">precio</th>
                    <th width="200px">Operaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($resultado)) { ?>
                <tr>
                    <td><?php echo $row['numero']; ?></td>
                    <td><?php echo $row['piso']; ?></td>
                    <td><?php echo $row['tipo_habitacion']; ?></td>
                    <td><?php echo ucfirst($row['estado']); ?></td>
                    <td>
                        <?php if(!empty($row['imagen'])): ?>
                            <img src="images/habitaciones/<?php echo $row['imagen']; ?>" class="imagen-habitacion">
                        <?php else: ?>
                            <div class="sin-imagen">Sin imagen</div>
                        <?php endif; ?>
                    <td><?php echo $row['precio']; ?></td>
                    </td>
                    <td>
                        <button class="btn btn-outline-warning" onclick="editarHabitacion(<?php echo $row['id']; ?>)">Editar</button>
                        <button class="btn btn-outline-danger" onclick="eliminarHabitacion(<?php echo $row['id']; ?>)">Eliminar</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
 </div>
</body>
</html>