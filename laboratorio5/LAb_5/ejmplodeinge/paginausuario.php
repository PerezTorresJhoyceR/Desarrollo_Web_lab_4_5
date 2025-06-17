<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Paradise - Portal del Cliente</title>
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
            transition: var(--transition);
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
            transition: var(--transition);
            text-decoration: none;
        }
        
        .btn:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }
        
        .btn-logout {
            background-color: var(--accent);
        }
        
        .btn-logout:hover {
            background-color: #c0392b;
        }
        
        /* Formulario de Reserva */
        .reserva-container {
            background: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: var(--shadow);
            margin-bottom: 60px;
        }
        
        .reserva-container h2 {
            font-size: 2rem;
            margin-bottom: 25px;
            color: var(--dark);
            position: relative;
            padding-bottom: 15px;
        }
        
        .reserva-container h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--secondary);
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
            transition: var(--transition);
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
        
        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 50px 0 20px;
        }
        
        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .footer-section h3 {
            font-size: 1.4rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-section h3:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--secondary);
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: #ddd;
            text-decoration: none;
            transition: var(--transition);
        }
        
        .footer-links a:hover {
            color: var(--secondary);
            margin-left: 5px;
        }
        
        .contact-info {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .contact-info i {
            margin-right: 15px;
            color: var(--secondary);
            font-size: 1.2rem;
        }
        
        .social-links {
            display: flex;
            margin-top: 20px;
        }
        
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            color: white;
            border-radius: 50%;
            margin-right: 10px;
            transition: var(--transition);
        }
        
        .social-links a:hover {
            background: var(--secondary);
            transform: translateY(-5px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 0.9rem;
            color: #aaa;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
            }
            
            nav ul {
                margin: 20px 0;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            nav ul li {
                margin: 5px;
            }
            
            .user-controls {
                margin-top: 15px;
            }
            
            .double-column {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <div class="logo">
                <i class="fas fa-hotel"></i>
                <span>Hotel Paradise</span>
            </div>
            
            <nav>
                <ul>
                    <li><a href="#" class="active">Inicio</a></li>
                    <li><a href="#">Habitaciones</a></li>
                    <li><a href="#">Mis Reservas</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </nav>
            
            <div class="user-controls">
                <div class="user-info">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Usuario">
                    <span>Juan Pérez</span>
                </div>
                <a href="#" class="btn btn-logout">Cerrar Sesión</a>
            </div>
        </div>
    </header>

    <!-- Formulario de Reserva -->
    <section class="container">
        <div class="reserva-container">
            <h2>Reserva Online</h2>
            <form action="reservar.php" method="post">
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
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '1')">
                        <img src="images/1_cama.jpeg" alt="Simple 1">
                        <div class="precio">120 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '2')">
                        <img src="images/1_cama_simple.jpeg" alt="Simple 2">
                        <div class="precio">130 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '3')">
                        <img src="images/1_cama_terraza.jpeg" alt="Simple 3">
                        <div class="precio">125 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '4')">
                        <img src="images/1_cama_jacuzzi.jpeg" alt="Simple 4">
                        <div class="precio">135 Bs</div>
                    </div>
                </div>
                
                <!-- Habitaciones Dobles -->
                <div id="dobles" class="habitaciones-container">
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '5')">
                        <img src="images/2_camas.png" alt="Doble 1">
                        <div class="precio">200 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '6')">
                        <img src="images/2_camas_pequeño.jpeg" alt="Doble 2">
                        <div class="precio">210 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '7')">
                        <img src="images/2_camas_simple.jpeg" alt="Doble 3">
                        <div class="precio">220 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '8')">
                        <img src="images/matrimonial.jpeg" alt="Doble 4">
                        <div class="precio">215 Bs</div>
                    </div>
                </div>
                
                <!-- Habitaciones Suite -->
                <div id="suites" class="habitaciones-container">
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '9')">
                        <img src="images/3_camas.jpeg" alt="Suite 1">
                        <div class="precio">350 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '10')">
                        <img src="images/3_camas_familiar.jpeg" alt="Suite 2">
                        <div class="precio">360 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '11')">
                        <img src="images/suit_1cama.jpeg" alt="Suite 3">
                        <div class="precio">370 Bs</div>
                    </div>
                    <div class="habitacion-btn" onclick="seleccionarHabitacion(this, '12')">
                        <img src="images/semisuit_1cama.jpeg" alt="Suite 4">
                        <div class="precio">380 Bs</div>
                    </div>
                </div>
                
                <input type="hidden" id="habitacion_id" name="habitacion_id">
                
                <div class="form-group">
                    <label for="personas">Cantidad de personas</label>
                    <input type="number" id="personas" name="personas" min="1" required>
                </div>
                
                <button type="submit" class="btn">Realizar Reserva</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="footer-section">
                    <h3>Hotel Paradise</h3>
                    <p>Ofrecemos la mejor experiencia de hospedaje con servicios de primera categoría y atención personalizada.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h3>Enlaces Rápidos</h3>
                    <ul class="footer-links">
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Habitaciones</a></li>
                        <li><a href="#">Servicios</a></li>
                        <li><a href="#">Galería</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Habitaciones</h3>
                    <ul class="footer-links">
                        <li><a href="#">Simple</a></li>
                        <li><a href="#">Doble</a></li>
                        <li><a href="#">Suite</a></li>
                        <li><a href="#">Familiar</a></li>
                        <li><a href="#">Todas las habitaciones</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Contacto</h3>
                    <div class="contact-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Av. Principal 123, Ciudad, País</span>
                    </div>
                    <div class="contact-info">
                        <i class="fas fa-phone-alt"></i>
                        <span>+1 234 567 890</span>
                    </div>
                    <div class="contact-info">
                        <i class="fas fa-envelope"></i>
                        <span>info@hotelparadise.com</span>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                &copy; 2023 Hotel Paradise. Todos los derechos reservados.
            </div>
        </div>
    </footer>

    <script>
        // Mostrar las habitaciones según el tipo seleccionado
        function mostrarHabitaciones() {
            // Ocultar todos los contenedores primero
            document.getElementById('simples').style.display = 'none';
            document.getElementById('dobles').style.display = 'none';
            document.getElementById('suites').style.display = 'none';
            
            // Mostrar solo el contenedor seleccionado
            const tipo = document.getElementById('habitacion').value;
            if (tipo === 'simple') {
                document.getElementById('simples').style.display = 'grid';
            } else if (tipo === 'doble') {
                document.getElementById('dobles').style.display = 'grid';
            } else if (tipo === 'suite') {
                document.getElementById('suites').style.display = 'grid';
            }
        }
        
        // Seleccionar una habitación específica
        function seleccionarHabitacion(elemento, idHabitacion) {
            // Quitar la selección de todas las habitaciones
            const todasHabitaciones = document.querySelectorAll('.habitacion-btn');
            todasHabitaciones.forEach(hab => {
                hab.classList.remove('selected');
            });
            
            // Seleccionar la habitación clickeada
            elemento.classList.add('selected');
            
            // Actualizar el campo oculto con el ID de la habitación
            document.getElementById('habitacion_id').value = idHabitacion;
        }
        
        // Validar fechas al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            const hoy = new Date().toISOString().split('T')[0];
            document.getElementById('fecha_entrada').min = hoy;
            
            // Actualizar fecha mínima de salida cuando cambia la fecha de entrada
            document.getElementById('fecha_entrada').addEventListener('change', function() {
                const fechaEntrada = this.value;
                document.getElementById('fecha_salida').min = fechaEntrada;
            });
        });
    </script>
</body>
</html>