<?php

if(!isset($_SESSION['validarIngreso'])){
    echo '<script>window.location = "index.php?pagina=ingreso";</script>';
    return;
}else{
    if($_SESSION["validarIngreso"] != "OK"){
        echo '<script>window.location = "index.php?pagina=ingreso";</script>';
    }
}




$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null, null);
/* echo '<pre>'; print_r($usuarios); echo '</pre>'; */


?>


    <div class="container-fluid  bg-light">
		<div class="container py-5">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Firstname</th>
                        <th>Email</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $key => $value): ?>
                    <tr>
                        <td><?php echo $key+1 ?></td>
                        <td><?php echo $value['Nombre']?></td>
                        <td><?php echo $value['Correo']?></td>
                        <td><?php echo $value['Fecha']?></td>
                        <td>
                            <div class="btn-group">
                                <a href="index.php?pagina=editar&ID=<?php echo $value["ID"];?>" class="btn btn-warning" title="Editar"><i class="fa fa-edit"></i></a>
                                
                                <form method="post">
                                    <input type="hidden" name="eliminarRegistro" value="<?php echo $value["ID"];?>">
                                    <button class="btn btn-danger ml-3" title="Eliminar"><i class="fa fa-trash"></i></button>
                                    <?php 
                                        $eliminar = new ControladorFormularios();
                                        $eliminar -> ctrEliminarRegistro();
                                    
                                    ?>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>