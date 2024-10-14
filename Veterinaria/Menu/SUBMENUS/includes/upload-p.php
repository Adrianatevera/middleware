<?php
include('../../../conexion.php');

if (isset($_POST['registrar'])) {
    if (empty($_POST["codigo_dueño"]) or empty($_POST["codigo"]) or empty($_POST["alias"]) or empty($_POST["especie"]) or empty($_POST["raza"]) or empty($_POST["color"]) or empty($_POST["nacimiento"]) or empty($_POST["peso_medio"]) or empty($_POST["peso_actual"]) ) {
        
        echo '
                <script>
                alert("Uno de los campos esta vacio");
                location.href="../Pacientes.php";
                </script>';

    } else {
        $codigo = $_POST["alias"];

        // Consulta para verificar si el usuario ya existe
        $consulta_existencia = $conexion->query("SELECT * FROM pacientes WHERE alias = '$codigo'");
        if ($consulta_existencia->num_rows > 0) {

            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'warning',
                        title: 'El paciente ya existe en la base de datos',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 3000
                    }).then(() => {
                        location.assign('../Pacientes.php');
                    });
            });
                </script>";

        } else {
            $codigo_dueño = $_POST["codigo_dueño"];
            $codigo = $_POST["codigo"];
            $alias = strtoupper($_POST["alias"]);
            $especie = strtoupper($_POST["especie"]);
            $raza = strtoupper($_POST["raza"]);
            $color = strtoupper($_POST["color"]);
            $nacimiento = $_POST["nacimiento"];
            $peso_medio = $_POST["peso_medio"];
            $peso_actual = $_POST["peso_actual"];


            // Inserta el nuevo usuario en la base de datos
            $sql = $conexion->query("INSERT INTO pacientes (P_codigo, Alias, Especie, Raza, Color, Fecha_Nac, Peso_medio, Peso_actual, id_dueño) VALUES ('$codigo', '$alias', '$especie', '$raza', '$color', '$nacimiento', '$peso_medio', '$peso_actual', '$codigo_dueño')");
            
            if ($sql == true) {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Paciente registrado correctamente',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 3000
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
                        timer: 3000
                    }).then(() => {
                        location.assign('../Pacientes.php');
                    });
            });
                </script>";
            }
        }
    }
}
?>
