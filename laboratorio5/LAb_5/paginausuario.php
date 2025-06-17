<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Transilvania - Sistema de Reservas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --accent: #e74c3c;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --success: #27ae60;
            --warning: #f39c12;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header */
        header {
            background-color: var(--primary);
            color: white;
            padding: 15px 0;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            display: flex;
            align-items: center;
        }
        
        .logo i {
            color: var(--secondary);
            margin-right: 10px;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 25px;
        }
        
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 4px;
        }
        
        nav ul li a:hover, 
        nav ul li a.active {
            background-color: var(--secondary);
        }
        
        .user-controls {
            display: flex;
            align-items: center;
        }
        
        .user-controls .user-info {
            margin-right: 20px;
            display: flex;
            align-items: center;
        }
        
        .user-controls .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
            border: 2px solid var(--secondary);
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: var(--secondary);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
        }
        
        .btn:hover {
            background-color: #2980b9;
        }
        
        .btn-logout {
            background-color: var(--accent);
        }
        
        .btn-logout:hover {
            background-color: #c0392b;
        }
        
        .btn-detail {
            background: transparent;
            color: var(--secondary);
            border: 2px solid var(--secondary);
        }
        
        .btn-detail:hover {
            background: var(--secondary);
            color: white;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(44, 62, 80, 0.8), rgba(44, 62, 80, 0.8)), 
                        url('images/HOTEL11-2.jpg');
            background-size: cover;
            background-position: center;
            height: 500px;
            display: flex;
            align-items: center;
            color: white;
            text-align: center;
            margin-bottom: 50px;
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            text-shadow: 0 1px 3px rgba(0,0,0,0.3);
        }
        
        .search-box {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: var(--shadow);
            margin-top: 40px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        
        .search-field {
            flex: 1;
            min-width: 200px;
            margin: 0 10px 15px;
        }
        
        .search-field label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark);
            font-weight: 500;
        }
        
        .search-field input, 
        .search-field select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        .search-btn {
            flex: 0 0 100%;
            margin-top: 10px;
        }
        
        /* Secciones */
        .section-title {
            margin-bottom: 40px;
            text-align: center;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            color: var(--dark);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .section-title h2:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            width: 80px;
            height: 4px;
            background: var(--secondary);
            border-radius: 2px;
        }
        
        .section-title p {
            color: #777;
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto;
        }
        
        /* Formulario de Reserva */
        .reserva-container {
            background: white;
            border-radius: 8px;
            padding: 40px;
            box-shadow: var(--shadow);
            margin-bottom: 60px;
            position: relative;
        }
        
        .reserva-container::before {
            content: '';
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #2ecc71);
            border-radius: 2px;
        }
        
        .reserva-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: var(--dark);
            font-size: 2rem;
            position: relative;
            padding-bottom: 15px;
        }
        
        .reserva-container h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 80px;
            height: 4px;
            background: var(--secondary);
            border-radius: 2px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark);
        }
        
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        .double-column {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        /* Habitaciones */
        .habitaciones-container {
            display: none;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        
        .habitacion-btn {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            position: relative;
        }
        
        .habitacion-btn:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
        }
        
        .habitacion-btn.selected {
            border: 2px solid var(--secondary);
        }
        
        .habitacion-btn img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        
        .precio {
            padding: 10px;
            background: var(--primary);
            color: white;
            text-align: center;
            font-weight: 600;
        }
        
        /* Estilos para las habitaciones dinámicas */
        .seccion-tipo {
            margin-bottom: 50px;
        }

        .titulo-tipo {
            font-size: 28px;
  background: #2c3e50;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .habitaciones-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }

        .habitacion-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            width: calc(25% - 15px);
            min-width: 250px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .habitacion-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .habitacion-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .habitacion-info {
            padding: 15px;
        }

        .habitacion-info h4 {
            margin: 5px 0;
            color: #333;
        }

        .habitacion-info p {
            margin: 2px 0;
            color: #666;
        }

        .estado {
            font-weight: bold;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.85rem;
            text-transform: uppercase;
        }

        .estado-disponible {
            background-color: #d4edda;
            color: #155724;
        }

        .estado-ocupada {
            background-color: #f8d7da;
            color: #721c24;
        }

        .btn-reservar {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #27ae60;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease;
            text-align: center;
            width: 100%;
        }

        .btn-reservar:hover {
            background-color: #219a52;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .no-disponible {
            margin-top: 10px;
            font-weight: bold;
            color: #e74c3c;
            text-align: center;
            padding: 10px;
            background-color: #fdf2f2;
            border-radius: 5px;
            border: 1px solid #f5c6cb;
        }

        .ver-mas-btn {
            margin-top: 10px;
            text-align: center;
        }

        .bloque-oculto {
            display: none;
        }

        @media screen and (max-width: 992px) {
            .habitacion-card {
                width: calc(33.33% - 15px);
            }
        }

        @media screen and (max-width: 768px) {
            .habitacion-card {
                width: calc(50% - 15px);
            }
        }

        @media screen and (max-width: 500px) {
            .habitacion-card {
                width: 100%;
            }
        }
        
        /* Habitaciones Disponibles */
        .rooms-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }
        
        .room-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }
        
        .room-card:hover {
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .room-image {
            height: 250px;
            position: relative;
            overflow: hidden;
        }
        
        .room-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .room-price {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: var(--secondary);
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .room-info {
            padding: 25px;
        }
        
        .room-info h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--dark);
        }
        
        .room-features {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        
        .room-feature {
            display: flex;
            align-items: center;
            margin-right: 25px;
            margin-bottom: 10px;
        }
        
        .room-feature i {
            color: var(--secondary);
            margin-right: 8px;
            font-size: 1.2rem;
        }
        
        .room-actions {
            display: flex;
            justify-content: space-between;
        }
        
        /* Reservas */
        .reservations-container {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow);
            margin-bottom: 60px;
        }
        
        .reservation-header {
            display: grid;
            grid-template-columns: 80px 1fr 2fr 1fr 1fr 1fr;
            background: var(--primary);
            color: white;
            padding: 15px 20px;
            font-weight: 600;
            gap: 15px;
        }
        
        .reservation-item {
            display: grid;
            grid-template-columns: 80px 1fr 2fr 1fr 1fr 1fr;
            padding: 20px;
            border-bottom: 1px solid #eee;
            align-items: center;
            gap: 15px;
            transition: background-color 0.3s ease;
        }
        
        .reservation-item:last-child {
            border-bottom: none;
        }
        
        .reservation-item:hover {
            background-color: #f9f9f9;
        }
        
        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            text-align: center;
            text-transform: uppercase;
        }
        
        .status.reservado {
            background: #d4edda;
            color: #155724;
        }
        
        .status.pendiente {
            background: #fff3cd;
            color: #856404;
        }
        
        .status.rechazado {
            background: #f8d7da;
            color: #721c24;
        }
        img{
            width: 15px;
            height: 15px;
        }
        .message {
            padding: 15px 20px;
            margin: 20px 0;
            border-radius: 8px;
            font-weight: 500;
            border-left: 4px solid;
            animation: slideIn 0.3s ease;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .success {
            background-color: #d4edda;
            color: #155724;
            border-left-color: #28a745;
        }
        
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border-left-color: #dc3545;
        }
        
        .info {
            background-color: #d1ecf1;
            color: #0c5460;
            border-left-color: #17a2b8;
        }
        
        /* Estilos para el modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            overflow: auto;
        }
        
        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 30px;
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        
        .close:hover {
            color: black;
        }
        
        .reservation-details {
            margin: 20px 0;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        
        .detail-item {
            margin: 10px 0;
            display: flex;
            justify-content: space-between;
        }
        
        .detail-label {
            font-weight: 600;
            color: var(--primary);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <div class="logo">
                <i class="fas fa-hotel"></i>
                <span>HOTEL TRANSILVANIA</span>
            </div>
            
            <nav>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#reservar">Reservar online</a></li>
                    <li><a href="#habitaciones">Habitaciones</a></li>
                    <li><a href="#mis-reservas">Mis Reservas</a></li>
                </ul>
            </nav>
            
            <div class="user-controls">
                <a href="javascript:cerrarSesion()" class="btn btn-logout">Cerrar Sesión</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container hero-content">
            <h1>Disfruta de una experiencia inolvidable</h1>
            <p>Descubre nuestro exclusivo resort con vistas al mar, piscinas infinitas y el mejor servicio de la región</p>
        </div>
    </section>

    <!-- Formulario de Reserva -->
    <section class="container" id="reservar">
        <div class="reserva-container">
            <h2>Reserva Online</h2>
            <form action="" method="post" id="reserva-form">
                <!-- Campos ocultos para almacenar información de la reserva -->
                <input type="hidden" id="habitacion_id" name="habitacion_id" value="">
                <input type="hidden" id="precio_habitacion" name="precio_habitacion" value="">
                <input type="hidden" id="precio_total" name="precio_total" value="">
                
                <div class="double-column">
                    <div class="form-group">
                        <label for="nombre">Nombre completo</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>
                
                <div class="double-column">
                    <div class="form-group">
                        <label for="fecha_entrada">Fecha de entrada</label>
                        <input type="date" id="fecha_entrada" name="fecha_entrada" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_salida">Fecha de salida</label>
                        <input type="date" id="fecha_salida" name="fecha_salida" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="habitacion">Tipo de habitación</label>
                    <select id="habitacion" name="tipo_habitacion" required onchange="mostrarHabitaciones()">
                        <option value="">Seleccione...</option>
                        <option value="simple">Simple</option>
                        <option value="doble">Doble</option>
                        <option value="suite">Suite</option>
                    </select>
                </div>
                
                <!-- Habitaciones Simples -->
                <div id="simples" class="habitaciones-container">
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '1', '120')">
                        <img src="images/1_cama.jpeg" alt="Simple 1">
                        <div class="precio">120 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '2', '130')">
                        <img src="images/1_cama_simple.jpeg" alt="Simple 2">
                        <div class="precio">130 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '3', '125')">
                        <img src="images/1_cama_terraza.jpeg" alt="Simple 3">
                        <div class="precio">125 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '4', '135')">
                        <img src="images/1_cama_jacuzzi.jpeg" alt="Simple 4">
                        <div class="precio">135 Bs</div>
                    </div>
                </div>
                
                <!-- Habitaciones Dobles -->
                <div id="dobles" class="habitaciones-container">
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '5', '200')">
                        <img src="images/2_camas.png" alt="Doble 1">
                        <div class="precio">200 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '6', '210')">
                        <img src="images/2_camas_pequeño.jpeg" alt="Doble 2">
                        <div class="precio">210 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '7', '220')">
                        <img src="images/2_camas_simple.jpeg" alt="Doble 3">
                        <div class="precio">220 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '8', '215')">
                        <img src="images/matrimonial.jpeg" alt="Doble 4">
                        <div class="precio">215 Bs</div>
                    </div>
                </div>
                
                <!-- Habitaciones Suite -->
                <div id="suites" class="habitaciones-container">
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '9', '350')">
                        <img src="images/3_camas.jpeg" alt="Suite 1">
                        <div class="precio">350 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '10', '360')">
                        <img src="images/3_camas_familiar.jpeg" alt="Suite 2">
                        <div class="precio">360 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '11', '370')">
                        <img src="images/suit_1cama.jpeg" alt="Suite 3">
                        <div class="precio">370 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '12', '380')">
                        <img src="images/semisuit_1cama.jpeg" alt="Suite 4">
                        <div class="precio">380 Bs</div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="personas">Cantidad de personas</label>
                    <input type="number" id="personas" name="personas" min="1" required>
                </div>
                
                <div class="form-group submit-btn">
                    <button type="submit" class="btn">Realizar Reserva</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Habitaciones Disponibles -->
    <section class="container" id="habitaciones">
        <div class="section-title">
            <h2>Tipos de Habitaciones</h2>
            <p>Descubre nuestras exclusivas habitaciones diseñadas para tu comodidad</p>
        </div>
        
        <?php
        include 'conexion.php';

        // Verificar si la conexión fue exitosa
        if (!$con) {
            echo "<div class='message error'>Error de conexión a la base de datos: " . mysqli_connect_error() . "</div>";
        } else {
            // Get room information with default prices
            $sql = "SELECT 
                        h.id, 
                        h.numero, 
                        h.piso, 
                        h.estado, 
                        t.nombre AS tipo_habitacion,
                        COALESCE(t.max_personas, 2) as max_personas,
                        CASE 
                            WHEN t.nombre LIKE '%individual%' OR t.nombre LIKE '%simple%' THEN 120
                            WHEN t.nombre LIKE '%doble%' OR t.nombre LIKE '%estandar%' THEN 200
                            WHEN t.nombre LIKE '%suite%' OR t.nombre LIKE '%presidencial%' OR t.nombre LIKE '%ejecutiva%' THEN 350
                            WHEN t.nombre LIKE '%familiar%' THEN 280
                            ELSE 150 
                        END as precio_habitacion
                    FROM habitaciones h
                    INNER JOIN tipos_habitacion t ON h.tipo_id = t.id
                    ORDER BY t.nombre, h.numero";

            $resultado = $con->query($sql);

            if ($resultado === false) {
                echo "<div class='message error'>Error en la consulta SQL: " . $con->error . "</div>";
            } elseif ($resultado->num_rows > 0) {
                $tipo_actual = "";
                $contador = 0;
                $bloque_id = 0;

                while ($fila = $resultado->fetch_assoc()) {
                    if ($tipo_actual != $fila['tipo_habitacion']) {
                        if ($contador > 0) {
                            echo "</div>";  
                            if ($contador > 4) {
                                echo "<div class='ver-mas-btn'><button onclick=\"mostrarMas('bloque{$bloque_id}', event)\">Ver más</button></div>";
                            }
                            echo "</div>"; 
                        }

                        $bloque_id++;
                        $tipo_actual = $fila['tipo_habitacion'];
                        $contador = 0;

                        echo "<div class='seccion-tipo'>";
                        echo "<h2 class='titulo-tipo'>{$tipo_actual}</h2>";
                        echo "<div class='habitaciones-grid'>";
                    }

                    $contador++;
                    $clase_oculta = $contador > 4 ? "bloque-oculto bloque{$bloque_id}" : "";
                    $estilo_oculto = $contador > 4 ? "style='display:none;'" : "";

                    // Obtener la primera imagen del directorio si no hay imagen específica
                    $imagen = 'images/default.jpg';
                    if (!empty($fila['imagen'])) {
                        $imagen = 'images/habitaciones/'.$fila['imagen'];
                    } else {
                        // Intentar obtener la primera imagen del directorio
                        $imagenes = glob('images/habitaciones/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                        if (!empty($imagenes)) {
                            $imagen = $imagenes[0];
                        }
                    }

                    echo "<div class='habitacion-card {$clase_oculta}' {$estilo_oculto} data-habitacion-id='{$fila['id']}' data-precio='{$fila['precio_habitacion']}'>";
                    echo "<img src='{$imagen}' alt='Habitación' class='habitacion-img'>";
                    echo "<div class='habitacion-info'>";
                    echo "<h4>Habitación {$fila['numero']} - {$fila['tipo_habitacion']}</h4>";
                    echo "<p><i class='fas fa-map-marker-alt'></i> Piso: {$fila['piso']}</p>";
                    echo "<p><i class='fas fa-users'></i> Máx. personas: {$fila['max_personas']}</p>";
                    echo "<p><i class='fas fa-tag'></i> Precio: <strong>Bs {$fila['precio_habitacion']}</strong> por noche</p>";
                    echo "<p>Estado: <span class='estado estado-{$fila['estado']}'>{$fila['estado']}</span></p>";

                    if (strtolower($fila['estado']) === 'disponible') {
                        echo "<a href='javascript:reservarDirectamente({$fila['id']})' class='btn-reservar'><i class='fas fa-calendar-check'></i> Reservar Ahora</a>";
                    } else {
                        echo "<span class='no-disponible'><i class='fas fa-times-circle'></i> No disponible</span>";
                    }

                    echo "</div>"; 
                    echo "</div>";   
                }

                echo "</div>";  
                if ($contador > 4) {
                    echo "<div class='ver-mas-btn'><button onclick=\"mostrarMas('bloque{$bloque_id}', event)\">Ver más</button></div>";
                }
                echo "</div>";  

            } else {
                echo "<div class='message info'>No hay habitaciones registradas.</div>";
            }

            $con->close();
        }
        ?>
    </section>
    
    <!-- Mis Reservas -->
    <section class="container" id="mis-reservas">
        <div class="section-title">
            <h2>Mis Reservas</h2>
            <p>Consulta el estado de tus reservas realizadas</p>
        </div>
        
        <div class="reservations-container">
            <div class="reservation-header">
                <div>ID</div>
                <div>Nombre</div>
                <div>Habitación</div>
                <div>Fecha Entrada</div>
                <div>Fecha Salida</div>
                <div>Estado</div>
            </div>
            
            <?php
            include 'conexion.php';
            
            if ($con) {
                // Consulta para obtener las reservas con información del usuario y habitación
                $sql = "SELECT r.id, r.fecha_inicio, r.fecha_fin, r.estado, 
                               u.nombre AS usuario, h.numero AS habitacion,
                               t.nombre AS tipo_habitacion
                        FROM reservas r
                        JOIN usuarios u ON r.usuario_id = u.id
                        JOIN habitaciones h ON r.habitacion_id = h.id
                        JOIN tipos_habitacion t ON h.tipo_id = t.id
                        ORDER BY r.fecha_inicio DESC";
                
                $resultado = $con->query($sql);
                
                if ($resultado && $resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<div class='reservation-item'>";
                        echo "<div>{$fila['id']}</div>";
                        echo "<div>{$fila['usuario']}</div>";
                        echo "<div>Habitación {$fila['habitacion']} - {$fila['tipo_habitacion']}</div>";
                        echo "<div>" . date('d/m/Y', strtotime($fila['fecha_inicio'])) . "</div>";
                        echo "<div>" . date('d/m/Y', strtotime($fila['fecha_fin'])) . "</div>";
                        echo "<div><span class='status {$fila['estado']}'>{$fila['estado']}</span></div>";
                        echo "</div>";
                    }
                } else {
                    echo "<div class='reservation-item' style='grid-column: 1 / -1; text-align: center; padding: 40px;'>";
                    echo "<p style='color: #666; font-size: 1.1rem;'>No hay reservas registradas aún.</p>";
                    echo "<p style='color: #999;'>Realiza tu primera reserva usando el formulario de arriba.</p>";
                    echo "</div>";
                }
                
                $con->close();
            } else {
                echo "<div class='reservation-item' style='grid-column: 1 / -1; text-align: center; padding: 40px;'>";
                echo "<p style='color: #e74c3c;'>Error de conexión a la base de datos.</p>";
                echo "</div>";
            }
            ?>
        </div>
    </section>
    
    <!-- Modal de Confirmación -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Confirmación de Reserva</h2>
            <div class="reservation-details" id="reservationDetails"></div>
            <div style="text-align: center; margin-top: 20px;">
                <button id="confirmBtn" class="btn">Confirmar Reserva</button>
                <button id="cancelBtn" class="btn btn-logout" style="margin-left: 10px;">Cancelar</button>
            </div>
        </div>
    </div>
    
    <script>
        // Función para manejar el clic en el botón de reserva
        function reservarDirectamente(habitacionId) {
            console.log('Función reservarDirectamente llamada con ID:', habitacionId);
            
            // Encontrar la tarjeta de la habitación
            const habitacionCard = document.querySelector(`.habitacion-card[data-habitacion-id="${habitacionId}"]`);
            console.log('Tarjeta de habitación encontrada:', habitacionCard);
            
            if (habitacionCard) {
                // Verificar si existe el elemento de reserva
                const seccionReserva = document.getElementById('reservar');
                console.log('Sección de reserva encontrada:', seccionReserva);
                
                if (seccionReserva) {
                    // Desplazarse a la sección de reserva
                    seccionReserva.scrollIntoView({ behavior: 'smooth' });
                    console.log('Desplazamiento a la sección de reserva realizado');
                } else {
                    console.error('No se encontró la sección de reserva con ID "reservar"');
                }
                
                // Obtener el precio del atributo data-precio
                const precio = habitacionCard.getAttribute('data-precio') || '0';
                console.log('Precio obtenido:', precio);
                
                // Actualizar el formulario con los datos de la habitación
                const campoHabitacionId = document.getElementById('habitacion_id');
                const campoPrecioHabitacion = document.getElementById('precio_habitacion');
                
                console.log('Campos del formulario:', {campoHabitacionId, campoPrecioHabitacion});
                
                if (campoHabitacionId) campoHabitacionId.value = habitacionId;
                if (campoPrecioHabitacion) campoPrecioHabitacion.value = precio;
                
                console.log('Formulario actualizado con ID:', habitacionId, 'y precio:', precio);
                
                // Obtener el tipo de habitación de la tarjeta
                const tipoHabitacionElement = habitacionCard.closest('.seccion-tipo').querySelector('.titulo-tipo');
                const tipoHabitacion = tipoHabitacionElement ? tipoHabitacionElement.textContent.toLowerCase() : '';
                
                console.log('Tipo de habitación encontrado:', tipoHabitacion);
                
                // Seleccionar el tipo de habitación correspondiente en el formulario
                const selectHabitacion = document.getElementById('habitacion');
                if (selectHabitacion) {
                    if (tipoHabitacion.includes('individual') || tipoHabitacion.includes('simple')) {
                        selectHabitacion.value = 'simple';
                    } else if (tipoHabitacion.includes('doble') || tipoHabitacion.includes('estandar')) {
                        selectHabitacion.value = 'doble';
                    } else if (tipoHabitacion.includes('suite') || tipoHabitacion.includes('presidencial') || tipoHabitacion.includes('ejecutiva')) {
                        selectHabitacion.value = 'suite';
                    }
                    
                    // Mostrar las habitaciones del tipo seleccionado
                    mostrarHabitaciones();
                }
                
                // Resaltar la habitación seleccionada en el formulario
                setTimeout(() => {
                    const habitaciones = document.querySelectorAll('.habitacion-btn');
                    habitaciones.forEach(hab => {
                        const onclickAttr = hab.getAttribute('onclick');
                        if (onclickAttr && onclickAttr.includes(habitacionId)) {
                            hab.classList.add('selected');
                            hab.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        } else {
                            hab.classList.remove('selected');
                        }
                    });
                }, 500);
                
            } else {
                console.error('No se encontró la tarjeta de habitación con ID:', habitacionId);
                alert('Error: No se pudo encontrar la información de la habitación seleccionada.');
            }
        }
        
        // Función para inicializar la página
        document.addEventListener('DOMContentLoaded', function() {
            // Configurar fechas mínimas
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('fecha_entrada').min = today;
            document.getElementById('fecha_salida').min = today;
            
            // Actualizar fecha mínima de salida cuando cambia la fecha de entrada
            document.getElementById('fecha_entrada').addEventListener('change', function() {
                const fechaEntrada = this.value;
                document.getElementById('fecha_salida').min = fechaEntrada;
                if (document.getElementById('fecha_salida').value < fechaEntrada) {
                    document.getElementById('fecha_salida').value = fechaEntrada;
                }
            });
        });

        // Función para mostrar las habitaciones según el tipo seleccionado
        function mostrarHabitaciones() {
            const tipo = document.getElementById('habitacion').value;
            document.getElementById('simples').style.display = 'none';
            document.getElementById('dobles').style.display = 'none';
            document.getElementById('suites').style.display = 'none';
            
            if (tipo === 'simple') {
                document.getElementById('simples').style.display = 'grid';
            } else if (tipo === 'doble') {
                document.getElementById('dobles').style.display = 'grid';
            } else if (tipo === 'suite') {
                document.getElementById('suites').style.display = 'grid';
            }
            
            // Deseleccionar cualquier habitación previamente seleccionada
            document.querySelectorAll('.habitacion-btn').forEach(btn => {
                btn.classList.remove('selected');
            });
            
            // Limpiar campos ocultos
            document.getElementById('habitacion_id').value = '';
            document.getElementById('precio_habitacion').value = '';
        }
        
        // Función para seleccionar una habitación
        function seleccionarHabitacion(element, id, precio) {
            // Quitar la selección de todas las habitaciones del mismo tipo
            const tipoContenedor = element.closest('.habitaciones-container');
            tipoContenedor.querySelectorAll('.habitacion-btn').forEach(btn => {
                btn.classList.remove('selected');
            });
            
            // Seleccionar la habitación actual
            element.classList.add('selected');
            
            // Actualizar los campos ocultos
            document.getElementById('habitacion_id').value = id;
            document.getElementById('precio_habitacion').value = precio;
            
            // Mostrar información de la habitación seleccionada
            const habitacionInfo = element.querySelector('.habitacion-info') || element;
            const nombreHabitacion = habitacionInfo.querySelector('h4')?.textContent || 'Habitación ' + id;
            const precioHabitacion = habitacionInfo.querySelector('.precio')?.textContent || precio + ' Bs';
            
            // Actualizar el selector de tipo de habitación
            const tipoHabitacion = element.closest('[id$="s"]').id.replace('s', ''); // Obtener 'simple', 'doble' o 'suite'
            document.getElementById('habitacion').value = tipoHabitacion;
            
            // Mostrar mensaje de selección
            const mensaje = document.getElementById('mensaje-seleccion');
            if (mensaje) {
                mensaje.textContent = `Has seleccionado: ${nombreHabitacion} - ${precioHabitacion}`;
                mensaje.style.display = 'block';
            }
        }
        
        // Función para mostrar más habitaciones
        function mostrarMas(bloqueId, event) {
            const boton = event.target;
            const contenedor = boton.closest('.seccion-tipo');
            const elementosOcultos = contenedor.querySelectorAll('.' + bloqueId);
            
            let todosMostrados = true;
            elementosOcultos.forEach(elemento => {
                if (elemento.style.display === 'none' || !elemento.style.display) {
                    elemento.style.display = 'block';
                    todosMostrados = false;
                }
            });
            
            // Si todos los elementos están mostrados, ocultar los que no son los primeros 4
            if (todosMostrados) {
                let contador = 0;
                const todasLasHabitaciones = contenedor.querySelectorAll('.habitacion-card');
                todasLasHabitaciones.forEach((habitacion, index) => {
                    if (index >= 4) {
                        habitacion.style.display = 'none';
                    }
                });
                boton.textContent = 'Ver más';
            } else {
                boton.textContent = 'Ver menos';
            }
        }
        
        // Función para mostrar notificación
        function mostrarNotificacion(mensaje, tipo = 'success') {
            const notificacion = document.createElement('div');
            notificacion.className = `message ${tipo}`;
            notificacion.textContent = mensaje;
            
            // Insertar al inicio del contenedor de reserva
            const reservaContainer = document.querySelector('.reserva-container');
            if (reservaContainer) {
                reservaContainer.insertBefore(notificacion, reservaContainer.firstChild);
                
                // Remover después de 5 segundos
                setTimeout(() => {
                    if (notificacion.parentNode) {
                        notificacion.parentNode.removeChild(notificacion);
                    }
                }, 5000);
            }
        }
        
        // Manejar el envío del formulario
        document.getElementById('reserva-form').addEventListener('submit', function(e) {
            console.log('Formulario enviado - Evento capturado');
            e.preventDefault();
            
            // alert('Formulario enviado - Validando...');
            
            // Validar que se haya seleccionado una habitación
            const habitacionId = document.getElementById('habitacion_id').value;
            console.log('ID de habitación:', habitacionId);
            
            // if (!habitacionId) {
            //     alert('Por favor, seleccione una habitación');
            //     return;
            // }
            
            // Validar fechas
            const fechaEntrada = new Date(document.getElementById('fecha_entrada').value);
            const fechaSalida = new Date(document.getElementById('fecha_salida').value);
            const hoy = new Date();
            hoy.setHours(0, 0, 0, 0);
            
            // if (fechaEntrada < hoy) {
            //     alert('La fecha de entrada no puede ser anterior a hoy');
            //     return;
            // }
            
            // if (fechaEntrada >= fechaSalida) {
            //     alert('La fecha de salida debe ser posterior a la fecha de entrada');
            //     return;
            // }
            
            // Validar número de personas
            const personas = parseInt(document.getElementById('personas').value);
            
            if (personas < 1) {
                alert('Debe especificar al menos 1 persona');
                return;
            }
            
            // alert('Todas las validaciones pasaron, enviando reserva...');
            
            // Obtener los datos del formulario
            const formData = new FormData(this);
            const datosReserva = Object.fromEntries(formData.entries());
            
            // Calcular días y precio total
            const dias = Math.ceil((fechaSalida - fechaEntrada) / (1000 * 60 * 60 * 24));
            const precioTotal = dias * parseFloat(datosReserva.precio_habitacion);
            
            // Agregar el precio total a los datos de la reserva
            datosReserva.precio_total = precioTotal;
            
            // Enviar directamente sin modal
            enviarReserva(datosReserva);
        });
        
        // Función para enviar la reserva al servidor
        function enviarReserva(datosReserva) {
            fetch('guardar_reserva.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(datosReserva)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('¡Reserva realizada con éxito! ');
                    // Recargar la página después de 2 segundos
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                } else {
                    alert('Error al realizar la reserva: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al conectar con el servidor');
            });
        }
        
        // Función para cerrar sesión
        function cerrarSesion() {
            alert('Sesión cerrada');
        }
    </script>
    <script src="script.js"></script>
</body>
</html>