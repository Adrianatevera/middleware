<?php
//seguridad de sessiones paginacion
session_start();
error_reporting(0);
$varsesion= $_SESSION['username'];
if($varsesion== null || $varsesion=""){
    header("location:../../index.php");
    die();
}
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>



    
    <link rel="stylesheet" href="../../css/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/custom.css"> <!-- Enlace al archivo de estilos personalizados -->



 <!-- estilos ventana modal -->

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>




    <!-- -->
    










    <style>
        /* Estilos adicionales para garantizar la visibilidad y el posicionamiento */
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            overflow: hidden; /* Previene el desbordamiento del cuerpo */
        }
        nav {
            width: 250px; /* Ajusta según tus necesidades */
            min-width: 250px;
            height: 100%;
            overflow-y: auto; /* Habilita scroll si es necesario */
            border-right: 1px solid #ccc; /* Borde para separar visualmente el menú de la tabla */
        }
        .content {
            flex-grow: 1;
            overflow-y: auto;
            padding: 20px;
            width: 100%;
        }
        table {
            width: 100%;
            border-collapse: collapse; /* Elimina el espacio entre los bordes */
        }
        th, td {
            border: 1px solid #ccc; /* Agrega bordes a cada celda */
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
        
        <ul class="px-12">
            <li href="#" class="link-parent">
                <div class="flex gap-3 py-4 items-center">
                    <img src="../../img/veterinaria.jpeg" alt="Logo de Grupo Cocei" width="50" height="50">
                    <span>Alfa veterinaria</span>
                </div>
            </li>

            <li class="link-parent">
                <a class="flex gap-3 py-4" href="../../menu_prin.php">
                    <img src="../../img/pagina-de-inicio.png" alt="" height="10PX" width="22PX">
                    Inicio    
                </a>
            </li>

            <li class="link-parent data-[toggle]:grid-rows-[max-content_1fr]" data-dropdown>
                <a class="flex gap-3 py-4" data-info="dropdown"  href="../Pacientes.php">
                <span class="insumos-icon"><img src="../../img/pacientes.png" alt="" height="30PX" width="92PX"></span>
                    Pacientes
                </a>
                
            </li>

            <li class= "link-parent" >
                <a class= "flex gap-3 py-4"  href="../Dueños.php">
                <img src="../../img/dueños.png" alt="" height="10PX" width="27PX">
                    Dueños
                </a>
            </li>

            <li class="link-parent">
                <a class="flex gap-3 py-4" href="../Administradores.php">
                <img src="../../imG/administradores.png" alt="" height="10PX" width="22PX">
                    Administradores
                </a>
            </li>

            <li class="link-parent">
                <a class="flex gap-3 py-4" href="../Medicos.php">
                <img src="../../imG/medicos.png" alt="" height="10PX" width="22PX">
                    Medicos
                </a>
            </li>


            <li class="link-parent">
                <a class="flex gap-3 py-4" href="informes.php">
                <img src="../../img/diagnosticos.png" alt=""height="10PX" width="22PX">
                    Diagnostico
                </a>
            </li>

            <li class="link-parent">
                <a class="flex gap-3 py-4" href="../reportes_receta/informes_receta.php">
                <img src="../../img/Recetas.png" alt=""height="10PX" width="22PX">
                    Receta
                </a>
            </li>

            <li class="link-parent">
                <a class="flex gap-3 py-4" href="../../../salir.php">
                    <img src="../../img/cerrar-sesion.png" alt="" height="10PX" width="22PX">
                    Cerrar Sesión
                </a>
            </li>

            
    
        </ul>
    </nav>
    




    <div class="content">



    <div class="content" style="display: flex; align-items: center; justify-content: center;">
    <h1>DIAGNOSTICOS</h1>
</div>




    <section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <form action="DescargarReporte_x_diagnostico_PDF.php" method="post" accept-charset="utf-8">
                    <div class="row">
                        <div class="col">
                            <input type="text" name="Num_diagnostico" class="form-control" placeholder="Número de Diagnóstico" required>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-danger mb-2">Descargar Reporte</button>
                            <!-- Botón para abrir la ventana modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar-diagnostico"> Agregar </button>

                        </div>

                    </div>
                </form>
            </div>
            <div class="col-md-12 text-center mt-5">     
                <span id="loaderFiltro"></span>
            </div>
        </div>

    </div>
    
</section>

<!-- -->


   

        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>Numero diagnostico</th>
                    <th>Codigo paciente</th>
                    <th>Id dueño</th>
                    <th>Id medico</th>
                    <th>Fecha</th>
                    <th>Padecimiento</th>
                    <th>Sintomas</th>
                    <th>Comentarios</th>
                    


                </tr>
            </thead>
            <tbody>
                <?php
                require_once "../../../conexion.php";
                $consulta = mysqli_query($conexion, "SELECT * FROM diagnostico");
                while ($fila = mysqli_fetch_assoc($consulta)):
                ?>
                <tr>
                    <td><?php echo $fila['Num_diagnostico']; ?></td>
                    <td><?php echo $fila['P_codigo']; ?></td>
                    <td><?php echo $fila['id_dueño']; ?></td>
                    <td><?php echo $fila['id_medico']; ?></td>
                    <td><?php echo $fila['Fecha']; ?></td>
                    <td><?php echo $fila['Padecimiento']; ?></td>
                    <td><?php echo $fila['Sintomas']; ?></td>
                    <td><?php echo $fila['Comentarios']; ?></td>


                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>



    
    <?php include "../Funciones/agregar-diagnostico.php"; ?>

    
</body>
</html>



<!-- quizas    -->