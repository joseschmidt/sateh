<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ('../Base de datos/consultas/lista_antecedentes.php');
?>
<div class="centro">
<form name="ingreso" action="../Modulo de Triaje/procesadores/ingreso_antecedente.php" method="POST">
    <span>Seleccione un antecedente: <select name="descripcion">
<?php
    foreach  ($resulset as $antecedente){ ?>
                <option>
                <?php echo $antecedente['CODIGO'].' '.$antecedente['DESCRIPCION']; ?>
                </option>
    <?php } ?>
            </select>
    </span>
    <br/><br/>
    <input type="submit" value="Aceptar"/>
</form>
</div>

