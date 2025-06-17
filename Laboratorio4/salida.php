<?php 
session_start();
include("conexion.php");
include("verificarsesion.php");
//vanessa
$correo_usuario = $_SESSION['correo'];
$sql = "SELECT c.id, u.correo AS receptor, c.asunto, c.estado 
        FROM correos c
        INNER JOIN usuarios u ON u.id = c.receptor_id
        WHERE c.emisor_id = (SELECT id FROM usuarios WHERE correo = ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $correo_usuario);
$stmt->execute();
$resultado = $stmt->get_result();
?>
<table>
    <thead>
        <tr>
            <th width="100px">Receptor</th>
            <th width="100px">Asunto</th>
            <th width="60px">Estado</th>
            <th width="100px">Operación</th>
        </tr>
    </thead>
    <?php while($row = $resultado->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['receptor'] ?></td>
        <td><?= $row['asunto'] ?></td>
        <td><?= $row['estado'] ?></td>
        <td>
            <a id="ver" href="javascript:verCorr(id=<?php echo $row['id']; ?>)">Ver</a>
            <a id="eliminar" href="javascript:eliminar(id=<?php echo $row['id']; ?>)">Eliminar</a>
        </td>
    </tr>
    <?php } ?>
</table>