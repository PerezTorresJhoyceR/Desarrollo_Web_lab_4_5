<?php
session_start();
include("conexion.php");
include("verificarsesion.php");

if ($_SESSION['rol'] != 1) {
    die("Acceso denegado");
}

$id = $_GET['id'];
$stmt = $con->prepare("UPDATE usuarios SET estado = 'activo' WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Cuenta habilitada exitosamente.";
} else {
    echo "Error al habilitar la cuenta: " . $stmt->error;
}

$stmt->close();
$con->close();
?>