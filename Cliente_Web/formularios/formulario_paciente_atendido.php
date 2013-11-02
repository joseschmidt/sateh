<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ('../Base de datos/consultas/lista_pacientes_reclasificar.php');
?>
<div class="centro">
<form name="ingreso" action="../Modulo de Triaje/procesadores/ingreso_paciente_actualizar.php" method="POST">
    <span>Seleccione el paciente que ya entro a la emergencia:<br/> <select name="Nombre">
<?php
    foreach  ($resulset as $paciente){ ?>
                <option>
                <?php echo $paciente['CODIGO'].' '.$paciente['NOMBRE'].' '.$paciente['APELLIDO'].' '.$paciente['GENERO'].' '.$paciente['EDAD']; ?>
                </option>
    <?php } ?>
            </select>
    </span>
    <br/><br/>
    <input type="submit" value="Aceptar"/>
</form>
</div>

