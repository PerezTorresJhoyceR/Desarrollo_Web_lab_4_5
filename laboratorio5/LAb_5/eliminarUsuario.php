<?php session_start();
include("conexion.php");
require("verificarsesion.php");
require("verificarnivel.php");

$id=$_GET['id'];
$stmt1 = $con->prepare('DELETE FROM reservas WHERE usuario_id = ?');
$stmt1->bind_param("i", $id);
$stmt1->execute();

$stmt2=$con->prepare('DELETE FROM usuarios WHERE id=?');
$stmt2->bind_param("i",$id);
 
if ($stmt2->execute()) {
    echo "Usuario Eliminado";
} else {
    echo "Error: " . $stmt2->error;
}

$con->close();
?>
