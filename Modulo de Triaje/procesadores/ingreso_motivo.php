<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$_SESSION['Motivo_urgencia']=$_POST['Motivo_urgencia'];
foreach($_SESSION['Motivo_urgencia'] as $key=> $aux){
    if ($key>1){
        $_SESSION['Motivo_urgencia'][1]=$_SESSION['Motivo_urgencia'][1].' '.$_SESSION['Motivo_urgencia'][$key];
    }
}
$_SESSION['IDS']['MOTIVOS_ID']=$_SESSION['Motivo_urgencia'][0];


header('Location: ../../Cliente FSQL/almacena_motivo_consulta.php');
?>
