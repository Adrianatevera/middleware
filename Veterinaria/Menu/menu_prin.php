<?php
include 'middleware.php';
registrarActividad(); // Llama al middleware para registrar la actividad
?>


<?php
//seguridad de sessiones paginacion
session_start();
error_reporting(0);
$varsesion= $_SESSION['username'];
if($varsesion== null || $varsesion=""){
    header("location:../index.php");
    die();
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>

    <link rel="stylesheet" href="./css/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/custom.css"> <!-- Enlace al archivo de estilos personalizados -->
    
    <style>
        /* Estilos para la estructura de dos columnas */
        .container {
            display: flex;
            height: 100vh; /* Para ocupar toda la altura de la ventana */
        }
        .menu-column {
            width: 250px; /* Ancho fijo para la columna del menú */
            background-color: #ffffff; /* Color de fondo del menú */
            border-right: 1px solid #ccc; /* Borde derecho para separar del contenido principal */
        }
        .content-column {
            flex: 1; /* La columna del contenido principal ocupa todo el espacio restante */
            padding: 20px;
            position: relative; /* Para posicionar el texto encima de la imagen */
            overflow: hidden; /* Para manejar correctamente el contenido que desborda */
        }
        .banner-img {
            width: 100%;
            height: auto;
            display: block; /* Para asegurar que la imagen ocupe todo el ancho disponible */
            margin-bottom: 20px; /* Espacio opcional para separar el banner del contenido */
        }
        .banner-text {
            position: absolute;
            top: 50%; /* Ajusta la posición vertical del texto al centro */
            left: 50%; /* Ajusta la posición horizontal del texto al centro */
            transform: translate(-50%, -50%); /* Centra el texto tanto vertical como horizontalmente */
            color: #ffffff; /* Color del texto */
            font-size: 36px; /* Tamaño de fuente del texto aumentado */
            background-color: #df7272a4; /* Fondo semitransparente para resaltar el texto */
            padding: 20px; /* Espaciado interno del texto */
            border-radius: 5px; /* Bordes redondeados del contenedor del texto */
            text-align: center; /* Centra el texto dentro del contenedor */
        }
    </style>
</head>
<body class="bg-bg-project font-poppins">

    <div class="container">
        <nav class="menu-column rounded-r-xl flex flex-col justify-between">
            <ul>
                <li href="#" class="link-parent">
                    <div class="flex gap-3 py-4 items-center">
                        <img src="./img/veterinaria.jpeg" alt="Logo de Grupo Cocei" width="50" height="50">
                        <span>Alfa veterinaria</span>
                    </div>
                </li>

                <li class="link-parent">
                    <a class="flex gap-3 py-4" href="menu_prin.php">
                        <img src="./img/pagina-de-inicio.png" alt="" height="10PX" width="22PX">
                        Inicio    
                    </a>
                </li>

                <li class="link-parent data-[toggle]:grid-rows-[max-content_1fr]" data-dropdown>
                    <a class="flex gap-3 py-4" data-info="dropdown" href="SUBMENUS/Dueños.php">
                        <img src="./img/dueños.png" alt="" height="10PX" width="27PX">
                        Dueños
                    </a>
                </li>

                <li class="link-parent" >
                    <a class="flex gap-3 py-4" href="SUBMENUS/Pacientes.php">
                        <span class="insumos-icon"><img src="./img/pacientes.png" alt="" height="30PX" width="92PX"></span>
                        Pacientes
                    </a>
                </li>

                

                <li class="link-parent">
                    <a class="flex gap-3 py-4" href="../salir.php">
                        <img src="./img/cerrar-sesion.png" alt="" height="10PX" width="22PX">
                        Cerrar Sesión
                    </a>
                </li>

                <li class="link-parent">
                    <a class="flex gap-3 py-4" href="actividad.php">
                        <img src="./img/cerrar-sesion.png" alt="" height="10PX" width="22PX">
                        Actividades
                    </a>
                </li>

                <li class="link-parent">
                    <a class="flex gap-3 py-4">
                        Usuario:<?php echo htmlspecialchars($_SESSION['username']); ?>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="content-column bg-gray-100">
            <!-- Banner de imagen -->
            <img src="./img/como-hacer-clinica-veterinaria-dogfriendly-scaled.jpg" alt="Banner de la veterinaria" class="banner-img">
            
            <!-- Texto centrado encima de la imagen -->
            <div class="banner-text">
                Bienvenidos a Alfa Veterinaria
            </div>

            <!-- Contenido principal -->
        </div>
    </div>

    <script src="./js/app.js" defer></script>
</body>
</html>