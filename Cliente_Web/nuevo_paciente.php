<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include('../Base de datos/conexion.php');
include('../Base de datos/consultas/actualiza_paciente_triaje.php');

$guardalo=$_SESSION['medico'];
session_destroy();
session_start();
session_unset();
session_start();
$_SESSION['medico']=$guardalo;
$_SESSION['logeado']=TRUE;

header('Location: paciente.php');
?>
