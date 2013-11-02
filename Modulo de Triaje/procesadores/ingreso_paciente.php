<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$_SESSION['paciente']=explode(' ',$_POST['Nombre']);
$_SESSION['IDS']['PACIENTES']=$_SESSION['paciente'][0];

header('Location: ../../Cliente_Web/motivo_urgencia.php')

?>
