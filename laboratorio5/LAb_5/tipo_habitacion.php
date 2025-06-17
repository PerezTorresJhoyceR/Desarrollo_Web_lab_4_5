<?php include("conexion.php");
$sql = "SELECT id,nombre,superficie,max_personas FROM tipos_habitacion";
$resultado = $con->query($sql);
?>

<div class="espacio-usuario">
    <div class="contenido-usuario">
        <div class="cabecera-usuario">
            <button class="btn-crear" onclick="insertar()"><img src="images/mas2.jpg" alt="mas" width="10px" height="10px" background-color="white"> Crear tipos de habitacion</button>
        </div>
        <div class="cuerpo-usuario">
            <table class="table">
                <thead>
                    <tr>
                        <th width="100px">Nombre</th>
                        <th width="100px">Superficie</th>
                        <th width="100px">Personas</th>
                        <th width="200px">Operaciones</th>
                    </tr>
                </thead>
                <?php while ($row = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['superficie']; ?></td>
                        <td><?php echo $row['max_personas']; ?></td>
                        <td>
                            <button class="btn btn-outline-warning" onclick="edit(<?php echo $row['id']; ?>)">Editar</button>
                            <button class="btn btn-outline-danger"  onclick="eliminar(<?php echo $row['id']; ?>)">Eliminar</button>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <script src="script.js"></script>