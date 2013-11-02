<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    if(strstr($sintoma['DESCRIPCION'],'DIARREA')){

        $DIARREA_sql='insert into SINTOMAS values (\'\',\''.$sintoma['DESCRIPCION'].'\',\'\',\''.$sintoma['PREGUNTA1'].'\',\''.$sintoma['PREGUNTA2'].'\',';
        $DIARREA_sql= $DIARREA_sql.$D_I_R_SQL;
        $DIARREA_sql= $DIARREA_sql.'\'1\',\'\',\'\')';

        echo $DIARREA_sql;
        $guarde= $dbh->Execute($DIARREA_sql);
        $DIARREA_ID = $dbh->Execute('select sintomas_seq.CURRVAL from DUAL');

        $_SESSION['IDS']['SINTOMAS']['DIARREA_ID'] = $DIARREA_ID->fields[0];
        
        $guarde= $dbh->Execute('INSERT INTO SE_AGRUPAN VALUES (\''.$DIARREA_ID->fields[0].'\',\''.$_SESSION['IDS']['EPISODIO_ID'].'\')');

    }

?>
