<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Base de datos/consultas/lista_sintomas.php';
$sintomas = $resulset; // ->fetchAll();
include_once '../Base de datos/consultas/lista_localizaciones.php';
$localizaciones = $resulset; //->fetchAll();
?>

<form class="sintomas" name="sintomas" action="../Modulo de Triaje/procesadores/ingreso_sintoma.php" method="POST">
    <?php include 'formularios/sintoma_dolor.php';?>
    <?php include 'formularios/sintoma_fiebre.php';?>
    <?php include 'formularios/sintoma_tos.php';?>
    <?php include 'formularios/sintoma_diarrea.php';?>
    <div class="continuar">
    <input type="submit" value="Continuar"/>
    </div>
</form>
