<?php 
include("conexion.php");
$id = $_GET['id'];

// Obtener nombre de la imagen para eliminarla
$sql = "SELECT imagen FROM habitaciones WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$habitacion = $result->fetch_assoc();

$stmt = $con->prepare('DELETE FROM habitaciones WHERE id=?');
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // Eliminar imagen si existe
    if(!empty($habitacion['imagen']) && file_exists('images/' . $habitacion['imagen'])) {
        unlink('images/' . $habitacion['imagen']);
    }
    echo "Habitación eliminada";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>