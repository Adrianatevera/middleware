<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>

</head>



<div class="modal fade" id="editar-pacientes<?php echo $fila['P_codigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Editar el registro de <?php echo $fila['Alias']; ?></h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="includes/functions-p.php" method="POST">




                <div class="row">

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Codigo</label>
                                <input type="text" id="codigo" name="codigo" class="form-control" value="<?php echo $fila['P_codigo']; ?>" required>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Alias</label>
                                <input type="text" id="alias" name="alias" class="form-control" value="<?php echo $fila['Alias']; ?>" style="text-transform: uppercase;" required>

                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Especie</label>
                                <input type="text" id="especie" name="especie" class="form-control" value="<?php echo $fila['Especie']; ?>" style="text-transform: uppercase;" required>
                            </div>
                        </div>
                   


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Raza</label>
                                <input type="text" id="raza" name="raza" class="form-control" value="<?php echo $fila['Raza']; ?>" style="text-transform: uppercase;" required>
                            </div>
                        </div>
                   

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Color</label>
                                <input type="text" id="color" name="color" class="form-control" value="<?php echo $fila['Color']; ?>" style="text-transform: uppercase;" required>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nacimiento</label>
                                <input type="date" id="nacimiento" name="nacimiento" class="form-control" value="<?php echo $fila['Fecha_Nac']; ?>" required>
                            </div>
                        </div>
                        

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="peso" class="form-label">Peso medio</label>
                                <div class="input-group">
                                    <input type="number" id="peso_medio" name="peso_medio" class="form-control" min="0" step="0.01" value="<?php echo $fila['Peso_medio']; ?>" required>
                                    <span class="input-group-text">kg</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="peso" class="form-label">Peso actual</label>
                                <div class="input-group">
                                    <input type="number" id="peso_actual" name="peso_actual" class="form-control" min="0" step="0.01" value="<?php echo $fila['Peso_actual']; ?>" required>
                                    <span class="input-group-text">kg</span>
                                </div>
                            </div>
                        </div>









                    </div>            

                    <input type="hidden" name="accion" value="editar">
                    <input type="hidden" name="P_codigo" value="<?php echo $fila['P_codigo']; ?>">
                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Editar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>


            </form>
        </div>
    </div>
</div>
</div>




</html>