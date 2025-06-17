<?php
session_start();
include("conexion.php");
include("verificarsesion.php");

$id = $_GET['id'];
$stmt = $con->prepare("UPDATE usuarios SET estado = 'suspendido' WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Cuenta suspendida exitosamente.";
} else {
    echo "Error al suspender la cuenta: ";
}

 
$con->close();
?>