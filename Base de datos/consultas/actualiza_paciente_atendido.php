<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$dbh->Execute('update pacientes set status=\'A\' where codigo='.$_SESSION['atendido']);
?>
