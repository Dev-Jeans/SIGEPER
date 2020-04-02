//subir foto del usuario
$(".nuevaFoto").change(function () {
  
  var imagen = this.files[0];

  //validamos si el formatos es jpg o png
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

     $(".nuevaFoto").val("");

     swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG O PNG!",
      icon: "error",
      button: "¡Cerrar!",
    });
  }else if (imagen["size"] > 2000000) {

    $(".nuevaFoto").val("");

    swal({
     title: "Error al subir la imagen",
     text: "¡La imagen debe pesar más de 2MB!",
     icon: "error",
     button: "¡Cerrar!",
   });
    
  }else{

    var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);
      
    })
  }

})

// Editar usuario

$(document).on("click" ,".btnEditarUsuario" ,function(){
  

	var idUsuario = $(this).attr("idUsuario");
	
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

      //console.log(respuesta);

      let contenido = "";
          contenido+="<div class='form-group'>";
          contenido+="<label>Nombres y Apellidos</label>";
          contenido+="<input type='text' name='editarNombres' class='form-control' value='"+ respuesta["NOMBRES"] +"' readonly>";
          contenido+="</div>";
          contenido+="<div class='form-group'>";
          contenido+="<label>Usuario</label>";
          contenido+="<input type='text' name='editarUsuario' class='form-control' value='"+ respuesta["USUARIO"] +"' readonly>";
          contenido+="<input type='text' name='idUsuario' class='form-control d-none' value='"+ respuesta["ID_USUARIO"] +"'>";
          contenido+="</div>";
          contenido+="<div class='form-group'>";
          contenido+="<label>Contraseña</label>";
          contenido+="<input type='password' placeholder='Escriba la nueva contraseña' name='editarPassword' class='form-control'>";
          contenido+="<input type='text' name='passwordActual' class='form-control d-none' value='"+ respuesta["CONTRASENIA"] +"' required>";
          contenido+="</div>";
          contenido+="<div class='form-group'>";
          contenido+="<label>Perfil</label>";
          contenido+="<div class='select'>";
          contenido+="<select class='form-control' name='editarPerfil'>";
          contenido+="<option value='"+ respuesta["PERFIL"] +"'>"+ respuesta["PERFIL"] +"</option>";
          contenido+="<option value='ADMINISTRADOR'>ADMINISTRADOR</option>";
          contenido+="<option value='CAPACITADOR'>CAPACITADOR</option>";
          contenido+="<option value='SUPERVISOR'>SUPERVISOR</option>";
          contenido+="</select>";
          contenido+="</div>";
          contenido+="</div>";

      let foto="<input type='text' name='fotoActual' class='form-control d-none' value='"+ respuesta["FOTO"] +"' required>"; ;
        
      $('#editarContenido').html(contenido);
      $('#contFoto').html(foto);


      if (respuesta["FOTO"] != "") {

        $(".previsualizar").attr("src", respuesta["FOTO"]);
        
      }

		}

	});

})

//Activar usuario

$(document).on("click" ,".btnActivar" ,function(){

  var idUsuario = $(this).attr("idUsuario");
  var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();
 	datos.append("activarId", idUsuario);
  datos.append("activarUsuario", estadoUsuario);

  $.ajax({

    url:"ajax/usuarios.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
    contentType: false,
    processData: false,

    success: function(respuesta){

      if (window.matchMedia("(max-width:767px)").matches) {

        swal({
              title: "",
              text: "¡El usuario ha sido actualizado!",
              icon: "success",
              button: "Cerrar",
            })
            .then((value) => {
              window.location = "usuarios";
            });

      }
      
    }

  });

  if (estadoUsuario == "DESACTIVO") {
    
    $(this).removeClass("btn-success");//remueve clase
    $(this).addClass("btn-danger");//agrega clase
    $(this).html("DESACTIVO");
    $(this).attr("estadoUsuario","ACTIVO");

  }else{

    $(this).removeClass("btn-danger");//remueve clase
    $(this).addClass("btn-success");//agrega clase
    $(this).html("ACTIVO");
    $(this).attr("estadoUsuario","DESACTIVO");

  } 

  
})

// validar existencia de usuario

$("#nuevoUsuario").change(function() {

  $(".alert").remove();

  var usuario = $(this).val();

  var datos = new FormData(); 
  datos.append("validarUsuario", usuario);

  $.ajax({

    url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
    dataType: "json",
    
    success: function(respuesta) {

      if (respuesta) {

        $("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe</div>');
        $("#nuevoUsuario").val("");
        
      }
      
    }
  })

  
})