<?php include("conexion.php");

$nombre=$_POST['nombre'];
$superficie=$_POST['superficie'];
$max_personas=$_POST['max_personas'];


$stmt=$con->prepare('INSERT INTO tipos_habitacion(nombre,superficie,max_personas) VALUES(?,?,?)');

// Vincular parámetros
$stmt->bind_param("sdi",$nombre, $superficie,$max_personas);



// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Nuevo registro creado con éxito";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>

