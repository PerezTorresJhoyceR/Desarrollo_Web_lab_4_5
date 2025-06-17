<?php  session_start();
include("conexion.php");
require("verificarsesion.php");
$id = $_POST['id'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$password=$_POST['password'];
$rol=$_POST['rol'];
$estado=$_POST['estado'];
 

//$sql="UPDATE personas SET nombres='$nombres',apellidos='$apellidos',fecha_nacimiento='$fecha_nacimiento',sexo='$sexo',correo='$correo' WHERE id=$id";

$stmt=$con->prepare('UPDATE usuarios SET nombre=?,correo=?,contraseña=?,rol=?,estado=?  WHERE id=?');

$stmt->bind_param( "sssisi", $nombre, $correo, $password, $rol, $estado, $id);


// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Registro Actualizado";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>
