<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
//Constantes
$_SESSION['CONSTANTES']=array('TEMP'  =>$_POST['TEMP'],
                              'TAS'   =>$_POST['TAS'],
                              'FC'    =>$_POST['FC'],
                              'FR'    =>$_POST['FR'],
                              'SATO2' =>$_POST['SATO2'],
                              'GLICAP'=>$_POST['GLICAP'],
                              'NIHSS' =>$_POST['NIHSS']);

//Signos
$_SESSION['SIGNOS']=array('TIPO_PIEL'    =>$_POST['TIPOP'],
                          'PULSO_RADIAL' =>$_POST['PULSOR'],
                          'PULSO'        =>$_POST['PULSO'],
                          'RESPIRACION'  =>$_POST['RESPIRACION']);

//SI TODO ESTA BIEN, vamos a almacenar los signos y las constantes
header('Location: ../../Cliente FSQL/convierte_primerset_a_fuzzy.php');
?>
