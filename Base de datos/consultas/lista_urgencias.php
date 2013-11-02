<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//Conexión PDO
/*$resulset = $dbh->query('SELECT * FROM motivos_maestra
    where descripcion not in(\'POLITRAUMATISMO SEVERO\',
                             \'NO RESPIRA\',
                             \'SIN PULSO\',
                             \'ENTUBACIÓN PREHOSPITALARIA\',
                             \'PACIENTE QUE NO RESPONDE\')');
*/
//Conexión Adodb
$resulset = $dbh->Execute('SELECT * FROM motivos_maestra
    where descripcion not in(\'POLITRAUMATISMO SEVERO\',
                             \'NO RESPIRA\',
                             \'SIN PULSO\',
                             \'ENTUBACIÓN PREHOSPITALARIA\',
                             \'PACIENTE QUE NO RESPONDE\')');

?>
