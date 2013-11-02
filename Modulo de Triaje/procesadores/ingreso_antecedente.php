<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$_SESSION['antecedente']=explode(' ',$_POST['descripcion']);
foreach($_SESSION['antecedente'] as $key=> $aux){
    if ($key>1){
        $_SESSION['antecedente'][1]=$_SESSION['antecedente'][1].' '.$_SESSION['antecedente'][$key];
    }
}
$_SESSION['VENGODE']='ANTECEDENTE';
    if ((strcasecmp($_SESSION['antecedente'][1], 'HIPERTENSIVO')) or (strcasecmp($_SESSION['antecedente'][1], 'DIABETICO'))){
        $_SESSION['ALERTA2']=TRUE;
    }

    header ('Location: ../../Cliente FSQL/almacena_antecedente.php');

?>
