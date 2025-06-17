<?php session_start();
 include("conexion.php");
 require("verificarsesion.php");
$id=$_GET['id'];
$sql="SELECT correo,mensaje FROM usuarios INNER JOIN correos on usuarios.id=correos.emisor_id
 where correos.id=$id";

$resultado=$con->query($sql);
$row = $resultado->fetch_assoc();
?>
<ul>
    <li>Receptor: <?php echo $row['correo'];?></li>
    <li>Mensaje: <?php echo $row['mensaje'];?></li>
</ul>