<?php
include('../../../conexion.php');

if (isset($_POST['registrar'])) {
    if (empty($_POST["num_diagnostico"]) or empty($_POST["codigo_paciente"]) or empty($_POST["id_dueño"]) or empty($_POST["id_medico"]) or empty($_POST["fecha"]) or empty($_POST["padecimiento"]) or empty($_POST["sintomas"]) or empty($_POST["comentarios"]) ) {
        
        echo '
                <script>
                alert("Uno de los campos esta vacio");
                location.href="../informes.php";
                </script>';

    } else {
        $codigo = $_POST["num_diagnostico"];

        // Consulta para verificar si el usuario ya existe
        $consulta_existencia = $conexion->query("SELECT * FROM diagnostico WHERE Num_diagnostico = '$codigo'");
        if ($consulta_existencia->num_rows > 0) {

            echo '
                <script>
                alert("¡¡¡El diagnostico ya existe en la base de datos!!!");
                location.href="../informes.php";
                </script>';

        } else {
            $num_diagnostico = $_POST["num_diagnostico"];
            $codigo_paciente = $_POST["codigo_paciente"];
            $id_dueño = $_POST["id_dueño"];
            $id_medico = $_POST["id_medico"];
            $fecha = $_POST["fecha"];
            $padecimiento = $_POST["padecimiento"];
            $sintomas = $_POST["sintomas"];
            $comentarios = $_POST["comentarios"];


            // Inserta el nuevo usuario en la base de datos
            $sql = $conexion->query("INSERT INTO diagnostico (Num_diagnostico, P_codigo, id_dueño, id_medico, Fecha, Padecimiento, Sintomas, Comentarios) VALUES ('$num_diagnostico', '$codigo_paciente', '$id_dueño', '$id_medico', '$fecha', '$padecimiento', '$sintomas', '$comentarios')");
            
            if ($sql == true) {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Diagnostico registrado correctamente',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 1500
                    }).then(() => {
                        location.assign('../reportes/informes.php');
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
                        location.assign('../informes.php');
                    });
            });
                </script>";
            }
        }
    }
}
?>
