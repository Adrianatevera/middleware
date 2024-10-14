<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>

</head>


<div class="modal fade" id="editar-dueños<?php echo $fila['id_dueño']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Editar el registro de <?php echo $fila['Nombre']; ?></h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="includes/functions-d.php" method="POST">




                <div class="row">

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Codigo</label>
                                <input type="text" id="codigo" name="codigo" class="form-control" value="<?php echo $fila['id_dueño']; ?>" required>
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
                                <input type="text" id="paterno" name="paterno" class="form-control" value="<?php echo $fila['Apellido_p']; ?>" style="text-transform: uppercase;" required>
                            </div>
                        </div>
                   


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Apellido Materno</label>
                                <input type="text" id="materno" name="materno" class="form-control" value="<?php echo $fila['Apellido_m']; ?>" style="text-transform: uppercase;" required>
                            </div>
                        </div>
                   

                        <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="cuenta" class="form-label">Numero de cuenta</label>
                            <input type="text" id="cuenta" name="cuenta" class="form-control"
                            maxlength="16" pattern="\d{16}" inputmode="numeric"
                            oninput="validateAccountNumber(this)" value="<?php echo $fila['Num_cuenta']; ?>" required>
                            <div class="invalid-feedback">
                                Se necesitan exactamente 16 números para el número de cuenta.
                            </div>
                        </div>
                    </div> 

                        

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Direccion</label>
                                <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $fila['Direccion']; ?>" style="text-transform: uppercase;" required>
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

                        

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Correo</label>
                                <input type="text" id="correo" name="correo" class="form-control" value="<?php echo $fila['Correo']; ?>" style="text-transform: uppercase;" required>
                            </div>
                        </div>
                        


                        <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="c_postal" class="form-label">Codigo postal</label>
                            <input type="text" id="cp" name="cp" class="form-control"
                            maxlength="5" pattern="\d{5}" inputmode="numeric"
                            oninput="validatePostalCode(this)" value="<?php echo $fila['Codigo_postal']; ?>" required>
                            <div class="invalid-feedback">
                                Se necesitan exactamente 5 números para el código postal.
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="rfc" class="form-label">RFC</label>
                            <input type="text" id="rfc" name="rfc" class="form-control" maxlength="13"
                            pattern=".{13}" style="text-transform: uppercase;"
                            oninput="validateRFC(this)" value="<?php echo $fila['RFC']; ?>" required>
                            <div class="invalid-feedback">
                                Se necesitan exactamente 13 caracteres para el RFC.
                            </div>
                        </div>
                    </div>



                    </div>            

                    <input type="hidden" name="accion" value="editar">
                    <input type="hidden" name="id_dueño" value="<?php echo $fila['id_dueño']; ?>">
                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Editar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>


            </form>


            <script>
            function validateAccountNumber(input) {
                const value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
                input.value = value;
                if (value.length !== 16) {
                    input.setCustomValidity('Se necesitan exactamente 16 números para el número de cuenta.');
                } else {
                    input.setCustomValidity('');
                }
            }

            function validatePhoneNumber(input) {
                const value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
                input.value = value;
                if (value.length !== 10) {
                    input.setCustomValidity('Se necesitan exactamente 10 números para el teléfono.');
                } else {
                    input.setCustomValidity('');
                }
            }

            function validatePostalCode(input) {
                const value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
                input.value = value;
                if (value.length !== 5) {
                    input.setCustomValidity('Se necesitan exactamente 5 números para el código postal.');
                } else {
                    input.setCustomValidity('');
                }
            }

            function validateRFC(input) {
                const value = input.value.toUpperCase(); // Ensure uppercase
                input.value = value;
                if (value.length !== 13) {
                    input.setCustomValidity('Se necesitan exactamente 13 caracteres para el RFC.');
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