<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if (isset($_POST['Motivo_emergencia'])){
    $motivo = $_POST['Motivo_emergencia'];
    $_SESSION['Motivo_urgencia']=$motivo;
    if ($motivo == 'POLITRAUMATISMO SEVERO' or $motivo == 'NO RESPIRA' or $motivo == 'SIN PULSO' or $motivo == 'INTUBACIÓN PREHOSPITALARIA' or $motivo == 'PACIENTE NO RESPONDE' ){
        if ($motivo == 'SIN PULSO'){
                $_SESSION['DIAGNOSTICOS'][0]=array('CATEGORIA'=>'PARO CARDIACO','CDEG(*)'=>1);}
           ELSEIF($motivo == 'NO RESPIRA'){
                $_SESSION['DIAGNOSTICOS'][0]=array('CATEGORIA'=>'PARO RESPIRATORIO','CDEG(*)'=>1);}
           ELSE{
                $_SESSION['DIAGNOSTICOS'][0]=array('CATEGORIA'=>'PRIORIDAD 1','CDEG(*)'=>1);}
    echo ($motivo);
    echo $_SESSION['DIAGNOSTICOS'][0][0];
    header('Location: ../Cliente_Web/resultado.php');
    }
}
    if(isset($_SESSION['VENGODE'])){
        echo $_SESSION['ALERTA'].' '.$_SESSION['ALERTA2'];
        if($_SESSION['ALERTA'] && $_SESSION['ALERTA2']){
            $_SESSION['DIAGNOSTICOS'][0]=array('PARO CARDIACO',1);
            $_SESSION['ALERTA']=FALSE;$_SESSION['ALERTA2']=FALSE;
            header('Location: ../Cliente_Web/resultado.php');
        }
        else{
            header('Location: ../Cliente_Web/signos_constantes.php');
        }
    }
?>