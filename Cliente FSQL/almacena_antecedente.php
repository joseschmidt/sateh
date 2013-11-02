<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include '../Base de datos/conexion.php';

 $sql= 'INSERT INTO A_PADECIDO VALUES ('.$_SESSION['paciente'][0].','.$_SESSION['antecedente'][0].')';
 $guarde = $dbh->Execute($sql);
 if($guarde == FALSE) {echo $dbh->ErrorMsg();}
 $_SESSION['IDS']['ANTECEDENTE']=$_SESSION['antecedente'][0];


 header('Location: ../Modulo de Triaje/Reglas.php');
?>
