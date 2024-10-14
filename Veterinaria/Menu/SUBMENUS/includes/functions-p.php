<!-- Agrega la biblioteca de SweetAlert -->


<?php

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
            //casos de registros
        case 'editar':
            editar();
            break;
    }
}

function editar()
{

    extract($_POST);
    require_once("../../../conexion.php");

            $codigo = $_POST["codigo"];
            $alias = strtoupper($_POST["alias"]);
            $especie = strtoupper($_POST["especie"]);
            $raza = strtoupper($_POST["raza"]);
            $color = strtoupper($_POST["color"]);
            $nacimiento = $_POST["nacimiento"];
            $peso_medio = $_POST["peso_medio"];
            $peso_actual = $_POST["peso_actual"];


    $consulta = "UPDATE Pacientes SET P_codigo = '$codigo', Alias = '$alias', Especie = '$especie', Raza = '$raza', Color = '$color', Fecha_Nac = '$nacimiento', Peso_medio = '$peso_medio', Peso_actual = '$peso_actual' WHERE P_codigo = '$codigo' ";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El registro fue actualizado correctamente',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../Pacientes.php');
              });
    });
        </script>";
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Algo salio mal. Intenta de nuevo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../Pacientes.php');
              });
    });
        </script>";
    }
}
