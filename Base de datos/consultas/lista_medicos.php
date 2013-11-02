<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//Conexión con PDO
//$resulset = $dbh->query('SELECT * FROM doctores');

//Conexión con Adodb
$resulset = $dbh->Execute('SELECT * FROM doctores');

?>
