<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div id="tos" class="sintoma">
    <label>Tos?</label>
    <input type="checkbox" name="TOS" value="ON" />
        <select name="TOS_DESCRIPCION">
        <?php foreach ($sintomas as $sintoma){  ?>

            <?php
                if (strstr($sintoma['DESCRIPCION'],'TOS ')){
                    echo '<option>'.$sintoma['DESCRIPCION'].'</option>';
                }
            ?>

        <?php } ?>
    </select>

    <label>¿Es productiva?</label><input type="checkbox" name="TOS_PREGUNTA1" value="ON" />
    <label>¿Es de moco verde o claro?</label><input type="checkbox" name="TOS_PREGUNTA2" value="ON" />
    <!--
    <div id="TOS_nivel"></div>
    <p>
    <input type="text" id="TOS_nivelValue"/>
    </p>
    -->
    <br/>
    <!--
    <label>¿Cuanto dura?</label><div id="TOS_duracion"></div>
    <p>
        <input type="hidden" id="TOS_duracionValue"/>
    </p>
    -->
    <label>¿Cuándo comenzó?</label><div id="TOS_inicio"></div>
    <p>
        <input type="hidden" id="TOS_inicioValue"/>
    </p>
    <!--
    <label>¿Cuantas veces repite en un día?</label><div id="TOS_repeticion"></div>
    <p>
        <input type="hidden" id="TOS_repeticionValue"/>
    </p>
    -->
</div>