<?php
session_start();
include("conexion.php");
require("verificarsesion.php");

$correo = $_SESSION['correo'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

 
$res = $con->query("SELECT id FROM usuarios WHERE correo = '$correo'");
$emisor_id = $res->fetch_assoc()['id'];

 
$usuarios = $con->query("SELECT id FROM usuarios WHERE id != $emisor_id");

 
while ($row = $usuarios->fetch_assoc()) {
    $receptor_id = $row['id'];
    $con->query("INSERT INTO correos (emisor_id, receptor_id, asunto, mensaje) VALUES ($emisor_id, $receptor_id, '$asunto', '$mensaje')");
}

echo "Aviso enviado a todos.";
$con->close();
?>
