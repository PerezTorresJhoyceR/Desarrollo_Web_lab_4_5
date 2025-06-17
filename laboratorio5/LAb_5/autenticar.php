<?php session_start();
include("conexion.php");

$correo = $_POST['correo'];
$password = sha1($_POST['password']);

$stmt = $con->prepare('SELECT nombre,correo,rol FROM usuarios WHERE correo=? AND password=?');
$stmt->bind_param("ss", $correo, $password);
$stmt->execute();
$result = $stmt->get_result();

if ( $result->num_rows > 0) {
  
   $usuario = $result->fetch_assoc();
    $_SESSION['correo'] = $usuario['correo'];
    $_SESSION['rol'] = $usuario['rol'];
    $_SESSION['nombre'] = $usuario['nombre'];
    echo "ok|{$usuario['rol']}";
}
else{
    echo  "Error";
}
?>