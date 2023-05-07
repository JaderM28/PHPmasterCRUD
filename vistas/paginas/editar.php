<?php 

    if(isset($_GET['ID'])){
        $item = "ID";
        $valor = $_GET['ID'];
        $usuario = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);

    }

?>


<div class="d-flex justify-content-center py-3">
    <form class="" method="post">
        <div class="mb-3 mt-3">
            <h3>Editar</h3>
            <div class="form-group">
                
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                            <i class="fas fa-user"></i>
                    </span>
                </div>
                    <input type="text" class="form-control" value="<?php echo $usuario['Nombre']; ?>" placeholder="Escribir Nombre" id="nombre" name="txtNombre">
                </div>
            </div>

            <div class="form-group">
                
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    <input type="email" class="form-control" value="<?php echo $usuario['Correo']; ?>" placeholder="Escribir Correo" id="email" name="txtEmail">
                </div>
            </div>

            <div class="form-group">
                
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <input type="password" class="form-control" value="<?php echo $usuario['Correo']; ?>" placeholder="Escribir Contraseña" id="pwd" name="txtPassword">
                    <input type="hidden" name="passwordActual" value="<?php echo $usuario['Password']; ?>">
                    <input type="hidden" name="txtId" value="<?php echo $usuario["ID"];?>">
                </div>
                <div class="form-group mt-3">
                    <?php 
                    if(isset($_POST['submit'])){
                        $actualizar = ControladorFormularios::ctrActualizarRegistro();
                    }
                    ?>
                </div>
                
            </div>
            
            
            <div class="col text-center" >
                <button type="submit" class=" btn btn-primary px-5">Actualizar</button>
            </div>
            

        </div>
    </form>
</div>