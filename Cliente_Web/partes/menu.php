<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="cuerpo_menu">
<div class="menu">
        <?php
        if ($_SESSION['logeado'] == TRUE){
        ?>
            <ul>
                <a href="medico.php" >cambiar usuario</a>
            </ul>
            <ul>
                <a href="paciente_atendido.php" target="_blank">actualizar paciente</a>
            </ul>
            <ul>
               <a href="salir.php">salir</a>
            </ul>
    <?php
        }else {?>
            <ul>
               <a href="medico.php" style="padding-left: 60px;padding-right: 60px;">entrar al sistema</a>
            </ul>

    <?php } ?>


</div>
</div>