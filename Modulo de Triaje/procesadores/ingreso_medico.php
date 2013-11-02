<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$_SESSION['medico']=explode(' ',$_POST['Nombre']);

$_SESSION['logeado']=TRUE;
header('Location: ../../Cliente_Web/paciente.php')
?>
