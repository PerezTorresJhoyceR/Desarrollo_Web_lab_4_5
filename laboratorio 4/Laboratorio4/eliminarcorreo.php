<?php
include("conexion.php");

$id=$_GET['id'];
$stmt=$con->prepare('DELETE FROM correos WHERE id=?');
$stmt->bind_param("i",$id);
 
if ($stmt->execute()) {
    echo "Registro Eliminado";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>
