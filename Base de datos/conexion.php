<?php
/*
* Archivo de prueba para la conexión con la base de datos.
*
*/

//Conexion utilizando pdo
/*
$dsn = 'oci:dbname=sateh;charset=UTF8';
$user = 'triaje';
$password = '1234';

try{
	$dbh = new PDO($dsn,$user,$password);
}
catch(PDOException $e){
	echo 'Connection failed:'.$e->getMessage();
}
 * */

//Conexion utiliznado adoDB
include "Frameworks/adodb5/adodb.inc.php";

$tnsName='sateh';
$user = 'system';
$password = 'manager';


$dbh = NewADOConnection("oci8");
$dbh -> charSet ='UTF8';
$dbh -> Connect($tnsName,$user,$password);
$dbh -> Execute('ALTER SESSION SET NLS_DATE_FORMAT=\'DD-MON-YYYY HH24:MI:SS\';');


?>


