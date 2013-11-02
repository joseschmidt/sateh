<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    $dbh->Execute('update pacientes set status=\'T\' where codigo='.$_SESSION['paciente'][0].'AND codigo<>1' );
?>
