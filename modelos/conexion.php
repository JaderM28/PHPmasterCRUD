<?php
class Conexion{

    static public function conectar(){
        $link = new PDO("mysql:host=localhost; dbname=valhalla_repasobd", "root", "");
        $link ->exec("set names utf8");
        return $link;
    }


}




?>