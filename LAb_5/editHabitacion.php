<?php
include("conexion.php");

$id = $_POST['id'];
$numero = $_POST['numero'];
$piso = $_POST['piso'];
$tipo_id = $_POST['tipo_id'];
$estado = $_POST['estado'];
$precio = $_POST['precio'];

// Manejo de imagen
$imagenNombre = $_POST['imagen_actual'] ?? ''; // Conservar imagen actual por defecto

if ($_FILES['imagen']['error'] == 0) {
    $uploadDir = 'images/habitaciones/';
    $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
    $nuevaImagen = 'habitacion_' . time() . '.' . $extension;
    
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $uploadDir . $nuevaImagen)) {
        // Eliminar imagen anterior si existe
        if (!empty($imagenNombre) && file_exists($uploadDir . $imagenNombre)) {
            unlink($uploadDir . $imagenNombre);
        }
        $imagenNombre = $nuevaImagen;
    }
}

// Actualizar registro
$stmt = $con->prepare('UPDATE habitaciones SET 
    numero = ?, 
    piso = ?, 
    tipo_id = ?, 
    estado = ?, 
    imagen = ?, 
    precio = ? 
    WHERE id = ?');

$stmt->bind_param("siissii", $numero, $piso, $tipo_id, $estado, $imagenNombre, $precio, $id);

if ($stmt->execute()) {
    echo "Habitación actualizada con éxito";
} else {
    // Revertir cambios en imagen si hay error
    if (isset($nuevaImagen) && file_exists($uploadDir . $nuevaImagen)) {
        unlink($uploadDir . $nuevaImagen);
    }
    echo "Error: " . $stmt->error;
}

$con->close();
?>