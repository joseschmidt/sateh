<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$_SESSION['paciente']=explode(' ',$_POST['Nombre']);
$_SESSION['atendido']=$_SESSION['paciente'][0];
include('../../Base de datos/conexion.php');
include('../../Base de datos/consultas/actualiza_paciente_atendido.php');
$_SESSION['paciente']=null;
?>

<script type="text/javascript">
    window.close();
</script>



