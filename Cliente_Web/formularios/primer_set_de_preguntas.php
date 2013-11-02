<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<form class="sintomas" name="primer_set" action="../Modulo de Triaje/procesadores/ingreso_primerset.php" method="POST">
    <div class="sintoma">
        <br/>
        <label>Estado de conciencia:</label><br/>
        <label>Alerta</label><input type="radio" name="NIHSS" value="2" checked="checked"/>
        <label>Confusa</label><input type="radio" name="NIHSS" value="4" />
        <label>Solo responde al dolor</label><input type="radio" name="NIHSS" value="7" />

        <br/>
        <br/>
        <label>¿Cómo es la temperatura corporal?:</label><br/>
        <label>Piel fría y palida</label><input type="radio" name="TIPOP" value="1"/>
        <label>Sudada y caliente</label><input type="radio" name="TIPOP" value="2" />
        <label>Muy caliente</label><input type="radio" name="TIPOP" value="3" />
        <br/>
        <br/>
        <label>¿Cuánta es la saturación de O2 sangre?</label>
        <div id="SATO2"></div>
        <input id="SATO2Value" type="hidden"/>
        <br/>
        <label>¿Cuál es la temperatura?</label>
        <div id="TEMP"></div>
        <input id="TEMPValue" type="hidden">
        <br/>
        <label>¿Cuánto es el valor de la presión tensión arterial sistólica?</label>
        <div id="TAS"></div>
        <input id="TASValue" type="hidden">
        <br/>
        <label>Frecuencia cardíaca</label>
        <div id="FC"></div>
        <input id="FCValue" type="hidden">
        <br/>
        <label>Frecuencia respiratoria</label>
        <div id="FR"></div>
        <input id="FRValue" type="hidden">
        <br/>
        <label>Glicemia capilar</label>
        <div id="GLICAP"></div>
        <input id="GLICAPValue" type="hidden">
        <!-- Signos -->
        <label>Intensidad del pulso radial</label>
        <div id="PULSOR"></div>
        <input id="PULSORValue" type="hidden">
        <br/>
        <label>Frecuencia de el pulso radial</label>
        <div id="PULSO"></div>
        <input id="PULSOValue" type="hidden">
        <br/>
        <label>¿Cómo es la respiración?</label>
        <label>Lenta y profunda</label><input type="radio" name="RESPIRACION" value="2" />
        <label>Normal</label><input type="radio" name="RESPIRACION" value="4" checked="checked"/>
        <label>Superficial y rapida</label><input type="radio" name="RESPIRACION" value="7" />

        
    </div>
    <div class="continuar">
        <input type="submit" value="Terminar" />
    </div>
</form>