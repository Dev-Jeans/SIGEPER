<?php

require_once "../Controladores/usuarios.controlador.php";

require_once "../Modelos/usuarios.modelo.php";

class AjaxUsuarios{

  public $idUsuario;

  public function ajaxEditarUsuario(){

    $item = "ID_USUARIO";

    $valor = $this ->idUsuario;

    $respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

    echo json_encode($respuesta);
  }

  // activar estado ususario

  public $activarUsuario;
	public $activarId;

  public function ajaxActivarUsuario(){

		$tabla = "usuarios";

		$item1 = "ESTADO";
		$valor1 = $this->activarUsuario;

		$item2 = "ID_USUARIO";
		$valor2 = $this->activarId;

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

  }
  
  //validar existencia de usuario

  public $validarUsuario;

  public function ajaxValidarUsuario(){

    $item = "USUARIO";
    $valor = $this->validarUsuario;

    $respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

    echo json_encode($respuesta);

  }
}

//Editar usuario

if (isset($_POST["idUsuario"])) {

  $editar = new AjaxUsuarios();
  $editar -> idUsuario = $_POST["idUsuario"];
  $editar -> ajaxEditarUsuario();
  
}

//Activar usuario

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}

//validar existencia usuario

if (isset($_POST["validarUsuario"])) {
  
  $valUsuario = new AjaxUsuarios();
  $valUsuario -> validarUsuario = $_POST["validarUsuario"];
  $valUsuario -> ajaxValidarUsuario();

}



