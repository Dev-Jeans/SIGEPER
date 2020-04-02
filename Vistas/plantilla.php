<?php
  session_start();
  $user=isset($_SESSION['Sys@p_2020'])?$_SESSION['Sys@p_2020']:null;

  // Desactivar toda notificación de error
  //error_reporting(0);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Gestion de Personal</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="Vistas/librerias/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="Vistas/librerias/css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="Vistas/librerias/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="Vistas/librerias/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="Vistas/librerias/img/favicon.png?3">
    <!--Datables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

    <!-- JavaScript files-->
    <script src="Vistas/librerias/vendor/jquery/jquery.min.js"></script>
    <script src="Vistas/librerias/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="Vistas/librerias/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="Vistas/librerias/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="Vistas/librerias/vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <!--<script src="Vistas/librerias/js/charts-home.js"></script>-->
    <script src="Vistas/librerias/js/front.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/4.13.0/bodymovin.min.js"></script>
    <!--Datatables-->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script src="Vistas/librerias/js/datatables.js"></script>
  
  </head>
  <body>
    <?php

    if (!empty($user['TOKEN'])) {
      include 'modulos/header.php';

      echo "<div class='d-flex align-items-stretch'>";
 
      include 'modulos/sidebar.php';
     
       echo " <div class='page-holder w-100 d-flex flex-wrap'>";
 
       if (isset($_GET["ruta"])) {
         
         if ($_GET["ruta"] == "home" || $_GET["ruta"] == "usuarios" || $_GET["ruta"] == "empleados" || $_GET["ruta"] == "nuevo-empleado" || $_GET["ruta"] == "salir" || $_GET["ruta"] == "clientes") {
           include "modulos/".$_GET["ruta"].".php";
         }else {
           
           include "modulos/404.php";

           echo '<script src="Vistas/librerias/js/lottie-404.js"></script>';
           
         }
       }else {
         include "modulos/home.php";
       }
 
 
       //pie de pagina
         include 'modulos/footer.php';
 
         echo "</div>";
         
       echo "</div>"; 
    }else {

      include 'modulos/login.php';

      echo '<script src="Vistas/librerias/js/lottie-login.js"></script>';
      
    }
      
    ?>  
  <script src="Vistas/librerias/js/main.js"></script>
  <script src="Vistas/librerias/js/datatables.js"></script>
  <script src="Vistas/librerias/js/usuarios.js"></script>
 
  </body>
</html>