<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include '../Base de datos/conexion.php';
 $sql= 'INSERT INTO MOTIVOS_URGENCIA VALUES (\'\',\''.$_SESSION['Motivo_urgencia'].'\',\'1\',\'\',\'\',\'\',\'\',\'1\',\'\',\'\',\'\',\'\')';
 if ($dbh->Execute($sql) == FALSE) {echo $dbh->ErrorMsg();}

 $MOTIVO_ID = $dbh->Execute('select MOTIVOS_URGENCIA_seq.CURRVAL from DUAL');
 $_SESSION['IDS']['MOTIVO_ID'] = $MOTIVO_ID->fields[0];
 echo $_SESSION['IDS']['MOTIVO_ID'];
 $FECHA = $dbh->Execute('select sysdate from dual');
 foreach ($FECHA as $tiempo)
    $dia = $tiempo['SYSDATE'];

 //------ Almacenamos de una buena vez el episodio de triaje ---------/
 $sql = 'INSERT INTO EPISODIOS_TRIAJE VALUES (\'\','.$_SESSION['medico'][0].',\''.$MOTIVO_ID->fields[0].'\','.$_SESSION['paciente'][0].',\''.$dia.'\')';
 $guarde = $dbh->Execute($sql);
 if ($guarde==false){echo $dbh->ErrorMsg();}

 $EPISODIO_ID = $dbh->Execute('select episodios_triaje_seq.CURRVAL from DUAL');
 if ($EPISODIO_ID == FALSE) {echo $dbh->ErrorMsg();}
 $_SESSION['IDS']['EPISODIO_ID']= $EPISODIO_ID->fields[0];
 echo $_SESSION['IDS']['EPISODIO_ID'];
header('Location: ../Cliente_Web/sintomas.php');
?>
