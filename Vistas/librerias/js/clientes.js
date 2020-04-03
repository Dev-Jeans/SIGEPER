$("#btnSearchRuc").on("click",function ( ) {

  $("#ruc").addClass("icon-load");
  
  var consultaRuc = $("#ruc").val();
  //var url = "consulta_sunat.php";
  
  var datos = new FormData();
  datos.append("consultaRuc","ruc="+consultaRuc)

  $.ajax({

    url: 'ajax/clientes.ajax.php',
		method: "POST",
    data: datos,
    cache: false,
		contentType: false,
		processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#ruc").removeClass("icon-load");
      $("#ruc").addClass("icon-check");
    }
  })

  
})