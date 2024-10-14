<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de bienvenida</title>
    <Link rel="stylesheet" href="public/estilos/estilos.css">
    <Link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <Link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap" rel="stylesheet">



    <!-- pNotify -->

    <link href="public/pnotify/css/pnotify.css" rel="stylesheet" />
    <link href="public/pnotify/css/pnotify.buttons.css" rel="stylesheet" />
    <link href="public/pnotify/css/custom.min.css" rel="stylesheet" />
    <!-- notify -->

    <script src="public/pnotify/js/jquery.min.js">
    </script>

    <script src="public/pnotify/js/pnotify.js">
    </script>

    <script src="public/pnotify/js/pnotify.buttons.js">
    </script>






</head>


<body>
    <h1>BIENVENIDOS, REGISTRA TU ASISTENCIA</h1>
    <h2 id="fecha"></h2>

    <?php
    include "conexion.php";
    include "controlador/controlador_registrar_asistencia.php";
    ?>


    <div class="container">
        <a class="acceso" href="index.php">Ingresar al sistemac</a>
        <p class="dni">Ingrese su DNI</p>
        <form action="" method="POST">
            <input type="text" placeholder="DNI del empleado" name="txtdni">
            <div class="botones">

                <button class="entrada" type="submit" name="btnentrada" value="0k">ENTRADA</button>
                <button class="salida" type="submit" name="btnsalida" value="0k">SALIDA</button>
            </div>
        </form>
    </div>




    <script>
        setInterval(() => {
            let fecha = new Date();
            let fechaHora = fecha.toLocalestring();
            document .getElementById("fecha").textContent = fechaHora;
        }, 1000);
    </script>
</body>

</html>