<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>

</head>


<div class="modal fade" id="editar-medico<?php echo $fila['id_medico']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Editar el registro de <?php echo $fila['Nombre']; ?></h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="includes/functions-m.php" method="POST">




                <div class="row">

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">identificador</label>
                                <input type="text" id="id_medico" name="id_medico" class="form-control" value="<?php echo $fila['id_medico']; ?>" required>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $fila['Nombre']; ?>" style="text-transform: uppercase;" required>

                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Apellido Paterno</label>
                                <input type="text" id="apellido_p" name="apellido_p" class="form-control" value="<?php echo $fila['Apellido_p']; ?>" style="text-transform: uppercase;" required>
                            </div>
                        </div>
                   


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Apellido Materno</label>
                                <input type="text" id="apellido_m" name="apellido_m" class="form-control" value="<?php echo $fila['Apellido_m']; ?>" style="text-transform: uppercase;" required>
                            </div>
                        </div>
                   

                    

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Correo</label>
                                <input type="text" id="correo" name="correo" class="form-control" value="<?php echo $fila['Correo']; ?>" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="text" id="telefono" name="telefono" class="form-control"
                                maxlength="10" pattern="\d{10}" inputmode="numeric"
                                oninput="validatePhoneNumber(this)" value="<?php echo $fila['Telefono']; ?>" required>
                                <div class="invalid-feedback">
                                    Se necesitan exactamente 10 números para el teléfono.
                                </div>
                            </div>
                        </div>





                        
                    </div>            

                    <input type="hidden" name="accion" value="editar">
                    <input type="hidden" name="id_medico" value="<?php echo $fila['id_medico']; ?>">
                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Editar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>


            </form>


            <script>
            function validatePhoneNumber(input) {
                const value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
                input.value = value;
                if (value.length !== 10) {
                    input.setCustomValidity('Se necesitan exactamente 10 números para el teléfono.');
                } else {
                    input.setCustomValidity('');
                }
            }
            </script>



        </div>
    </div>
</div>
</div>




</html>