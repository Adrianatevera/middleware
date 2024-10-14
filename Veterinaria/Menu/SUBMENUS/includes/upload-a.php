<?php
include('../../../conexion.php');

if (isset($_POST['registrar'])) {
    if (empty($_POST["id_admin"]) or empty($_POST["nombre"]) or empty($_POST["apellido_p"]) or empty($_POST["apellido_m"]) or empty($_POST["correo"]) or empty($_POST["contraseña"])) {
        
        echo '
                <script>
                alert("Uno de los campos esta vacio");
                location.href="../Administradores.php";
                </script>';

    } else {
        $correo = $_POST["correo"];

        // Consulta para verificar si el usuario ya existe
        $consulta_existencia = $conexion->query("SELECT * FROM administradores WHERE correo = '$correo'");
        if ($consulta_existencia->num_rows > 0) {

            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'warning',
                        title: 'El administrador ya existe',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 3000
                    }).then(() => {
                        location.assign('../Administradores.php');
                    });
            });
                </script>";

        } else {
            $id_admin = $_POST["id_admin"];
            $nombre = strtoupper($_POST["nombre"]);
            $apellido_p = strtoupper($_POST["apellido_p"]);
            $apellido_m = strtoupper($_POST["apellido_m"]);
            $correo = $_POST["correo"];
            $contraseña = $_POST["contraseña"];

            // Inserta el nuevo usuario en la base de datos
            $sql = $conexion->query("INSERT INTO administradores (id_admin, nombre, apellido_p, apellido_m, correo, contraseña) VALUES ('$id_admin', '$nombre', '$apellido_p', '$apellido_m', '$correo', '$contraseña')");
            
            if ($sql == true) {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Administrador registrado correctamente',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 3000
                    }).then(() => {
                        location.assign('../Administradores.php');
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
                        location.assign('../Administradores.php');
                    });
            });
                </script>";
            }
        }
    }
}
?>
