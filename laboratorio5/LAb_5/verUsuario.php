<?php
session_start();
include("conexion.php");
require("verificarsesion.php");

$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$pagina = max($pagina, 1);
$usuariosPorPagina = 6;
$inicio = ($pagina - 1) * $usuariosPorPagina;

// Total de usuarios
$sqlTotal = "SELECT COUNT(*) as total FROM usuarios";
$resTotal = $con->query($sqlTotal);
$total = $resTotal->fetch_assoc()['total'];
$nropaginas = ceil($total / $usuariosPorPagina);

// Consulta paginada
$sql = "SELECT * FROM usuarios 
        ORDER BY rol ASC 
        LIMIT $inicio, $usuariosPorPagina";
$res = $con->query($sql);

$usuarios = [];
while ($row = $res->fetch_assoc()) {
    $usuarios[] = [
        'id' => $row['id'],
        'nombre' => $row['nombre'],
        'correo' => $row['correo'],
        'password' => str_repeat('*', 8),
        'rol' => $row['rol']
    ];
}

echo json_encode([
    'datos' => $usuarios,
    'pagina' => $pagina,
    'buscar' => $buscar,
    'nropaginas' => $nropaginas
]);
?>
