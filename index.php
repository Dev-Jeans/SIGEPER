<?php
//Controladores
require_once 'Controladores/plantilla.controlador.php';
require_once 'Controladores/usuarios.controlador.php';
require_once 'Controladores/clientes.controlador.php';

//Modelos
require_once 'Modelos/usuarios.modelo.php'; 
require_once 'Modelos/clientes.modelo.php';


$plantilla = new ControladorPlantilla(); //objeto que instancia una clase

$plantilla -> ctrPlantilla();//metodo