<?php
require_once 'conexion.php';


class ModeloUsuarios{

  //login
  static public function mdlMostrarUsuarios($tabla, $item ,$valor){

    if ($item != null) {

      try {
        
        $stmt =  Conexion::conectar()->prepare("SELECT a.ID_USUARIO,CONCAT(b.NOMBRES,' ',b.APELLIDOS) AS NOMBRES,a.USUARIO,a.CONTRASENIA,a.PERFIL,a.FOTO,a.TOKEN,a.ESTADO FROM $tabla a INNER JOIN empleado b ON a.ID_EMP=b.ID_EMP WHERE $item = :$item");
        $stmt -> bindParam(":".$item, $valor , PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();

      } catch (PDOException $e) {
        
        return ("Conexion.mdlMostrarUsuarios" . $e->getMessage() . "\n");
        
      }

    }else{

      try {

        $stmt =  Conexion::conectar()->prepare("SELECT a.ID_USUARIO,CONCAT(b.NOMBRES,' ',b.APELLIDOS) AS NOMBRES,a.USUARIO,a.CONTRASENIA,a.PERFIL,a.FOTO,a.TOKEN,a.ESTADO,a.ULTIMO_LOGIN FROM $tabla a INNER JOIN empleado b ON a.ID_EMP=b.ID_EMP");
        $stmt -> execute();

        return $stmt -> fetchAll();
        
      } catch (PDOException $e) {
        
        return ("Conexion.mdlMostrarUsuarios" . $e->getMessage() . "\n");

      }

    }
    
  }

  //agregar usuario
  static public function mdlIngresarUsuario($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("SELECT ID_EMP FROM empleado WHERE NRO_DOC=:NRO_DOC");

    $stmt->bindParam(":NRO_DOC", $datos["usuario"], PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt -> fetch();

    if (isset($result["ID_EMP"])) {

      $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (ID_EMP,USUARIO,CONTRASENIA,PERFIL,FOTO,TOKEN,ESTADO,ULTIMO_LOGIN) VALUES (:ID_EMP,:USUARIO,:CONTRASENIA,:PERFIL,:FOTO,:TOKEN,:ESTADO,'2020-03-27 00:00:00')");

      $stmt->bindParam(":ID_EMP", $result["ID_EMP"], PDO::PARAM_STR);
      $stmt->bindParam(":USUARIO", $datos["usuario"], PDO::PARAM_STR);
      $stmt->bindParam(":CONTRASENIA", $datos["contrasenia"], PDO::PARAM_STR);
      $stmt->bindParam(":PERFIL", $datos["perfil"], PDO::PARAM_STR);
      $stmt->bindParam(":FOTO", $datos["foto"], PDO::PARAM_STR);
      $stmt->bindParam(":TOKEN", $datos["token"], PDO::PARAM_STR);
      $stmt->bindParam(":ESTADO", $datos["estado"], PDO::PARAM_STR);

      if($stmt->execute()){

        return "ok";	

      }else{

        return "error";
      
      }
      
    }else{
      return "empleado no encontrado";
    }

  }
  
  static public function mdlEditarUsuario($tabla, $datos){

    try {

      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET CONTRASENIA=:CONTRASENIA, PERFIL=:PERFIL ,FOTO=:FOTO WHERE ID_USUARIO=:ID_USUARIO");

      $stmt ->bindParam(":CONTRASENIA", $datos["contrasenia"] ,PDO::PARAM_STR);
      $stmt ->bindParam(":PERFIL", $datos["perfil"] ,PDO::PARAM_STR);
      $stmt ->bindParam(":FOTO", $datos["foto"] ,PDO::PARAM_STR);
      $stmt ->bindParam(":ID_USUARIO", $datos["usuario"] ,PDO::PARAM_STR);

        if ($stmt -> execute()) {

          return "ok";

        }else {
          
          return "error";

        }

    } catch (PDOException $e) {

      return ("Conexion.mdlMostrarUsuarios" . $e->getMessage() . "\n");
     
    }
  }

  //actualizar estado usuario

  static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

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