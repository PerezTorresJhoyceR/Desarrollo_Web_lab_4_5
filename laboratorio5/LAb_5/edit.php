<?php include("conexion.php");

$nombre=$_POST['nombre'];
$superficie=$_POST['superficie'];
$max_personas=$_POST['max_personas'];
$id=$_POST['id'];

//$sql="UPDATE personas SET nombres='$nombres',apellidos='$apellidos',fecha_nacimiento='$fecha_nacimiento',sexo='$sexo',correo='$correo' WHERE id=$id";


$stmt=$con->prepare('UPDATE tipos_habitacion SET nombre=?,superficie=?,max_personas=? WHERE id=?');


// Vincular parámetros
$stmt->bind_param("sdii",$nombre, $superficie,$max_personas,$id);



// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Registro Actualizado";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>
