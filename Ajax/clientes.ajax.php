
<?php

include_once '../Controladores/clientes.controlador.php';

include_once '../Modelos/clientes.modelo.php';



class AjaxClientes{

  public $consultaRuc;

  public function ajaxConsultaRuc(){

    $valor = $this->consultaRuc;

    $data = file_get_contents("https://api.sunat.cloud/ruc/".$valor);

    $info = json_decode($data, true);

    if ($data == null || $info['fecha_inscripcion']==='--'){

      $datos = array(0 => 'nada');
      echo json_encode($datos);

    }else {

      $datos = array(
        0 => $info['ruc'], 
        1 => $info['razon_social'],
        2 => date("d/m/Y", strtotime($info['fecha_actividad'])),
        3 => $info['contribuyente_condicion'],
        4 => $info['contribuyente_tipo'],
        5 => $info['contribuyente_estado'],
        6 => date("d/m/Y", strtotime($info['fecha_inscripcion'])),
        7 => $info['domicilio_fiscal'],
        8 => date("d/m/Y", strtotime($info['emision_electronica']))
      );
        echo json_encode($datos);
      
    }
    
  }

  public $idCliente;

  public function ajaxEditarCliente(){

    $item = "ID_CLIENTE";

    $valor = $this ->idCliente;

    $respuesta = ControladorClientes::ctrMostrarCliente($item, $valor);

    echo json_encode($respuesta);

  }

  public $estadoCliente;
  public $idcliente;

  public function ajaxEstadoCliente(){

    $tabla = "cliente";

    $item1 = "ESTADO";
    $valor1 = $this->estadoCliente;

    $item2 = "ID_CLIENTE";
    $valor2 = $this->idcliente;

    $respuesta = ModeloClientes::mdlActualizarCliente($tabla, $item1, $valor1, $item2, $valor2);

  }
}

//api consulta ruc

if (isset($_POST["consultaRuc"])) {
  
  $consulRuc = new AjaxClientes();
  $consulRuc -> consultaRuc = $_POST["consultaRuc"];
  $consulRuc -> ajaxConsultaRuc();

}

//editar cliente

if (isset($_POST["idCliente"])) {

  $editar = new AjaxClientes();
  $editar -> idCliente = $_POST["idCliente"];
  $editar -> ajaxEditarCliente();
  
}

//activar o desactivar cliente

if (isset($_POST["estadoCliente"])) {
  
  $estadoCli = new AjaxClientes;
  $estadoCli -> idcliente = $_POST["idcliente"];
  $estadoCli -> estadoCliente = $_POST["estadoCliente"];
  $estadoCli -> ajaxEstadoCliente();
}