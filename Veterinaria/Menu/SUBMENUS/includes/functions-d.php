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
            $nombre = strtoupper($_POST["nombre"]);
            $paterno = strtoupper($_POST["paterno"]);
            $materno = strtoupper($_POST["materno"]);
            $cuenta = $_POST["cuenta"];
            $direccion = strtoupper($_POST["direccion"]);
            $telefono = $_POST["telefono"];
            $correo = $_POST["correo"];
            $cp = $_POST["cp"];
            $rfc = strtoupper($_POST["rfc"]);


    $consulta = "UPDATE Dueños SET id_dueño = '$codigo', Nombre = '$nombre', Apellido_p = '$paterno', Apellido_m = '$materno', Num_cuenta = $cuenta, Direccion = '$direccion', Telefono = '$telefono', correo = '$correo', Codigo_postal = '$cp', RFC = '$rfc' WHERE id_dueño = '$codigo' ";

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
                location.assign('../dueños.php');
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
                location.assign('../dueños.php');
              });
    });
        </script>";
    }
}
