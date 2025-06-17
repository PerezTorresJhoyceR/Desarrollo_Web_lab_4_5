<?php session_start();
include("conexion.php");
require("verificarsesion.php");
require("verificarnivel.php");

$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$password=SHA1($_POST['password']);
$rol=$_POST['rol'];

$stmt=$con->prepare('INSERT INTO usuarios(nombre,correo,password,rol) VALUES(?,?,?,?)');

$stmt->bind_param("sssi",$nombre,$correo,$password,$rol);


if ($stmt->execute()) {
    echo "Nuevo Usuario creado con éxito";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?> 