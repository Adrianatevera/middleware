<?php
// Seguridad de sesiones y paginación
session_start();
error_reporting(0);
$varsesion = $_SESSION['username'];
if ($varsesion == null || $varsesion == "") {
    header("location:../../index.php");
    die();
}

// Conexión a la base de datos
require_once "../../conexion.php";

// Lógica del buscador
$busqueda = "";
if (isset($_POST['buscar'])) {
    $busqueda = mysqli_real_escape_string($conexion, $_POST['busqueda']);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="stylesheet" href="../css/output.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }
        nav {
            width: 250px;
            min-width: 250px;
            height: 100%;
            overflow-y: auto;
            border-right: 1px solid #ccc;
        }
        .content {
            flex-grow: 1;
            overflow-y: auto;
            padding: 20px;
            width: 100%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body class="bg-bg-project font-poppins">
    <nav class="bg-white h-screen rounded-r-xl">
        <!-- Menú lateral -->
        <ul class="px-12">

            <li href="#" class="link-parent">
                <div class="flex gap-3 py-4 items-center">
                    <img src="../img/veterinaria.jpeg" alt="Logo de Grupo Cocei" width="50" height="50">
                    <span>Alfa veterinaria</span>
                </div>
            </li>

            <li class="link-parent">
                <a class="flex gap-3 py-4" href="../menu_prin.php">
                    <img src="../img/pagina-de-inicio.png" alt="" height="10PX" width="22PX"> Inicio
                </a>
            </li>
            
            <li class="link-parent">
                <a class="flex gap-3 py-4" href="Dueños.php">
                    <img src="../img/dueños.png" alt="" height="10PX" width="27PX"> Dueños
                </a>
            </li>

            <li class= "link-parent" >
                <a class= "flex gap-3 py-4"  href="Pacientes.php">
                <span class="insumos-icon"><img src="../img/pacientes.png" alt="" height="30PX" width="92PX"></span>
                    Pacientes
                </a>
            </li>

            <li class="link-parent">
                <a class="flex gap-3 py-4" href="Administradores.php">
                <img src="../imG/administradores.png" alt="" height="10PX" width="22PX">
                    Administradores
                </a>
            </li>


            <li class="link-parent">
                <a class="flex gap-3 py-4" href="Medicos.php">
                <img src="../imG/medicos.png" alt="" height="10PX" width="22PX">
                    Medicos
                </a>
            </li>

            

            <li class="link-parent">
                <a class="flex gap-3 py-4" href="reportes/informes.php">
                <img src="../img/diagnosticos.png" alt=""height="10PX" width="22PX">
                    Diagnostico
                </a>
            </li>

            <li class="link-parent">
                <a class="flex gap-3 py-4" href="reportes_receta/informes_receta.php">
                <img src="../img/Recetas.png" alt=""height="10PX" width="22PX">
                    Receta
                </a>
            </li>

            <li class="link-parent">
                <a class="flex gap-3 py-4" href="../../salir.php">
                    <img src="../img/cerrar-sesion.png" alt="" height="10PX" width="22PX">
                    Cerrar Sesión
                </a>
            </li>

            
    
            </ul>
    </nav>

    <div class="content">
        <h1>DUEÑOS</h1>

        <!-- Formulario de búsqueda -->
        <form method="POST" class="mb-4">
            <div class="input-group">
                <input type="text" name="busqueda" class="form-control" placeholder="Buscar por nombre o apellido" value="<?php echo $busqueda; ?>">
                <button type="submit" name="buscar" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <!-- Tabla de resultados -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Num_cuenta</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Codigo postal</th>
                    <th>RFC</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta SQL con búsqueda
                $consulta = mysqli_query($conexion, "SELECT * FROM dueños WHERE Nombre LIKE '%$busqueda%' OR Apellido_p LIKE '%$busqueda%'");

                // Mostrar los resultados
                while ($fila = mysqli_fetch_assoc($consulta)):
                ?>
                <tr>
                    <td><?php echo $fila['id_dueño']; ?></td>
                    <td><?php echo $fila['Nombre']; ?></td>
                    <td><?php echo $fila['Apellido_p']; ?></td>
                    <td><?php echo $fila['Apellido_m']; ?></td>
                    <td><?php echo $fila['Num_cuenta']; ?></td>
                    <td><?php echo $fila['Direccion']; ?></td>
                    <td><?php echo $fila['Telefono']; ?></td>
                    <td><?php echo $fila['Correo']; ?></td>
                    <td><?php echo $fila['Codigo_postal']; ?></td>
                    <td><?php echo $fila['RFC']; ?></td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar-dueños<?php echo $fila['id_dueño']; ?>">
                            <i class="fa fa-edit"></i>
                        </button>
                    </td>
                </tr>
                <?php include "Funciones/editar-d.php"; ?>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <?php include "Funciones/agregar-dueños.php"; ?>
</body>
</html>
