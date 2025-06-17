<?php  session_start();
include("conexion.php");
require("verificarsesion.php");
require("verificarnivel.php");

$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$password=SHA1($_POST['password']);
$rol=$_POST['rol'];
$id=$_POST['id'];
 
$stmt=$con->prepare('UPDATE usuarios SET nombre=?,correo=?,password=?,rol=? WHERE id=?');
 
$stmt->bind_param("sssii",$nombre,$correo,$password,$rol,$id);
 
if ($stmt->execute()) {
    echo "Registro Actualizado";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>
 
