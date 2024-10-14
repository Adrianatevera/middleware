<?php
include('../../../conexion.php');

if (isset($_POST['registrar'])) {
    if (empty($_POST["id_medico"]) or empty($_POST["nombre"]) or empty($_POST["apellido_p"]) or empty($_POST["apellido_m"]) or empty($_POST["correo"]) or empty($_POST["telefono"])) {
        
        echo '
                <script>
                alert("Uno de los campos esta vacio");
                location.href="../Medicos.php";
                </script>';

    } else {
        $correo= $_POST["correo"];

        // Consulta para verificar si el usuario ya existe
        $consulta_existencia = $conexion->query("SELECT * FROM medico WHERE correo = '$correo'");
        if ($consulta_existencia->num_rows > 0) {

            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'warning',
                        title: 'El medico ya existe en la base de datos',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 3000
                    }).then(() => {
                        location.assign('../Medicos.php');
                    });
            });
                </script>";

        } else {
            $id_medico = $_POST["id_medico"];
            $nombre = strtoupper($_POST["nombre"]);
            $apellido_p = strtoupper($_POST["apellido_p"]);
            $apellido_m = strtoupper($_POST["apellido_m"]);
            $correo = $_POST["correo"];
            $telefono = $_POST["telefono"];

            // Inserta el nuevo usuario en la base de datos
            $sql = $conexion->query("INSERT INTO medico (id_medico, nombre, apellido_p, apellido_m, correo, telefono) VALUES ('$id_medico', '$nombre', '$apellido_p', '$apellido_m', '$correo', '$telefono')");
            
            if ($sql == true) {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Medico registrado correctamente',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 3000
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
                        timer: 3000
                    }).then(() => {
                        location.assign('../Medicos.php');
                    });
            });
                </script>";
            }
        }
    }
}
?>
