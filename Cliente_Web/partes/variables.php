<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if (!isset($_SESSION['paciente'])){
    $_SESSION['paciente']=array(' ',' ',' ');

}

if (isset($_SESSION['medico'])) {
    $medico=$_SESSION['medico'];
} else $medico;
if (isset($_SESSION['paciente'])) {
    $paciente=$_SESSION['paciente'];
} else $paciente;
if (isset($_SESSION['logeado'])) {
    $logeado=$_SESSION['logeado'];
} else $logeado=FALSE;
if (isset($_SESSION['resulset'])) {
    $resulset=$_SESSION['resulset'];
} else $resulset;
$pagina;
?>
