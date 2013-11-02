<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once('../Base de datos/consultas/lista_categorias.php');


//$resulset= $resulset->fetchAll();
?> <div style="display:inline-block"><h1>Posible impresión diagnóstica:</h1></div><br/><br/> <?php
if (!(isset($_SESSION['DIAGNOSTICOS']))){
    ?>
    <div class="sindiagnostico">
        <p>Nivel de Prioridad 5:
        URGENCIA, PUEDE SER ATENDIDO DENTRO DE 1 HORA.</p>
    </div>
    <?php
}
else{
    $diagnosticos=$_SESSION['DIAGNOSTICOS'];
    foreach ($diagnosticos as $j => $diagnostico){
        $i=0;
        foreach ($resulset as $i => $categoria){
            if ($diagnostico['CATEGORIA']==$categoria['DESCRIPCION']){


                if ($categoria['NIVEL'] == 1 ){ ?>
                    <BR/>
                    <div class="urgencia_1">
                    <?php
                    echo 'Nivel de Prioridad 1:<BR/>';
                    echo 'EMERGENCIA REQUIERE ATENCIÓN INMEDIATA'; if(strstr($categoria['DESCRIPCION'],'PRIORIDAD')){echo '.';}else{ echo ', con  posible '.$categoria['DESCRIPCION'];}
                    ?>
                    </div>
                           <?php }
                                if ($categoria['NIVEL'] == 2 ){ ?>
                    <BR/>
                    <div class="urgencia_2">
                    <?php
                    echo 'Nivel de Prioridad 2:<BR/>';
                    echo 'EMERGENCIA, DEBE SER ATENCIÓN DENTRO DE 10 MINUTOS'; if(strstr($categoria['DESCRIPCION'],'PRIORIDAD')){echo '.';}else{ echo ', con posible '.$categoria['DESCRIPCION'];}
                    ?>
                    </div>
                           <?php }
                                if ($categoria['NIVEL'] == 3 ){ ?>
                     <BR/>
                    <div class="urgencia_3">
                    <?php
                    echo 'Nivel de Prioridad 3:<BR/>';
                    echo 'URGENCIA, PUEDE SER ATENDIDO DENTRO DE 30 MINUTOS'; if(strstr($categoria['DESCRIPCION'],'PRIORIDAD')){echo '.';}else{ echo ', con posible '.$categoria['DESCRIPCION'];}
                    ?>
                    </div>
                           <?php }
                                if ($categoria['NIVEL'] == 4 ){ ?>
                     <BR/>
                    <div class="urgencia_4">
                    <?php
                    echo 'Nivel de Prioridad 4:<BR/>';
                    echo 'URGENCIA, PUEDE SER ATENDIDO DENTRO DE 1 HORA'; if(strstr($categoria['DESCRIPCION'],'PRIORIDAD')){echo '.';}else{ echo ', con posible '.$categoria['DESCRIPCION'];}
                    ?>
                    </div>
                           <?php }
                                if ($categoria['NIVEL'] == 5 ){ ?>
                     <BR/>
                    <div class="urgencia_5">
                    <?php
                    echo 'Nivel de Prioridad 5:<BR/>';
                    echo 'URGENCIA, PUEDE ATENDIDO DENTRO DE 1 HORA'; if(strstr($categoria['DESCRIPCION'],'PRIORIDAD')){echo '.';}else{ echo ', con  posible '.$categoria['DESCRIPCION'];}
                    ?>
                    </div>
           <?php }
            }
        }
    }
}
?>
<div class="resumen"><br/>
    <div><h1>Resumen del episdo de triaje del paciente:</h1></div>
    <p><br/>
        <?php
        echo 'Nombre:'.$_SESSION['paciente'][1].'<br/>';
        echo 'Apellido:'.$_SESSION['paciente'][2].'<br/>';
        echo 'Genero:'.$_SESSION['paciente'][3].'<br/>';
        echo 'Edad:'.$_SESSION['paciente'][4].'<br/>';
        ?>
    </p><br/>

<?php
    if (isset($_SESSION['Motivo_urgencia'])){
        echo '<hr>';
        echo '<h2>'.'Motivo de consulta:'.'</h2>';
        echo '<hr>';
        echo '<p>';
        echo $_SESSION['Motivo_urgencia'];
        echo '</p>';
    }
