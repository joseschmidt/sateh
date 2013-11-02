<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div id="fiebre" class="sintoma">
    <label>¿Fiebre?</label>
    <input type="checkbox" name="FIEBRE" value="ON" />
    <label>¿Tomo algún medicamento?</label><input type="checkbox" name="FIEBRE_PREGUNTA1" value="SI" />
    <label>¿Aún tiene fiebre?</label><input type="checkbox" name="FIEBRE_PREGUNTA2" value="SI" />
    <br/>
    <label>¿Cuánto de fiebre?</label><div id="FIEBRE_nivel"></div>
    <p>
    <input type="hidden" id="FIEBRE_nivelValue"/>
    </p>
    <!--
    <label>¿Cuanto dura?</label><div id="FIEBRE_duracion"></div>
    <p>
    <input type="hidden" id="FIEBRE_duracionValue"/>
    </p>
    -->
    <label>¿Cuándo comenzó?</label><div id="FIEBRE_inicio"></div>
    <p>
    <input type="hidden" id="FIEBRE_inicioValue"/>
    </p>
    <label>¿Cuántas veces repite en un día?</label><div id="FIEBRE_repeticion"></div>
    <p>
    <input type="hidden" id="FIEBRE_repeticionValue"/>
    </p>
</div>
