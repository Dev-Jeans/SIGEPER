$("#cbxHijos").change(function () {

  var cbxHijos = $("#cbxHijos").val(); 

  if (cbxHijos == "SI") {

    $("#edtHijos").removeClass("d-none");
    $("#edtHijos").addClass("d-block");
    
  }else{

    $("#edtHijos").removeClass("d-block");
    $("#edtHijos").addClass("d-none");

  }

})

/*$("#addDatos").click(function() {

  $("#formaddDatos").toggleClass("d-block");
  
})*/