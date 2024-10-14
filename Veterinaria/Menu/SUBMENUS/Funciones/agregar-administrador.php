<div class="modal fade" id="agregar-administrador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Agregar registro</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../SUBMENUS/includes/upload-a.php" method="POST" enctype="multipart/form-data">

                    <div class="row">


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="curp" class="form-label">Identificador</label>
                                <input type="text" id="id_admin" name="id_admin" class="form-control" required>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Apellido Paterno</label>
                                <input type="text" id="apellido_p" name="apellido_p" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Apellido Materno</label>
                                <input type="text" id="apellido_m" name="apellido_m" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                        </div>




                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Correo</label>
                                <input type="e-mail" id="correo" name="correo" class="form-control" required>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Contraseña</label>
                                <input type="password" id="contraseña" name="contraseña" class="form-control" required>
                            </div>
                        </div>



                        

                    </div>




                  
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