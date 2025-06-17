<?php 
include("conexion.php");

$uploadDir = 'images/habitaciones/';

$id = $_POST['id'];
$numero = $_POST['numero'];
$piso = $_POST['piso'];
$tipo_id = $_POST['tipo_id'];
$estado = $_POST['estado'];
$imagenNombre = $_POST['imagen_actual'] ?? '';

// Procesar nueva imagen si se subió
if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    // Eliminar imagen anterior si existe
    if(!empty($imagenNombre) && file_exists($uploadDir . $imagenNombre)) {
        unlink($uploadDir . $imagenNombre);
    }
    
    // Subir nueva imagen
    $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
    $imagenNombre = 'habitacion_' . time() . '.' . $extension;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $uploadDir . $imagenNombre);
}

$stmt = $con->prepare('UPDATE habitaciones SET numero=?, piso=?, tipo_id=?, estado=?, imagen=? WHERE id=?');
$stmt->bind_param("siissi", $numero, $piso, $tipo_id, $estado, $imagenNombre, $id);

if ($stmt->execute()) {
    echo "Habitación actualizada con éxito";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>