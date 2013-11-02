<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div id="dolor" class="sintoma">
    <label>¿Dolor?</label>
    <input type="checkbox" name="DOLOR" value="ON" />
    <select name="DOLOR_DESCRIPCION">
        <?php foreach ($sintomas as $sintoma){  ?>

            <?php
                if (strstr($sintoma['DESCRIPCION'],'DOLOR')){
                    echo '<option>'.$sintoma['DESCRIPCION'].'</option>';
                }
            ?>

        <?php } ?>
    </select>
    <select name="DOLOR_LOCALIZACION">
        <?php foreach ($localizaciones as $localizacion){  ?>

            <?php
                    echo '<option>'.$localizacion['LOCALIZACION'].'</option>';
            ?>

        <?php } ?>
    </select>
    <br/>
    <label>¿Cuánto duele?</label><div id="DOLOR_nivel">
    </div>
    <p>
    <input type="hidden" id="DOLOR_nivelValue"/>
    </p>
    <br/>
    <label>¿Cuánto dura? (expresado en minutos)</label><div id="DOLOR_duracion" ></div>
    <p>
    <input type="hidden" id="DOLOR_duracionValue"/>
    </p>
    <label>¿Cuándo comenzó? (expresado en horas)</label><div id="DOLOR_inicio"></div>
    <p>
    <input type="hidden" id="DOLOR_inicioValue"/>
    </p>
    <label>¿Cuántas veces repite en un día?</label><div id="DOLOR_repeticion"></div>
    <p>
    <input type="hidden" id="DOLOR_repeticionValue"/>
    </p>
</div>