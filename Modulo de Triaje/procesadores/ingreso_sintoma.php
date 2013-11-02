<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$i=0;

if (($_POST['DOLOR'])== "ON"){
    echo 'Tengo dolor :)';
    $_SESSION['SINTOMAS'][$i]=array( 'DESCRIPCION' => $_POST['DOLOR_DESCRIPCION'],'LOCALIZACION' => $_POST['DOLOR_LOCALIZACION'],'PREGUNTA1' => NULL,'PREGUNTA2' => NULL,'NIVEL' => $_POST['DOLOR_nivel'],'DURACION' => $_POST['DOLOR_duracion'],'INICIO' => $_POST['DOLOR_inicio'], 'REPETICION' => $_POST['DOLOR_repeticion']);
    $i++;
}

if (($_POST['FIEBRE'])== "ON"){
    echo 'Tengo fiebre :)';
    $_SESSION['SINTOMAS'][$i]=array( 'DESCRIPCION' => 'FIEBRE','LOCALIZACION' => NULL,'PREGUNTA1' => $_POST['FIEBRE_PREGUNTA1'],'PREGUNTA2' => $_POST['FIEBRE_PREGUNTA2'],'NIVEL' => $_POST['FIEBRE_nivel'],'DURACION' => $_POST['FIEBRE_duracion'],'INICIO' => $_POST['FIEBRE_inicio'], 'REPETICION' => $_POST['FIEBRE_repeticion']);
    $i++;
}

if (($_POST['TOS'])== "ON"){
    echo 'Tengo tos :)';
    $_SESSION['SINTOMAS'][$i]=array( 'DESCRIPCION' => $_POST['TOS_DESCRIPCION'],'LOCALIZACION' => NULL,'PREGUNTA1' => $_POST['TOS_PREGUNTA1'],'PREGUNTA2' => $_POST['TOS_PREGUNTA2'],'NIVEL' => NULL,'DURACION' => $_POST['TOS_duracion'],'INICIO' => $_POST['TOS_inicio'], 'REPETICION' => $_POST['TOS_repeticion']);
    $i++;
}

if (($_POST['DIARREA'])== "ON"){
    echo 'Tengo diarrea :)';
    $_SESSION['SINTOMAS'][$i]=array( 'DESCRIPCION' => $_POST['DIARREA_DESCRIPCION'],'LOCALIZACION' => NULL,'PREGUNTA1' => $_POST['DIARREA_PREGUNTA1'],'PREGUNTA2' => $_POST['DIARREA_PREGUNTA2'],'NIVEL' => NULL,'DURACION' => $_POST['DIARREA_duracion'],'INICIO' => $_POST['DIARREA_inicio'], 'REPETICION' => $_POST['DIARREA_repeticion']);
    $i++;
}
if ($i==0){
    //No hay sintomas
    $_SESSION['SINTOMAS'][$i]=array( 'DESCRIPCION' => 'SIN SINTOMAS','LOCALIZACION' => NULL,'PREGUNTA1' => 'NO','PREGUNTA2' => 'NO','NIVEL' => NULL,'DURACION' => NULL,'INICIO' => NULL, 'REPETICION' => NULL);
}

header('Location: ../../Cliente FSQL/convierte_sintomas_a_fuzzy.php');
?>
