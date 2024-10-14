<?php
include('../../../conexion.php');

if (isset($_POST['registrar'])) {
    if (empty($_POST["num_receta"]) or empty($_POST["codigo_paciente"]) or empty($_POST["id_dueño"]) or empty($_POST["id_medico"]) or empty($_POST["fecha"]) or empty($_POST["medicamento"]) or empty($_POST["tratamiento"]) ) {
        
        echo '
                <script>
                alert("Uno de los campos esta vacio");
                location.href="../informes.php";
                </script>';

    } else {
        $codigo = $_POST["num_receta"];

        // Consulta para verificar si el usuario ya existe
        $consulta_existencia = $conexion->query("SELECT * FROM receta WHERE Num_receta = '$codigo'");
        if ($consulta_existencia->num_rows > 0) {

            echo '
                <script>
                alert("¡¡¡El diagnostico ya existe en la base de datos!!!");
                location.href="../reportes_receta/informes_receta.php";
                </script>';

        } else {
            $num_receta = $_POST["num_receta"];
            $codigo_paciente = $_POST["codigo_paciente"];
            $id_dueño = $_POST["id_dueño"];
            $id_medico = $_POST["id_medico"];
            $fecha = $_POST["fecha"];
            $medicamento = $_POST["medicamento"];
            $tratamiento = $_POST["tratamiento"];


            // Inserta el nuevo usuario en la base de datos
            $sql = $conexion->query("INSERT INTO receta (Num_receta, P_codigo, id_dueño, id_medico, Fecha, medicamentos, tratamiento) VALUES ('$num_receta', '$codigo_paciente', '$id_dueño', '$id_medico', '$fecha', '$medicamento', '$tratamiento')");
            
            if ($sql == true) {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Receta registrada correctamente',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 1500
                    }).then(() => {
                        location.assign('../reportes_receta/informes_receta.php');
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
                        location.assign('../reportes_receta/informes_receta.php');
                    });
            });
                </script>";
            }
        }
    }
}
?>
