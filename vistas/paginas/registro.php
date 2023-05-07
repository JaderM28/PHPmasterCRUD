
<h2 class="text-center " >¡Registrarse!</h2>

<div class="d-flex justify-content-center py-3">
    <form class="" method="POST" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                </div>
                    <input type="text" class="form-control" id="nombre" name="txtNombre">
                </div>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    <input type="email" class="form-control" id="email" name="txtEmail">
                </div>
            </div>

            <div class="form-group">
                <label for="pwd">Contraseña:</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                            </span>
                    </div>
                    <input type="password" class="form-control" id="pwd" name="txtPassword">
                </div>
            </div>
            
                    <?php
                        /* $formulario = new ControladorFormularios();
                        $formulario -> ctrRegistrar(); */

                        $registro = ControladorFormularios::ctrRegistrar();
                        /* echo $registro; */

                        if($registro == "OK"){

                            echo '<script>
                                if(window.history.replaceState){
                                    window.history.replaceState(null, null, window.location.href);
                                }
                                </script>';

                            echo '<div class="alert alert-success">El usuario ha sido registrado</div>';

                        }
                    ?>
            <div class="col text-center" >
                <button type="submit" class=" btn btn-primary px-5">Enviar</button>
            </div>
            

        </div>
    </form>
</div>

