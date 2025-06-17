<?php 
include("conexion.php");

// Crear directorio de images si no existe
$uploadDir = 'images/habitaciones/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Procesar imagen
$imagenNombre = '';
if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
    $imagenNombre = 'habitacion_' . time() . '.' . $extension;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $uploadDir . $imagenNombre);
}

$numero = $_POST['numero'];
$piso = $_POST['piso'];
$tipo_id = $_POST['tipo_id'];
$estado = $_POST['estado'];
$precio=$_POST['precio'];

$stmt = $con->prepare('INSERT INTO habitaciones(numero, piso, tipo_id, estado, imagen,precio) VALUES(?,?,?,?,?,?)');
$stmt->bind_param("siissi", $numero, $piso, $tipo_id, $estado, $imagenNombre,$precio);

if ($stmt->execute()) {
    echo "Habitación creada con éxito";
} else {
    // Eliminar imagen si hubo error
    if(!empty($imagenNombre) && file_exists($uploadDir . $imagenNombre)) {
        unlink($uploadDir . $imagenNombre);
    }
    echo "Error: " . $stmt->error;
}

$con->close();
?>