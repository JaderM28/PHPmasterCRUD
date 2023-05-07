<?php

require_once "./modelos/conexion.php";

class ModeloFormularios{

    static public function mdlRegistro($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Nombre, Correo, Password) VALUES(:Nombre, :Correo, :Password)");

        $stmt -> bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
        $stmt -> bindParam(":Password", $datos["Password"], PDO::PARAM_STR);
        /* $stmt -> bindParam(":ID", $datos['ID'], PDO::PARAM_STR); */

        if($stmt -> execute()){
            return "OK";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }

        $stmt->close();
        $stmt = null;
    }

    static public function mdlSeleccionarRegistros($tabla, $item, $valor){

        if($item == null && $valor == null){

            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(Fecha, '%d/%m/%Y') AS Fecha FROM $tabla ORDER BY ID DESC");
            $stmt -> execute();
            return $stmt -> fetchAll();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(Fecha, '%d/%m/%Y') AS Fecha FROM $tabla WHERE $item = :$item ORDER BY ID DESC");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();

        }

        $stmt -> close();
        $stmt = null;
    }

    static public function mdlActualizarRegistro($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre = :Nombre, Correo = :Correo, Password = :Password WHERE ID = :ID");

        $stmt -> bindParam(":Nombre",$datos["Nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":Correo",$datos["Correo"], PDO::PARAM_STR);
        $stmt -> bindParam(":Password",$datos["Password"], PDO::PARAM_STR);
        $stmt -> bindParam(":ID",$datos["ID"], PDO::PARAM_STR);

        if($stmt -> execute()){
            return "OK";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt -> close();
        $stmt = null;



    }

    static public function mdlEliminarRegistro($tabla, $valor){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE ID = :ID");
        $stmt -> bindParam(":ID", $valor, PDO::PARAM_INT);

        if($stmt -> execute()){
            return "OK";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }

        $stmt -> close();
        $stmt = null;
    }

}




?>