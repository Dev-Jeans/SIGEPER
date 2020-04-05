
$("#btnSearchRuc").on("click",function () {
  $("#ruc").removeClass("icon-check");
  $("#ruc").removeClass("icon-error");
  $("#ruc").addClass("icon-load");
  
  var consultaRuc = $("#ruc").val();
  
  var datos = new FormData();
  datos.append("consultaRuc",consultaRuc);

  $.ajax({

    url: 'ajax/clientes.ajax.php',
		method: "POST",
    data: datos,
    cache: false,
		contentType: false,
		processData: false,
    dataType: "json",
    success: function (datos_dni) {

      console.log(datos_dni);

      var datos = eval(datos_dni);
      var nada ='nada';
      
      if(datos[0]==nada){

        swal({
          title: "",
          text: "DNI o RUC no válido o no registrado!",
          icon: "error",
          button: "Cerrar",
        });

        $("#ruc").removeClass("icon-load");
        $("#ruc").addClass("icon-error");
        //$("#ruc").val("");
        $("#nroRuc").val("");
        $("#razonSocial").val("");
        $("#domicilio").val("");


      }else{

        var estadoCon = datos[5];

        if (estadoCon == "ACTIVO") {

          $("#ruc").removeClass("icon-load");
          $("#ruc").addClass("icon-check");

          $("#nroRuc").val(datos[0]);
          $("#razonSocial").val(datos[1]);
          $("#domicilio").val(datos[7]);
          
        }else{

          swal({
            title: "",
            text: "RUC no activo o suspendido temporalmente!",
            icon: "error",
            button: "Cerrar",
          });

        }

      } 

    }
  });

  return false;

});

$(document).on("click",".btnEditarCliente",function() {

  var idCliente = $(this).attr("idCliente");

  var datos = new FormData();
  datos.append("idCliente",idCliente);

  $.ajax({

    url:"ajax/clientes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
    dataType: "json",
    
    success: function(respuesta){

      //console.log(respuesta);

      $("#editarRuc").val(respuesta["RUC"]);
      $("#editarRazon").val(respuesta["RAZON_SOCIAL"]);
      $("#editarDomicilio").val(respuesta["DOMICILIO"]);

    }

  });
  
})

//Activar o desactivar cliente

$(document).on("click",".btnEstado",function() {

  var idCliente = $(this).attr("idCliente");
  var estadoCliente = $(this).attr("estadoCliente");

  var datos = new FormData();
  datos.append("idcliente",idCliente);
  datos.append("estadoCliente",estadoCliente);

  $.ajax({

    url:"ajax/clientes.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
    contentType: false,
    processData: false,

    success: function(respuesta) {

      if (window.matchMedia("(max-width:767px)").matches) {

        swal({
              title: "",
              text: "¡El cliente ha sido actualizado!",
              icon: "success",
              button: "Cerrar",
            })
            .then((value) => {
              window.location = "clientes";
            });

      }
      
    }

  });

  if (estadoCliente == "DESACTIVO") {
    
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



