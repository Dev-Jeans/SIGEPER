<?php

class ControladorClientes{
  
   public static function ctrCrearCliente(){

      if (isset($_POST["nroRuc"]) && isset($_POST["razonSocial"]) && isset($_POST["domicilio"])) {

        if (!empty(preg_match('/^[0-9]+$/', $_POST["nroRuc"])) && !empty($_POST["razonSocial"]) && !empty($_POST["domicilio"]) ) {
          
          $tabla = "cliente";

          $item = "RUC";

          $valor = $_POST["nroRuc"];

          $validar = ModeloClientes::mdlMostarClientes($tabla , $item, $valor);

          if (isset($validar["RUC"]) == $valor) {
            
            echo '<script>
                   
                        swal({
                            title: "",
                            text: "¡Cliente ya se encuentra registrado!",
                            icon: "error",
                            button: "Cerrar",
                          });
        
                </script>';

          }else {

            date_default_timezone_set('America/Lima');
            $fecha = date("Y-m-d H:i:s");
  
  
            $datos = array("razon_social" => $_POST["razonSocial"],
                           "ruc" => $_POST["nroRuc"],
                           "domicilio" => $_POST["domicilio"],
                           "fecha_registro" => $fecha);
  
  
            $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);
  
            if ($respuesta == "ok") {

              echo '<script>
                   
                        swal({
                            title: "",
                            text: "¡Cliente registado exitosamente!",
                            icon: "success",
                            button: "Cerrar",
                          })
                          .then((value) => {
                            window.location = "clientes";
                          });
        
                </script>';
              
            }else {

              echo '<script>
                   
                        swal({
                            title: "",
                            text: "¡Ocurrio un error en la base de datos!",
                            icon: "error",
                            button: "Cerrar",
                          });
        
                </script>';
              
            }

          }

        }else {
          
          echo '<script>
                   
                        swal({
                            title: "",
                            text: "¡Debe realizar la consulta sunat antes de guardar!",
                            icon: "error",
                            button: "Cerrar",
                          });
        
                </script>';

        }
        
      }else {

        
      }

   }

   public static function ctrMostrarCliente($item, $valor){

      $tabla = "cliente";

      $respuesta = ModeloClientes::mdlMostarClientes($tabla, $item, $valor);

      return $respuesta;

   }
}