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

            $id_medico = $_POST["id_medico"];
            $nombre = strtoupper($_POST["nombre"]);
            $apellido_p = strtoupper($_POST["apellido_p"]);
            $apellido_m = strtoupper($_POST["apellido_m"]);
            $correo = $_POST["correo"];
            $telefono = $_POST["telefono"];

    $consulta = "UPDATE Medico SET id_medico = '$id_medico', Nombre = '$nombre', Apellido_p = '$apellido_p', Apellido_m = '$apellido_m', Correo = '$correo', Telefono = '$telefono' WHERE id_medico = '$id_medico' ";

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
                location.assign('../Medicos.php');
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
                location.assign('../Medicos.php');
              });
    });
        </script>";
    }
}
