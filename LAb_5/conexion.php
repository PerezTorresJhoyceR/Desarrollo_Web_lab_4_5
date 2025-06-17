<?php 
$con = mysqli_connect("localhost", "root", "", "bd_hotel");
if(mysqli_connect_errno()) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
} else {
    // Descomenta la siguiente línea para verificar la conexión (recuerda comentarla después de verificar)
    //echo "¡Conexión exitosa a la base de datos bd_hotel!";
}
?>