?>
<?php
if (isset($_SESSION['SINTOMAS'])){
    echo '<hr>';
    echo '<h2>'.'Sintómas:'.'</h2>';
    echo '<hr>';
    foreach($_SESSION['SINTOMAS'] as $sintoma){
        echo '<p>';

        if(strstr($sintoma['DESCRIPCION'],'DOLOR')){
            echo '<h3>'.$sintoma['DESCRIPCION'].':</h3><br/>';
            echo '<p>';
            echo 'En la escala del 1-10 siente:'.$sintoma['NIVEL'].'<br/>';
            echo 'Localización:'.$sintoma['LOCALIZACION'].'<br/>';
            echo 'Comenzo hace:'; if($sintoma['INICIO']>72) {echo ' más de 3 dias.<br/>';}
                                                          else{echo $sintoma['INICIO'].' horas <br/>';}
            echo 'Duración del dolor:'.$sintoma['DURACION'].' minutos<br/>';
            echo 'El dolor le repite:'.$sintoma['REPETICION'].' al día<br/>';
            echo '</p>';
        }
        if(strstr($sintoma['DESCRIPCION'],'FIEBRE')){
            echo '<h3>'.$sintoma['DESCRIPCION'].':</h3><br/>';
            echo '<p>';
            echo 'La fiebre es de:'.$sintoma['NIVEL'].'<br/>';
            echo '¿Tomó algún medicamento?:'.$sintoma['PREGUNTA1'].'<br/>';
            echo '¿Aún tiene fiebre?:'.$sintoma['PREGUNTA2'].'<br/>';
            echo 'Comenzo hace:'; if($sintoma['INICIO']>72) {echo ' más de 3 dias';}
                                                          else{echo $sintoma['INICIO'].' horas <br/>';}
            echo 'La fiebre dura:'.$sintoma['DURACION'].' minutos<br/>';
            echo 'La fiebre le repite:'.$sintoma['REPETICION'].' al día<br/>';
            echo '</p>';
        }
        if(strstr($sintoma['DESCRIPCION'],'TOS')){
            echo '<h3>'.$sintoma['DESCRIPCION'].':</h3><br/>';
            echo '<p>';
            echo '¿Es productiva?:'.$sintoma['PREGUNTA1'].'<br/>';
            echo '¿Es de moco verde o claro?:'.$sintoma['PREGUNTA2'].'<br/>';
            echo 'Comenzo hace:'; if($sintoma['INICIO']>72) {echo ' más de 3 dias';}                                                          else{echo $sintoma['INICIO'].' horas <br/>';}
            echo 'Duración del dolor:'.$sintoma['DURACION'].' minutos<br/>';
            echo 'El dolor le repite:'.$sintoma['REPETICION'].' al día<br/>';
            echo '</p>';

        }
        if(strstr($sintoma['DESCRIPCION'],'DIARREA')){
            echo '<h3>'.$sintoma['DESCRIPCION'].':</h3><br/>';
            echo '<p>';
            echo '¿Tiene moco?:'.$sintoma['PREGUNTA1'].'<br/>';
            echo '¿Tiene sangre?:'.$sintoma['PREGUNTA2'].'<br/>';
            echo 'Comenzo hace:'; if($sintoma['INICIO']>72) {echo ' más de 3 dias';}
                                                          else{echo $sintoma['INICIO'].' horas <br/>';}
            echo 'Duración del dolor:'.$sintoma['DURACION'].' minutos<br/>';
            echo 'El dolor le repite:'.$sintoma['REPETICION'].' al día<br/>';
            echo '</p>';
        }
        echo '</p>';
    }

}

?>
<br/>
<?php
    if (isset($_SESSION['antecedente'])){
        echo '<hr>';
        echo '<h2>'.'Antecedente:'.'</h2>';
        echo '<hr>';
        echo '<p>';
        echo $_SESSION['antecedente'][1];
        echo '</p>';
    }
?>
<div>
<?php
    if (isset($_SESSION['CONSTANTES'])){
        echo '<hr>';
        echo '<h2> Constantes: </h2>';
        echo '<hr>';
        echo '<p>';
        foreach($_SESSION['CONSTANTES'] as $key => $constante){
            if ($key=='NIHSS'){
                $constante=$_SESSION['NIHSS'];
                    echo 'Estado de conciencia: '.$constante;
                    echo '<br/>';
                }
            else{
            echo $key.': '.$constante;
            echo '<br/>';
            }
        }
        echo '</p>';
    }
   ?>
<br/>
<br/>
 <?php
   if (isset($_SESSION['SIGNOS'])){
        echo '<hr>';
        echo '<h2> Signos: </h2>';
        echo '<hr>';
        echo '<p>';
        foreach($_SESSION['SIGNOS'] as $key => $signo){
            
            if ($key == 'PULSO_RADIAL'){echo 'Intensidad del pulso radial'.': ';echo $_SESSION['PULSO_RADIAL'];}
            if ($key == 'TIPO_PIEL'){echo 'Temperatura corporal: '; echo $_SESSION['TIPO_PIEL'];}
            if ($key == 'RESPIRACION'){echo $key.': ';echo $_SESSION['RESPIRACION'];

            }
            echo '<br/>';
            
        }
        echo '</p>';
    }

?>
</div>
</div>
<div class="centro">
    <a href="nuevo_paciente.php">Proximo triaje</a>
</div>

<?php
//echo $_SESSION['IDS']['EPISODIO_ID'].'<br/>';
//echo $_SESSION['IDS']['CONSTANTE_ID'].'<br/>';
//echo $_SESSION['IDS']['SIGNO_ID'].'<br/>';
?>