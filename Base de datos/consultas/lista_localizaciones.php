<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//Conexión PDO
//$resulset = $dbh->query('SELECT * FROM triaje.sintomas_localizacion_maestra');

//Conexión Adodb
$resulset = $dbh->Execute('SELECT * FROM sintomas_localizacion_maestra WHERE LOCALIZACION<>\'NOAPLICA\'');

?>
