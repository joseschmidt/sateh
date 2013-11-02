<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ('../Base de datos/consultas/lista_urgencias.php');
?>
<div class="alta_prioridad">
<form action="../Modulo de Triaje/Reglas.php" method="POST">
    <input type="submit" value="POLITRAUMATISMO SEVERO" name="Motivo_emergencia" />
    <input type="submit" value="NO RESPIRA" name="Motivo_emergencia" />
    <input type="submit" value="SIN PULSO" name="Motivo_emergencia" />
    <input type="submit" value="INTUBACIÓN PREHOSPITALARIA" name="Motivo_emergencia" />
    <input type="submit" value="PACIENTE NO RESPONDE" name="Motivo_emergencia" />
</form>
<form action="../Modulo de Triaje/procesadores/ingreso_motivo.php" method="POST">
    <br/>
    <span>Seleccione un motivo de consulta: <select name="Motivo_urgencia">
<?php
    foreach  ($resulset as $motivo_urgencia){ ?>
                <option>
                <?php echo $motivo_urgencia['DESCRIPCION']; ?>
                </option>
    <?php } ?>
    </select>
        <br/>
        <div class="continuar" >
            <input type="submit" value="Continuar" name="Continuar" />
        </div>
        
    </span>

</form>
</div>