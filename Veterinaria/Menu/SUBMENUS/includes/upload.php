<?php
include('../../../conexion.php');

if (isset($_POST['registrar'])) {
    if (empty($_POST["curp"]) or empty($_POST["nombre"]) or empty($_POST["apellido_p"]) or empty($_POST["apellido_m"]) or empty($_POST["puesto"]) or empty($_POST["correo"]) or empty($_POST["celular"]) or empty($_POST["direccion"])) {
        
        echo '
                <script>
                alert("Uno de los campos esta vacio");
                location.href="../trabajadores.php";
                </script>';

    } else {
        $curp = $_POST["curp"];

        // Consulta para verificar si el usuario ya existe
        $consulta_existencia = $conexion->query("SELECT * FROM trabajadores WHERE curp = '$curp'");
        if ($consulta_existencia->num_rows > 0) {

            echo '
                <script>
                alert("¡¡¡El Trabajador ya existe en la base de datos!!!");
                location.href="../Trabajadores.php";
                </script>';

        } else {
            $curp = $_POST["curp"];
            $nombre = $_POST["nombre"];
            $apellido_p = $_POST["apellido_p"];
            $apellido_m = $_POST["apellido_m"];
            $puesto = $_POST["puesto"];
            $correo = $_POST["correo"];
            $celular = $_POST["celular"];
            $direccion = $_POST["direccion"];

            // Inserta el nuevo usuario en la base de datos
            $sql = $conexion->query("INSERT INTO trabajadores (curp, nombre, apellido_p, apellido_m, puesto, correo, num_celular, direccion) VALUES ('$curp', '$nombre', '$apellido_p', '$apellido_m', '$puesto', '$correo', '$celular', '$direccion')");
            
            if ($sql == true) {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Trabajador registrado correctamente',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 1500
                    }).then(() => {
                        location.assign('../Trabajadores.php');
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
                        location.assign('../Trabajadores.php');
                    });
            });
                </script>";
            }
        }
    }
}
?>
