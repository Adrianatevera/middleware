<?php
sleep(1);
include('../Funciones/conexion.php');

/**
 * Nota: Es recomendable guardar la fecha en formato año - mes y dia (2022-08-25)
 * No es tan importante que el tipo de fecha sea date, puede ser varchar
 * La funcion strtotime:sirve para cambiar el forma a una fecha,
 * esta espera que se proporcione una cadena que contenga un formato de fecha en Inglés US,
 * es decir año-mes-dia e intentará convertir ese formato a una fecha Unix dia - mes - año.
*/

$fechaInit = date("Y-m-d", strtotime($_POST['f_ingreso']));
$fechaFin  = date("Y-m-d", strtotime($_POST['f_fin']));

$sqlTrabajadores = ("SELECT * FROM actas WHERE  'fecha_ingreso'  BETWEEN '$fechaInit' AND '$fechaFin' ORDER BY fecha_ingreso ASC");
$query = mysqli_query($conexion, $sqlTrabajadores);
//print_r($sqlTrabajadores);
$total   = mysqli_num_rows($query);
echo '<strong>Total: </strong> ('. $total .')';
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Numero de acta</th>
            <th scope="col">Sustentante</th>
            <th scope="col">Fecha de examen</th>
            <th scope="col">Archivo</th>
            <th scope="col">Especialidad</th>
            <th scope="col">Fecha ingreso</th>
        </tr>
    </thead>
    <?php
    while ($dataRow = mysqli_fetch_array($query)) { ?>
        <tbody>
            <tr>
                <td><?php echo $dataRow['Num_acta']; ?></td>
                <td><?php echo $dataRow['nombre_sustentante']; ?></td>
                <td><?php echo $dataRow['fecha_examen']; ?></td>
                <td><?php echo $dataRow['pdf']; ?></td>
                <td><?php echo $dataRow['id_especialidad']; ?></td>
                <td><?php echo $dataRow['fecha_ingreso']; ?></td>
            </tr>
        </tbody>
    <?php } ?>
</table>