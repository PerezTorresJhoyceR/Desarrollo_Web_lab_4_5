<?php session_start();
include("conexion.php");

$correo = $_POST['correo'];
$password = sha1($_POST['password']);

$stmt = $con->prepare('SELECT nombre,correo,rol FROM usuarios WHERE correo=? AND contraseña=?');
$stmt->bind_param("ss", $correo, $password);
$stmt->execute();
$result = $stmt->get_result();

$arreglo=[];
if ($result && $result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    $_SESSION['correo']=$usuario['correo'];
    $_SESSION['rol'] = $usuario['rol'];

   $arreglo[]=["rol" => $usuario['rol']];
    echo json_encode($arreglo);
}
else{
    echo json_encode([]);
}
?>