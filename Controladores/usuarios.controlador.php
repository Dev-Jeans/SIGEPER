<?php

class ControladorUsuarios{

  //login
  static public function ctrIngresoUsuario(){

    if (isset($_POST["username"])) {
      if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["username"] ) && preg_match('/^[a-zA-Z0-9!@#$%]+$/', $_POST["password"])) {

          $encriptar = password_hash($_POST["password"],PASSWORD_DEFAULT,['cost' => 10]);
       
          $tabla = "usuarios";

          $item = "USUARIO";

          $valor = $_POST["username"];

          $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

          if(isset($respuesta["USUARIO"]) == $_POST["username"] && isset($respuesta["CONTRASENIA"]) == $encriptar){
            
            if (isset($respuesta["ESTADO"]) == "ACTIVO") {

              $_SESSION['Sys@p_2020']= $respuesta;

              date_default_timezone_set('America/Lima');
              
              $item1 = "ULTIMO_LOGIN";
              $valor1 = date("Y-m-d H:i:s");

              $item2 = "ID_USUARIO";
              $valor2 = $respuesta["ID_USUARIO"];

              $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

              if ($ultimoLogin == "ok") {

                echo '<script>

                        window.location = "home";

                      </script>';
               
              }    

            }else {
              
              echo '</br></br><div class="alert alert-danger">El usuario no se encuentra activo</div>';

            }

          }else{

            echo '</br></br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

          }
      }
    }
  }

  //crear usuario
  static public function ctrCrearUsuario(){

    if(isset($_POST["nuevoUsuario"])){

      if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) && 
      preg_match('/^[a-zA-Z0-9!@#$%]+$/', $_POST["nuevoPassword"])){

			  //validar imagen

				$ruta = "";

				if(isset($_FILES["nuevaFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					//creamos el directorio donde guardaremos la foto del usuario
					
          $directorio = "Vistas/img/usuarios/".$_POST["nuevoUsuario"];
          
          if (!file_exists($directorio)) {

            mkdir($directorio, 0700);

          }else{

            mkdir($directorio, 0755);

          }

          //de acuerdo al tipo de imagen aplicamos las funciones por defecto en php	

            if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

              //guardamos la imagen en el directorio

              $aleatorio = mt_rand(100,999);

              $ruta = "Vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

              $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

              $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

              imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

              imagejpeg($destino, $ruta);

            }

            if($_FILES["nuevaFoto"]["type"] == "image/png"){

              //guardamos la imagen en el directorio

              $aleatorio = mt_rand(100,999);

              $ruta = "Vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

              $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

              $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

              imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

              imagepng($destino, $ruta);

            }

				}

				$tabla = "usuarios";

        $encriptar = password_hash($_POST["nuevoPassword"],PASSWORD_DEFAULT,['cost' => 10]);

        $token = bin2hex(random_bytes(64));
        
				$datos = array("usuario" => $_POST["nuevoUsuario"],
                       "contrasenia" => $encriptar,
                       "perfil" => $_POST["nuevoPerfil"],
                       "foto" => $ruta,
                       "token" => $token,
                       "estado" => "ACTIVO");

				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>
                   
                        swal({
                            title: "",
                            text: "¡Usuario registado exitosamente!",
                            icon: "success",
                            button: "Cerrar",
                          })
                          .then((value) => {
                            window.location = "usuarios";
                          });
        
                </script>';

				}else if ($respuesta == "empleado no encontrado") {
          
          echo '<script>
                      $("#nuevoUsuario").val("");
                        swal({
                            title: "",
                            text: "¡Documento de empleado no encontrado!",
                            icon: "error",
                            button: "Cerrar",
                          });

                </script>';

        }
				


			}else{

				echo '<script>
                swal({
                  title: "Campo Incompleto",
                  text: "¡El campo esta vacio!",
                  icon: "warning",
                  button: "Cerrar",
                })
                .then((value) => {
                  window.location = "usuarios";
                });
              </script>';

      }
      
    }
    
  }

  //metdodo mostrar usuarios

  static public function ctrMostrarUsuario($item, $valor){

    $tabla = "usuarios";

    $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

    return $respuesta;  

  }
  
  //metodo editar usuario

  static public function ctrEditarUsuario(){

    if(isset($_POST["editarUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarUsuario"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "Vistas/img/usuarios/".$_POST["editarUsuario"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "Vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "Vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "usuarios";

				if($_POST["editarPassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

            $encriptar = password_hash($_POST["editarPassword"],PASSWORD_DEFAULT,['cost' => 10]);

					}else{

						echo'<script>
                  
                  swal({
                    title: "Campo Incompleto",
                    text: "¡La contraseña no puede ir vacía!",
                    icon: "error",
                    button: "Cerrar",
                  })
                  .then((value) => {
                    window.location = "usuarios";
                  });

						  	</script>';

						  	return;

					}

				}else{

					$encriptar = $_POST["passwordActual"];

				}

				$datos = array("usuario" => $_POST["idUsuario"],
                       "contrasenia" => $encriptar,
                       "perfil" => $_POST["editarPerfil"],
                       "foto" => $ruta);


				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>
                
                swal({
                      title: "",
                      text: "¡El usuario ha sido editado correctamente!",
                      icon: "success",
                      button: "Cerrar",
                    })
                    .then((value) => {
                      window.location = "usuarios";
                    });

					</script>';

				}


			}else{

				echo'<script>
            
            swal({
                  title: "",
                  text: "¡El usuario ha sido editado correctamente!",
                  icon: "success",
                  button: "Cerrar",
                })
                .then((value) => {
                  window.location = "usuarios";
                });

			  	</script>';

			}

		}

  }

}
