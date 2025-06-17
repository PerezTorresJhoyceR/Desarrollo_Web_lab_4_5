<?php
header('Content-Type: application/json');

// Incluir archivo de conexión
include 'conexion.php';

try {
    // Obtener datos del POST
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $fecha_entrada = $_POST['fecha_entrada'] ?? '';
    $fecha_salida = $_POST['fecha_salida'] ?? '';
    $habitacion_id = $_POST['habitacion_id'] ?? '';
    $precio_total = $_POST['precio_total'] ?? 0;
    $tipo_habitacion = $_POST['tipo_habitacion'] ?? '';

    // Validar datos requeridos
    if (empty($nombre) || empty($email) || empty($fecha_entrada) || empty($fecha_salida) || empty($habitacion_id)) {
        throw new Exception('Faltan campos obligatorios');
    }

    // Verificar si el usuario ya existe
    $stmt = $con->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        $usuario_id = $usuario['id'];
    } else {
        // Insertar nuevo usuario
        $stmt = $con->prepare("INSERT INTO usuarios (nombre, correo, rol) VALUES (?, ?, 3)");
        $stmt->bind_param("ss", $nombre, $email);
        $stmt->execute();
        $usuario_id = $con->insert_id;
    }
    $stmt->close();

    // Insertar la reserva
    $stmt = $con->prepare("INSERT INTO reservas (usuario_id, habitacion_id, fecha_inicio, fecha_fin, estado) VALUES (?, ?, ?, ?, 'pendiente')");
    $stmt->bind_param("iiss", $usuario_id, $habitacion_id, $fecha_entrada, $fecha_salida);
    
    if ($stmt->execute()) {
        $reserva_id = $con->insert_id;
        
        // Actualizar estado de la habitación
        $stmt = $con->prepare("UPDATE habitaciones SET estado = 'ocupada' WHERE id = ?");
        $stmt->bind_param("i", $habitacion_id);
        $stmt->execute();
        
        echo json_encode([
            'success' => true,
            'reserva_id' => $reserva_id,
            'message' => 'Reserva realizada con éxito'
        ]);
    } else {
        throw new Exception('Error al guardar la reserva: ' . $con->error);
    }
    
    $stmt->close();
    
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}

$con->close();
?>
