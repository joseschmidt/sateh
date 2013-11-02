<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * /
 *
 */

$_SESSION['ALERTA']=FALSE;
$_SESSION['ALERTA2']=FALSE;
$_SESSION['paciente']=null;
$_SESSION['SINTOMAS']=null;
$_SESSION['CONSTANTES']=null;
$_SESSION['SIGNOS']=null;
$_SESSION['DIAGNOSTICOS']=null;
$_SESSION['IDS']=null;
    $pagina='Seleccione un paciente';
    include_once ('partes/Header.php');
    include_once ("partes/menu.php");
    include_once ('formularios/formulario_paciente_reclasificar.php');
    include_once ('partes/Footer.php');
?>
