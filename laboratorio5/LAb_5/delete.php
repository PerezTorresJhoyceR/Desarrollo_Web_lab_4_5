<?php 
include("conexion.php");
$id=$_GET['id'];

$stmt=$con->prepare('DELETE FROM tipos_habitacion WHERE id=?');
$stmt->bind_param("i",$id);
// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Registro Eliminado";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>

