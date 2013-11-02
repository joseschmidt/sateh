<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    if(strstr($sintoma['DESCRIPCION'],'TOS ')){

        $TOS_ID = $dbh->Execute('select sintomas_seq.CURRVAL from DUAL');
        $TOS_sql='insert into SINTOMAS values (\'\',\''.$sintoma['DESCRIPCION'].'\',\''.$sintoma['LOCALIZACION'].'\','.$sintoma['PREGUNTA1'].','.$sintoma['PREGUNTA2'].',';
        $TOS_sql= $TOS_sql.$D_I_R_SQL;
        $TOS_sql= $TOS_sql.'\'1\',\'\',\'\')';

        echo '<br/>';
        echo $TOS_sql;
        $guarde= $dbh->Execute($TOS_sql);
          if ($guarde == FALSE) {echo $dbh->ErrorMsg();}

        $TOS_ID = $dbh->Execute('select sintomas_seq.CURRVAL from DUAL');

        $_SESSION['IDS']['SINTOMAS']['TOS_ID'] = $TOS_ID->fields[0];

        $guarde= $dbh->Execute('INSERT INTO SE_AGRUPAN VALUES (\''.$TOS_ID->fields[0].'\',\''.$_SESSION['IDS']['EPISODIO_ID'].'\')');

    }

?>
