<?php session_start();
include("conexion.php");
 
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$password=SHA1($_POST['password']);
$rol=2;

$stmt=$con->prepare('INSERT INTO usuarios(nombre,correo,password,rol) VALUES(?,?,?,?)');

$stmt->bind_param("sssi",$nombre,$correo,$password,$rol);


if ($stmt->execute()) {
    echo "Usuario creado con éxito";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?> 