<?php

class ControladorFormularios{

    static public function ctrRegistrar(){
        if(isset($_POST['txtNombre'])){
            /* echo "NOMBRE: ".$_POST['txtNombre']; */

            /* return $_POST['txtNombre']."<br>".$_POST['txtEmail']; */

           /* return "OK"; */
            $tabla = "usuarios";
            $datos = array("Nombre" => $_POST['txtNombre'], "Correo" => $_POST['txtEmail'], "Password" => $_POST['txtPassword']);
            $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
            if($respuesta == "OK"){
                echo '<script>
                    setTimeout(function(){
                        window.location = "index.php?pagina=inicio";
                        },2000);
                </script>';
            }
        }
        
    }

    static public function ctrSeleccionarRegistros($item, $valor){
        $tabla = "usuarios";
        $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
        return $respuesta;
    }

    public function ctrIngreso(){
        if(isset($_POST['txtEmail'])){
            $tabla = "usuarios";
            $item = "Correo";
            $valor = $_POST['txtEmail'];
            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

            /* echo '<pre>'; print_r($respuesta); echo '</pre>'; */
            if($respuesta['Correo'] == $_POST['txtEmail'] && $respuesta['Password'] == $_POST['txtPassword']){

                $_SESSION["validarIngreso"] = "OK";

                echo '<script>
                    if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "index.php?pagina=inicio";
                </script>';
            }else{
                echo '<script>
                    if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>';
                echo '<div class="alert alert-danger"> Error, Usuario o Contraseña Incorrectas </div>';
            }
        }
    }
    

    static public function ctrActualizarRegistro(){
        if(isset($_POST['txtNombre'])){
            if($_POST['txtPassword'] != ""){
                $password = $_POST['txtPassword'];
            }else{
                $password = $_POST['passwordActual'];
            }
            
            $tabla = "usuarios";
            $datos = array("ID" => $_POST['txtId'],
                            "Nombre" => $_POST['txtNombre'],
                            "Correo" => $_POST['txtEmail'],
                            "Password" => $password);
            $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);
            if($respuesta == "OK"){
                echo '<script>
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
                </script>';
                echo '<div class="alert alert-success"> El Usuario Ha sido Actualizado</div>
                <script>
                    setTimeout(function(){
                        window.location = "index.php?pagina=inicio";
                        },2000);
                </script>';
            }
        }
    }

    public function ctrEliminarRegistro(){
        if(isset($_POST["eliminarRegistro"])){
            $tabla = "usuarios";
            $valor = $_POST['eliminarRegistro'];
            $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

            if($respuesta == "OK"){
                echo '<script>
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
                window.location = "index.php?pagina=inicio";
                </script>';
            }
        }
    }

}










?>