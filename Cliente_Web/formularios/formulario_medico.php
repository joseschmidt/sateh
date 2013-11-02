<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * Haciendo el primer formulario, el de ingreso medico.
 */
//echo phpinfo();

include_once ('../Base de datos/consultas/lista_medicos.php');
if($resulset==false){echo $dbh->ErrorMsg();}
?>
<div class="centro">
<form name="ingreso" action="../Modulo de Triaje/procesadores/ingreso_medico.php" method="POST">
    <span>Seleccione su nombre: <select name="Nombre">
<?php
    foreach  ($resulset as $medico){ ?>
                <option>
                <?php echo $medico['CODIGO'].' '.$medico['NOMBRE'].' '.$medico['APELLIDO']; ?>
                </option>
    <?php } ?>
            </select>
    </span>
    <br/><br/>
    <input type="submit" value="Aceptar"/>
</form>
</div>