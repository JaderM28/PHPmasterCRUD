<?php

require_once "./controladores/plantilla.controlador.php";
require_once "./controladores/formulario.controlador.php";
require_once "./modelos/formularios.modelos.php";
/* require_once "./modelos/conexion.php";

$conexion = Conexion::conectar();
echo '<pre>';
print_r($conexion);
echo '</pre>'; */




$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();


?>