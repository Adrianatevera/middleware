<div class="modal fade" id="agregar-pacientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Agregar registro</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../SUBMENUS/includes/upload-p.php" method="POST" enctype="multipart/form-data">

                    <div class="row">



                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="codigo_dueño" class="form-label">Id dueño</label>
                            <select id="codigo_dueño" name="codigo_dueño" class="form-control" required>
                                <option value="">Seleccione un dueño</option>
                                <?php
                                require_once "../../conexion.php";
                                $consulta = mysqli_query($conexion, "SELECT id_dueño, nombre, apellido_p FROM dueños");
                                while ($fila = mysqli_fetch_assoc($consulta)) {
                                    $displayText = $fila['id_dueño'] . " - " . $fila['nombre'] . " " . $fila['apellido_p'];
                                    echo "<option value='".$fila['id_dueño']."' data-nombre='".$fila['nombre']."' data-apellido='".$fila['apellido_p']."'>".$displayText."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>




                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="codigo" class="form-label">Código</label>
                                <input type="text" id="codigo" name="codigo" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="alias" class="form-label">Alias</label>
                                <input type="text" id="alias" name="alias" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="especie" class="form-label">Especie</label>
                                <input type="text" id="especie" name="especie" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="raza" class="form-label">Raza</label>
                                <input type="text" id="raza" name="raza" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="color" class="form-label">Color</label>
                                <input type="text" id="color" name="color" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nacimiento" class="form-label">Nacimiento</label>
                                <input type="date" id="nacimiento" name="nacimiento" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="peso_medio" class="form-label">Peso medio</label>
                                <div class="input-group">
                                    <input type="number" id="peso_medio" name="peso_medio" class="form-control" min="0" step="0.01" required>
                                    <span class="input-group-text">kg</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="peso_actual" class="form-label">Peso actual</label>
                                <div class="input-group">
                                    <input type="number" id="peso_actual" name="peso_actual" class="form-control" min="0" step="0.01" required>
                                    <span class="input-group-text">kg</span>
                                </div>
                            </div>
                        </div>

                       



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