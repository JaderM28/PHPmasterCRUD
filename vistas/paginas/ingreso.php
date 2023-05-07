
<h2 class="text-center " >¡Ingresar!</h2>

<div class="d-flex justify-content-center py-3">
    <form class="" method="post">
        <div class="mb-3 mt-3">

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
                        $ingreso = new ControladorFormularios();
                        $ingreso -> ctrIngreso();

                    ?>
            <div class="col text-center" >
                <button type="submit" class=" btn btn-primary px-5">Login</button>
            </div>
            

        </div>
    </form>
</div>
    