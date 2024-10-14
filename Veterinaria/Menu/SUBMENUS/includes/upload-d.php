<?php
include('../../../conexion.php');

if (isset($_POST['registrar'])) {
    if (empty($_POST["codigo"]) or empty($_POST["nombre"]) or empty($_POST["paterno"]) or empty($_POST["materno"]) or empty($_POST["cuenta"]) or empty($_POST["direccion"]) or empty($_POST["telefono"]) or empty($_POST["correo"]) or empty($_POST["c_postal"]) or empty($_POST["rfc"])) {
        
        echo '
                <script>
                alert("Uno de los campos esta vacio");
                location.href="../dueños.php";
                </script>';

    } else {
        $codigo = $_POST["rfc"];

        // Consulta para verificar si el usuario ya existe
        $consulta_existencia = $conexion->query("SELECT * FROM dueños WHERE rfc = '$codigo'");
        if ($consulta_existencia->num_rows > 0) { 

            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'warning',
                        title: 'El dueño ya esta registrado en la base de datos',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 3000
                    }).then(() => {
                        location.assign('../dueños.php');
                    });
            });
                </script>";

        } else {
            $codigo = $_POST["codigo"];
            $nombre = strtoupper($_POST["nombre"]);
            $paterno = strtoupper($_POST["paterno"]);
            $materno = strtoupper($_POST["materno"]);
            $cuenta = $_POST["cuenta"];
            $direccion = strtoupper($_POST["direccion"]);
            $telefono = $_POST["telefono"];
            $correo = $_POST["correo"];
            $c_postal = $_POST["c_postal"];
            $rfc = strtoupper($_POST["rfc"]);




            // Inserta el nuevo usuario en la base de datos.
            $sql = $conexion->query("INSERT INTO dueños (id_dueño, Nombre, Apellido_p, Apellido_m, Num_cuenta, Direccion, Telefono, Correo, Codigo_postal, RFC) VALUES ('$codigo', '$nombre', '$paterno', '$materno', '$cuenta', '$direccion', '$telefono', '$correo', '$c_postal', '$rfc')");
            
            if ($sql == true) {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Dueño registrado correctamente',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 3000
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
                        timer: 3000
                    }).then(() => {
                        location.assign('../dueños.php');
                    });
            });
                </script>";
            }
        }
    }
}
?>
