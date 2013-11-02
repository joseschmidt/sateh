<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    if(strstr($sintoma['DESCRIPCION'],'SIN SINTOMAS')){
        echo 'hello :P <br/>';


        $SINSINTOMA_sql='insert into SINTOMAS values (\'\',\''.$sintoma['DESCRIPCION'].'\',\''.$sintoma['LOCALIZACION'].'\','.$sintoma['PREGUNTA1'].','.$sintoma['PREGUNTA2'].',';
        $SINSINTOMA_sql= $SINSINTOMA_sql.$D_I_R_SQL;
        $SINSINTOMA_sql= $SINSINTOMA_sql.'\'1\',\'\',\'\')';

        echo $SINSINTOMA_sql;
        $guarde= $dbh->Execute($SINSINTOMA_sql);
        if ($guarde == FALSE) {echo $dbh->ErrorMsg();}

        $SINSINTOMA_ID = $dbh->Execute('select sintomas_seq.CURRVAL from DUAL');

        $_SESSION['IDS']['SINTOMAS']['SINSINTOMA_ID'] = $SINSINTOMA_ID->fields[0];

        $guarde= $dbh->Execute('INSERT INTO SE_AGRUPAN VALUES (\''.$SINSINTOMA_ID->fields[0].'\',\''.$_SESSION['IDS']['EPISODIO_ID'].'\')');

        }

?>
