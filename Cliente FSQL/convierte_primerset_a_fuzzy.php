<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once '../Base de datos/conexion.php';
// ------------- CONSTANTES ------------ //
$TEMP_TRIANGULO=2;
$TAS_TRIANGULO=15;
$FC_TRIANGULO=10;
$FR_TRIANGULO=5;
$GLICAP_TRIANGULO=10;

$constante_sql='insert into CONSTANTES VALUES (\'\',';
$constante=$_SESSION['CONSTANTES'];

SWITCH($constante['NIHSS']){
    case 2: $_SESSION['NIHSS']='Alerta';BREAK;
    case 4: $_SESSION['NIHSS']='Confuso';BREAK;
    case 7: $_SESSION['NIHSS']='Responde solo al dolor';BREAK;
}



$constante_sql= $constante_sql.'\'6\',\''.$constante['TEMP'].'\',\''.($constante['TEMP']-$TEMP_TRIANGULO).'\',\''.($constante['TEMP']+$TEMP_TRIANGULO).'\',\''.$TEMP_TRIANGULO.'\',
                \'6\',\''.$constante['TAS'].'\',\''.($constante['TAS']-$TAS_TRIANGULO).'\',\''.($constante['TAS']+$TAS_TRIANGULO).'\',\''.$TAS_TRIANGULO.'\',
                \'6\',\''.$constante['FC'].'\',\''.($constante['FC']-$FC_TRIANGULO).'\',\''.($constante['FC']+$FC_TRIANGULO).'\',\''.$FC_TRIANGULO.'\',
                \'6\',\''.$constante['FR'].'\',\''.($constante['FR']-$FR_TRIANGULO).'\',\''.($constante['FR']+$FR_TRIANGULO).'\',\''.$FR_TRIANGULO.'\',
                \''.$constante['SATO2'].'\',
                \'6\',\''.$constante['GLICAP'].'\',\''.($constante['GLICAP']-$GLICAP_TRIANGULO).'\',\''.($constante['GLICAP']+$GLICAP_TRIANGULO).'\',\''.$GLICAP_TRIANGULO.'\',
                \'3\',\''.$constante['NIHSS'].'\',\'\',\'\',\'\')';

//echo $constante_sql;
$guarde = $dbh -> Execute($constante_sql);
$sql = $dbh->Execute('select constantes_seq.CURRVAL from DUAL');

$_SESSION['IDS']['CONSTANTE_ID'] = $sql->fields[0];
$sql='INSERT INTO INDICA VALUES ('.$sql->fields[0].','.$_SESSION['IDS']['MOTIVO_ID'].')';
echo $sql;
$guarde = $dbh-> Execute($sql);
if ($guarde == false) { echo $dbh->ErrorMsg();}


// ---------- SIGNOS ----------//
$PULSO_TRIANGULO=10;
$RESPIRACION_TRIANGULO=1;

$signo_sql='insert into SIGNOS values (\'\',';
$signo=$_SESSION['SIGNOS'];

SWITCH($signo['TIPO_PIEL']){
    case 1: $TIPOT=0;$TIPOV=1;BREAK;
    case 2: $TIPOT=1;$TIPOV=1;BREAK;
    case 3: $TIPOT=2;$TIPOV=1;BREAK;
    default: $TIPOT=3;$TIPOV=1;
}

SWITCH($signo['PULSO_RADIAL']){
    case 1: $_SESSION['PULSO_RADIAL']='Falta';BREAK;
    case 2: $_SESSION['PULSO_RADIAL']='Falta';BREAK;
    case 3: $_SESSION['PULSO_RADIAL']='Debil';BREAK;
    case 4: $_SESSION['PULSO_RADIAL']='Debil';BREAK;
    case 5: $_SESSION['PULSO_RADIAL']='Debil';BREAK;
    case 6: $_SESSION['PULSO_RADIAL']='Normal';BREAK;
    case 7: $_SESSION['PULSO_RADIAL']='Normal';BREAK;
    case 8: $_SESSION['PULSO_RADIAL']='Normal';BREAK;
    case 9: $_SESSION['PULSO_RADIAL']='Normal';BREAK;
    case 10: $_SESSION['PULSO_RADIAL']='Fuerte';BREAK;
    case 11: $_SESSION['PULSO_RADIAL']='Fuerte';BREAK;
    case 12: $_SESSION['PULSO_RADIAL']='Fuerte';BREAK;
    case 13: $_SESSION['PULSO_RADIAL']='Fuerte';BREAK;
    }

    SWITCH($signo['RESPIRACION']){
    case 2: $_SESSION['RESPIRACION']='Lenta y profunda';BREAK;
    case 4: $_SESSION['RESPIRACION']='Normal';BREAK;
    case 7: $_SESSION['RESPIRACION']='Superficial y rapida';BREAK;
}

SWITCH($signo['TIPO_PIEL']){
    case 1: $_SESSION['TIPO_PIEL']='Piel fría y palida';BREAK;
    case 2: $_SESSION['TIPO_PIEL']='Sudada y caliente';BREAK;
    case 3: $_SESSION['TIPO_PIEL']='Muy caliente';BREAK;
    default: $_SESSION['TIPO_PIEL']='Normal';BREAK;
}

$signo_sql = $signo_sql.'\'3\',\''.$TIPOV.'\',\''.$TIPOT.'\',
                         \'3\',\''.$signo['PULSO_RADIAL'].'\',\'\',\'\',\'\',
                         \'6\',\''.$signo['PULSO'].'\',\''.($signo['PULSO']-$PULSO_TRIANGULO).'\',\''.($signo['PULSO']+$PULSO_TRIANGULO).'\',\''.$PULSO_TRIANGULO.'\',
                         \'6\',\''.$signo['RESPIRACION'].'\',\''.($signo['RESPIRACION']-$RESPIRACION_TRIANGULO).'\',\''.($signo['RESPIRACION']+$RESPIRACION_TRIANGULO).'\',\''.$RESPIRACION_TRIANGULO.'\')';

$guarde = $dbh -> Execute($signo_sql);

$sql = $dbh->Execute('select signos_seq.CURRVAL from DUAL');
$_SESSION['IDS']['SIGNO_ID'] = $sql->fields[0];

$guarde = $dbh-> Execute('INSERT INTO REFLEJA VALUES ('.$sql->fields[0].','.$_SESSION['IDS']['EPISODIO_ID'].')');
if ($guarde == false) { echo $dbh->ErrorMsg();}

header('Location: resultado_consulta_difusa.php')

?>
