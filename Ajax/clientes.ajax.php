
<?php

//include_once '../Controladores/clientes.controlador.php';

//include_once '../Modelos/clientes.modelo.php';



class AjaxClientes{

  public $consultaRuc;

  public function ajaxConsultaRuc(){

    $valor = $this->consultaRuc;

    $respuesta = file_get_contents("https://api.sunat.cloud/ruc/".$valor);

    echo json_encode($respuesta);

  }
}

//api consulta ruc

if (isset($_POST["consultaRuc"])) {
  
  $consulRuc = new AjaxClientes();
  $consulRuc -> consultaRuc = $_POST["consultaRuc"];
  $consulRuc -> ajaxConsultaRuc();

}