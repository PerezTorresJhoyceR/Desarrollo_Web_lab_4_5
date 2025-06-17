<?php 
include("conexion.php");

$estado = $_POST['estado'];
$id = $_POST['id'];

$stmt = $con->prepare('UPDATE reservas SET estado = ? WHERE id = ?');
$stmt->bind_param("si", $estado, $id);

if ($stmt->execute()) {
    echo "Estado de reserva actualizado correctamente";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>