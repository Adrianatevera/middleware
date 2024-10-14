<div class="modal fade" id="agregar-receta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Agregar registro</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../../SUBMENUS/includes/upload-receta.php" method="POST" enctype="multipart/form-data">

                    <div class="row">


 

                    <?php
                    // Conexión a la base de datos
                    require_once "../../../conexion.php";

                    // Consulta para obtener los pacientes
                    $consulta_pacientes = mysqli_query($conexion, "SELECT P_codigo, id_dueño, alias FROM pacientes");

                    // Consulta para obtener los médicos
                    $consulta_medicos = mysqli_query($conexion, "SELECT id_medico, nombre FROM medico");
                    ?>

                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="num_diagnostico" class="form-label">Número Receta</label>
                            <input type="text" id="num_receta" name="num_receta" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="codigo_paciente" class="form-label">Código paciente</label>
                            <select id="codigo_paciente" name="codigo_paciente" class="form-control" required onchange="actualizarIdDueño()">
                                <option value="">Seleccione un paciente</option>
                                <?php
                                while ($paciente = mysqli_fetch_assoc($consulta_pacientes)) {
                                    echo '<option value="' . $paciente['P_codigo'] . '" data-id-dueño="' . $paciente['id_dueño'] . '">' . $paciente['P_codigo'] . ' - ' . $paciente['alias'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="id_dueño" class="form-label">Id dueño</label>
                            <input type="text" id="id_dueño" name="id_dueño" class="form-control" required readonly>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="id_medico" class="form-label">Id médico</label>
                            <select id="id_medico" name="id_medico" class="form-control" required>
                                <option value="">Seleccione un médico</option>
                                <?php
                                while ($medico = mysqli_fetch_assoc($consulta_medicos)) {
                                    echo '<option value="' . $medico['id_medico'] . '">' . $medico['id_medico'] . ' - ' . $medico['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" id="fecha" name="fecha" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="medicamento" class="form-label">Medicamento</label>
                            <input type="text" id="medicamento" name="medicamento" class="form-control" required oninput="this.value = this.value.replace(/[0-9]/g, '')">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="tratamiento" class="form-label">Tratamiento</label>
                            <input type="text" id="tratamiento" name="tratamiento" class="form-control" required>
                        </div>
                    </div>


           
                    <script>
                    // JavaScript para actualizar el campo "Id dueño"
                    function actualizarIdDueño() {
                        var selectPaciente = document.getElementById('codigo_paciente');
                        var idDueño = selectPaciente.options[selectPaciente.selectedIndex].getAttribute('data-id-dueño');
                        document.getElementById('id_dueño').value = idDueño;
                    }

                    document.getElementById('fecha').valueAsDate = new Date();

                    </script>


                       



</div>


                    </div>




                   <!-- <div class="col-12">
                        <label for="yourPassword" class="form-label">Archivo (WORD & PDF)</label>
                        <input type="file" name="archivo" id="archivo" class="form-control" required>

                    </div>-->

                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="registrar">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>

            </form>
        </div>
    </div>
</div>