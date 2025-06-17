<?php
session_start();
include("conexion.php");
include("verificarsesion.php");

$sql = "SELECT id,correo, estado FROM usuarios";
$resultado = $con->query($sql);
?>
<table class="table ">
    <thead>
        <tr>
            <th>Correo</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['correo'] ?></td>
                <td><?= $row['estado'] ?></td>
                <td>
                    <?php if ($row['estado'] == 'activo') { ?>
                        <button id="suspender" onclick="suspenderCuenta(<?= $row['id'] ?>)">Suspender</button>
                    <?php } else { ?>
                        <button id="habilitar" onclick="habilitarCuenta(<?= $row['id'] ?>)">Habilitar</button>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>