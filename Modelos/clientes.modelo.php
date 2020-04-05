<?php
require_once 'conexion.php';

class ModeloClientes {

  public static function mdlIngresarCliente($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (RAZON_SOCIAL,RUC,DOMICILIO,FECHA_REGISTRO,ESTADO) VALUES (:RAZON_SOCIAL,:RUC,:DOMICILIO,:FECHA_REGISTRO,'ACTIVO')");

    $stmt ->bindParam(":RAZON_SOCIAL", $datos["razon_social"],PDO::PARAM_STR);
    $stmt ->bindParam(":RUC", $datos["ruc"],PDO::PARAM_STR);
    $stmt ->bindParam(":DOMICILIO", $datos["domicilio"],PDO::PARAM_STR);
    $stmt ->bindParam(":FECHA_REGISTRO", $datos["fecha_registro"],PDO::PARAM_STR);

    if ($stmt ->execute()) {

      return "ok";

    }else {
      
      return "error";

    }


  }

  public static function mdlMostarClientes($tabla , $item, $valor){

    if ($item != null) {

      try {
        
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt ->execute();

        return $stmt  -> fetch();

      } catch (PDOException $e) {

        return ("Conexion.mdlMostarClientes" . $e->getMessage() . "\n");
        
      }

    }else {

      try {
        
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt ->execute();

        return $stmt  -> fetchAll();

      } catch (PDOException $e) {
        
        return ("Conexion.mdlMostarClientes" . $e->getMessage() . "\n");

      }
      
    }

  }

  //actualizar estado cliente

  static public function mdlActualizarCliente($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

	}
}