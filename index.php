<?php
//Controladores
require_once 'Controladores/plantilla.controlador.php';
require_once 'Controladores/usuarios.controlador.php';

//Modelos
require_once 'Modelos/usuarios.modelo.php'; 


$plantilla = new ControladorPlantilla(); //objeto que instancia una clase

$plantilla -> ctrPlantilla();//metodo