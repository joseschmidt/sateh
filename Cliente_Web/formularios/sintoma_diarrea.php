<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div id="diarrea" class="sintoma">
    <label>Diarrea?</label>
    <input type="checkbox" name="DIARREA" value="ON" />
    <select name="DIARREA_DESCRIPCION">
        <?php foreach ($sintomas as $sintoma){  ?>

            <?php
                if (strstr($sintoma['DESCRIPCION'],'DIARREA')){
                    echo '<option>'.$sintoma['DESCRIPCION'].'</option>';
                }
            ?>

        <?php } ?>
    </select>
    <label>¿Tiene moco?</label><input type="checkbox" name="DIARREA_PREGUNTA1" value="SI" />
    <label>¿Tiene sangre?</label><input type="checkbox" name="DIARREA_PREGUNTA2" value="SI" />
    <br/>
    <!--
    <div id="DIARREA_nivel"></div>
    <p>
    <input type="text" id="DIARREA_nivelValue"/>
    </p>
    -->
    <!--<label>¿Cuanto dura?</label><div id="DIARREA_duracion"></div>
    <p>
        <input type="hidden" id="duracionValue"/>
    </p>
    -->
    <label>¿Cuándo comenzo?</label><div id="DIARREA_inicio"></div>
    <p>
        <input type="hidden" id="DIARREA_inicioValue"/>
    </p>
    <label>¿Cuántas veces evacua en un día?</label><div id="DIARREA_repeticion"></div>
    <p>
        <input type="hidden" id="DIARREA_repeticionValue"/>
    </p>
</div>