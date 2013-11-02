<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    $pagina='Seleccione un paciente';
    include_once ('partes/Header.php');
    include_once ("partes/menu.php");
    ?><div style="display: block; margin-top: 5px; vertical-align: baseline; padding-bottom: 0px; float: left">
        <h2>Seleccione un paciente de cola:</h2><?php
    include_once ('formularios/formulario_paciente.php');
    echo '<hr>';
    ?><h2>Seleccione un paciente para reclasificar:</h2><?php
    include_once ('formularios/formulario_paciente_reclasificar.php');
    ?> </div> <?php
    include_once ('partes/Footer.php');
?>
