
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