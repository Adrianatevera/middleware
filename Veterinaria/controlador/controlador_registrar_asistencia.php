<?php

    if (!empty($_POST["btnentrada"])) {
        if (!empty($_POST["txtdni"])) {
            $dni = $_POST["txtdni"];
            $consulta = $conexion->query(" select count(*) as 'total' from herramientas where H_codigo='$dni' ");
            $id = $conexion->query(" select Id_herramienta from herramientas where H_codigo='$dni' ");
            if ($consulta->fetch_object()->total > 0) {

                $fecha = date("Y-m-d h:i:s");
                $id_empleado = $id->fetch_object()->id_empleado;
                $sql = $conexion->query("insert into entradaysalida (Codigo, H_salida) values($id_empleado, '$fecha') ");

                if ($sql == true) { ?>
                    <script>
                        alert("CORRECTO: BIENVENIDO");
                </script>
            <?php } else { ?>
                <script>
                        alert("INCORRECTO: El DNI ingresado no existe");

                </script>
            <?php }
        } else { ?>
            <script>
                    alert("INCORRECTO: El DNI ingresado no existe");

            </script>
        <?php }
    } else { ?>
        <script>
                alert("INCORRECTO: El DNI ingresado no existe");

        </script>
<?php }?>


     <script>
        setTimeout(() => {
            window.history.replaceState (null, null, window.location.pathname);
        }, 0);
    </script>


<?php }

?>
