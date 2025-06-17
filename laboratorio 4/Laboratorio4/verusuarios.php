<?php session_start();
include("conexion.php");
require("verificarsesion.php");


$sql="SELECT * FROM usuarios";
$resultado=$con->query($sql);
?>
<table class="table table-striped table-bordered table-hover ">
    <thead>
        <tr>
            <th width="70px">Nombre</th>
            <th width="80px">Correo</th>
            <th width="80px">Contraseña</th>
            <th width="10px">Rol</th>
            <th width="10px">Estado</th>
            <th width="100px">Operación</th>
        </tr>
    </thead>
    
 <?php 
 while($row=mysqli_fetch_array($resultado)){
    ?>
    <tr>
        <td><?php echo $row['nombre'];?></td>
        <td><?php echo $row['correo'];?></td>
        <td><?php echo $row['contraseña'];?></td>
        <td><?php echo $row['rol'];?></td>
        <td><?php echo $row['estado'];?></td>
        <td><a id="ver" href="javascript:verCorr(id=<?php echo $row['id']; ?>)">Ver</a>
            <a id="eliminar" href="javascript:eliminar(id=<?php echo $row['id']; ?>)">Eliminar</a>
        </td>
        
    </tr>
    <?php } ?>
 </table>

