<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    if(strstr($sintoma['DESCRIPCION'],'DOLOR')){

        SWITCH($sintoma['NIVEL']){
            //Transformamos la escala de dolor en alguno de los tres valores del atributo nivel.
            case 1:  $DOLOR_P=0;$DOLOR_VALOR=1;  BREAK;
            case 2:  $DOLOR_P=0;$DOLOR_VALOR=0.6;BREAK;
            case 3:  $DOLOR_P=0;$DOLOR_VALOR=0.3;BREAK;
            case 4:  $DOLOR_P=1;$DOLOR_VALOR=0.6;BREAK;
            case 5:  $DOLOR_P=1;$DOLOR_VALOR=1;  BREAK;
            case 6:  $DOLOR_P=1;$DOLOR_VALOR=0.6;BREAK;
            case 7:  $DOLOR_P=2;$DOLOR_VALOR=0.7;BREAK;
            case 8:  $DOLOR_P=2;$DOLOR_VALOR=0.8;BREAK;
            case 9:  $DOLOR_P=2;$DOLOR_VALOR=0.9;BREAK;
            case 10: $DOLOR_P=2;$DOLOR_VALOR=1;  BREAK;
            }

        
        $DOLOR_sql='insert into SINTOMAS values (\'\',\''.$sintoma['DESCRIPCION'].'\','.$sintoma['LOCALIZACION'].',\'NO\',\'NO\',';
        $DOLOR_sql= $DOLOR_sql.$D_I_R_SQL;
        $DOLOR_sql= $DOLOR_sql.'\'3\',\''.$DOLOR_VALOR.'\',\''.$DOLOR_P.'\') ';
        
        $guarde=$dbh->Execute($DOLOR_sql);
        if ($guarde == FALSE) {echo $dbh->ErrorMsg();}
        echo $DOLOR_sql;
        $DOLOR_ID = $dbh->Execute('select sintomas_seq.CURRVAL from DUAL');
        if ($guarde == FALSE) {echo $dbh->ErrorMsg();}
        $_SESSION['IDS']['SINTOMAS']['DOLOR_ID'] = $DOLOR_ID->fields[0];

  //      if ($guarde == FALSE) {echo $dbh->ErrorMsg();}
        $guarde= $dbh->Execute('INSERT INTO SE_AGRUPAN VALUES (\''.$DOLOR_ID->fields[0].'\',\''.$_SESSION['IDS']['EPISODIO_ID'].'\')');

        if(strstr($sintoma['DESCRIPCION'], 'OPRESIVO')){
           if($sintoma['NIVEL']>=7){
                if($sintoma['DURACION']>=27){
                    $_SESSION['ALERTA']=true;
                }
           }
       }
    }

?>
