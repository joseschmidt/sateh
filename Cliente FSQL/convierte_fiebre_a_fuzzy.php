<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    if(strstr($sintoma['DESCRIPCION'],'FIEBRE')){
        echo 'hello :P <br/>';
        SWITCH($sintoma['NIVEL']){
            //Transformamos la escala de FIEBRE en alguno de los tres valores del atributo nivel.
            case 38:  $FIEBRE_P=0;$FIEBRE_VALOR=1;   BREAK;
            case 39:  $FIEBRE_P=1;$FIEBRE_VALOR=0.6; BREAK;
            case 40:  $FIEBRE_P=1;$FIEBRE_VALOR=1;   BREAK;
            case 41:  $FIEBRE_P=1;$FIEBRE_VALOR=0.6; BREAK;
            case 42:  $FIEBRE_P=2;$FIEBRE_VALOR=0.6; BREAK;
            case 43:  $FIEBRE_P=2;$FIEBRE_VALOR=1;   BREAK;
            }


        $FIEBRE_sql='insert into SINTOMAS values (\'\',\''.$sintoma['DESCRIPCION'].'\',\''.$sintoma['LOCALIZACION'].'\','.$sintoma['PREGUNTA1'].','.$sintoma['PREGUNTA2'].',';
        $FIEBRE_sql= $FIEBRE_sql.$D_I_R_SQL;
        $FIEBRE_sql= $FIEBRE_sql.'\'3\',\''.$FIEBRE_VALOR.'\',\''.$FIEBRE_P.'\')';

        echo $FIEBRE_sql;
        $guarde= $dbh->Execute($FIEBRE_sql);
        if ($guarde == FALSE) {echo $dbh->ErrorMsg();}

        $FIEBRE_ID = $dbh->Execute('select sintomas_seq.CURRVAL from DUAL');

        $_SESSION['IDS']['SINTOMAS']['FIEBRE_ID'] = $FIEBRE_ID->fields[0];

        $guarde= $dbh->Execute('INSERT INTO SE_AGRUPAN VALUES (\''.$FIEBRE_ID->fields[0].'\',\''.$_SESSION['IDS']['EPISODIO_ID'].'\')');

        }


?>
