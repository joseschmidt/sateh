<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include_once '../Base de datos/conexion.php';
//-------------- Sintomas: ----------------

$DURACION_TRIANGULO=3;
$INICIO_TRIANGULO=8;
$REPETICION_TRIANGULO=3;

foreach ($_SESSION['SINTOMAS'] as $sintoma){

if(!isset($sintoma['PREGUNTA1'])){
    $sintoma['PREGUNTA1']='\''.'NO'.'\'';
}else{$sintoma['PREGUNTA1']= '\''.$sintoma['PREGUNTA1'].'\''; }
if(!isset($sintoma['PREGUNTA2'])){
    $sintoma['PREGUNTA2']='\''.'NO'.'\'';
}else{$sintoma['PREGUNTA2']= '\''.$sintoma['PREGUNTA2'].'\''; }
if(!isset($sintoma['LOCALIZACION'])){
    $sintoma['LOCALIZACION']='NOAPLICA';
}else{$sintoma['LOCALIZACION']= '\''.$sintoma['LOCALIZACION'].'\''; }
if(!isset($sintoma['DURACION'])){
    $sintoma['DURACIONT']=1;
}else{$sintoma['DURACIONT']=6;}
if(!isset($sintoma['INICIO'])){
    $sintoma['INICIOT']=1;
}else{$sintoma['INICIOT']= 6;}
if(!isset($sintoma['REPETICION'])){
    $sintoma['REPETICIONT']=1;
}else{$sintoma['REPETICIONT']=6;}

$D_I_R_SQL='\''.$sintoma['DURACIONT'].'\',\''.$sintoma['DURACION'].'\',\''.($sintoma['DURACION']-$DURACION_TRIANGULO).'\',\''.($sintoma['DURACION']+$DURACION_TRIANGULO).'\',\''.$DURACION_TRIANGULO.'\',
            \''.$sintoma['INICIOT'].'\',\''.$sintoma['INICIO'].'\',\''.($sintoma['INICIO']-$INICIO_TRIANGULO).'\',\''.($sintoma['INICIO']+$INICIO_TRIANGULO).'\',\''.$INICIO_TRIANGULO.'\',
            \''.$sintoma['REPETICIONT'].'\',\''.$sintoma['REPETICION'].'\',\''.($sintoma['REPETICION']-$REPETICION_TRIANGULO).'\',\''.($sintoma['REPETICION']+$REPETICION_TRIANGULO).'\',\''.$REPETICION_TRIANGULO.'\',';


//-------------- Dolor:    ----------------
    include 'convierte_dolor_a_fuzzy.php';
//-------------- Fiebre:   ----------------
    include 'convierte_fiebre_a_fuzzy.php';
//-------------- Tos:      ----------------
    include 'convierte_tos_a_fuzzy.php';
//-------------- Diarrea:  ----------------
    include 'convierte_diarrea_a_fuzzy.php';

//-------------- Sin sintomas -------------
    include 'convierte_sinsintomas_a_fuzzy.php';

}


header('Location: ../Cliente_Web/antecedentes.php');

?>
