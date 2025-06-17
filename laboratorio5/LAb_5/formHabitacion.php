<?php
include("conexion.php");

// Obtener tipos de habitación para el select
$sqlTipos = "SELECT id, nombre FROM tipos_habitacion";
$resultadoTipos = $con->query($sqlTipos);

// Verificar si es edición
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$habitacion = null;

if($id > 0) {
    $stmt = $con->prepare("SELECT numero, piso, tipo_id, estado, imagen, precio FROM habitaciones WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $habitacion = $result->fetch_assoc();
}
?>

<form id="form-habitacion" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    
    <div class="form-group">
        <label for="numero">Número:</label>
        <input type="text" id="numero" name="numero" required 
               value="<?php echo $habitacion ? $habitacion['numero'] : ''; ?>">
    </div>
    
    <div class="form-group">
        <label for="piso">Piso:</label>
        <input type="number" id="piso" name="piso" required 
               value="<?php echo $habitacion ? $habitacion['piso'] : ''; ?>">
    </div>
    
    <div class="form-group">
        <label for="tipo_id">Tipo de Habitación:</label>
        <select id="tipo_id" name="tipo_id" required>
            <option value="">Seleccione un tipo</option>
            <?php while($tipo = mysqli_fetch_array($resultadoTipos)) { ?>
            <option value="<?php echo $tipo['id']; ?>"
                <?php echo ($habitacion && $habitacion['tipo_id'] == $tipo['id']) ? 'selected' : ''; ?>>
                <?php echo $tipo['nombre']; ?>
            </option>
            <?php } ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="disponible" <?php echo ($habitacion && $habitacion['estado'] == 'disponible') ? 'selected' : ''; ?>>Disponible</option>
            <option value="ocupada" <?php echo ($habitacion && $habitacion['estado'] == 'ocupada') ? 'selected' : ''; ?>>Ocupada</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" <?php echo ($id == 0) ? 'required' : ''; ?>>
        <?php if($id > 0 && !empty($habitacion['imagen'])): ?>
            <p>Imagen actual: <?php echo $habitacion['imagen']; ?></p>
            <input type="hidden" name="imagen_actual" value="<?php echo $habitacion['imagen']; ?>">
        <?php endif; ?>
    </div>
      <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required 
               value="<?php echo $habitacion ? $habitacion['precio'] : ''; ?>">
    </div>
    
    <div class="form-group">
        <button type="button" onclick="guardarHabitacion()">Guardar</button>
    </div>
</form>