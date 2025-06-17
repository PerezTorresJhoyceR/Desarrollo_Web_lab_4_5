<?php session_start();
include("conexion.php");
require("verificarsesion.php");


$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$password=SHA1($_POST['password']);
$rol=$_POST['rol'];
$estado=$_POST['estado'];

//$sql="INSERT INTO personas(nombres,apellidos,fecha_nacimiento,sexo,correo) VALUES('$nombres','$apellidos','$fecha_nacimiento','$sexo','$correo')";


$stmt=$con->prepare('INSERT INTO usuarios(nombre,correo,contraseña,rol,estado) VALUES(?,?,?,?,?)');

// Vincular parámetros
$stmt->bind_param("sssis",$nombre,$correo,$password,$rol,$estado);



// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Nuevo registro creado con éxito";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>
