<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 
--   La función FSQL2SQL traduce una consulta en FSQL a su equivalente en SQL.
--   Devuelve el número de errores cometidos (0 si no hubo errores).
--   Si el primer carácter es '!' no efectúa la traducción.
--   # En caso de 0 errores, el resultado, la consulta en SQL, estará almacenada en
--     la tabla FSQL_QUERY y será obtenido concatenando el campo FSQL_QUERY.ATRIBUTO
--     de las tuplas de la sesión actual (FSQL_QUERY.SESSIONID=USERENV('SESSIONID')),
--     ordenados por el campo 'INDICE'.
--     -> NOTA: En dicha concatenación habrá que dejar un espacio entre cada valor de
--         'ATRIBUTO'. Este espacio se puede omitir si 'ATRIBUTO' tiene longitud 1 y
--         su primer carácter vale uno de los siguientes caracteres:
--         '+', '-', '*', '/', '.', ';', ',', '=', '>', '<', '(' y ')'.
--   # En caso de encontrar errores, los mensajes de error correspondientes se encuentran
--     en el campo FSQL_ERRORS.MSG_ERROR de las tuplas de la sesión actual (SESSIONID),
--     ordenados en orden de aparición por el campo INDICE.
 *
 * Lee la variable de $_SESSION['FSQL'] y retorna el grado de pertenencia de la consulta
 *
 * TODO List:
 * Despues de obtener los resultados de la consulta FSQL es necesario hay que limpiar la tabla ALL QUERIES usando:
 * DELETE SYS.FSQL_ALL_QUERIES; COMMIT;
 * 
 */

session_start();
include_once '../Base de datos/conexion.php';
include_once '../Modulo de Triaje/reglas_difusas.php';
//$_SESSION['FSQL']='select \'\'CATEGORIA\'\' as categoria, CDEG(*) from PLAYERS WHERE HEIGHT FEQ $NORMAL';
$i=0;
foreach($diagnosticos as $key => $diagnostico){
    //$diagnostico=$diagnosticos[10];
    // el query 4 tiene problemas
    $fsql2sql = "
    DECLARE
    numero number;
    c      string(2000);
    BEGIN
    c :='".$diagnostico."';
    :numero := FSQL_PKG.FSQL2SQL (c);
    DBMS_OUTPUT.PUT_LINE(numero);
    END;
    ";
    $numero=0;
    $fsql = $dbh -> PrepareSP($fsql2sql);
    $dbh -> OutParameter($fsql,$numero,'numero');
    $fsql = $dbh -> Execute($fsql);
    if ($fsql == false){echo $dbh->ErrorMsg().'<br/><br/><br/>';}
    if ($numero == '0'){
        echo 'consulta ejecutada correctamente'."\n";
        $concatenar_sql = $dbh->Execute('select atributo from FSQL_QUERY');
        $sql = "";
        foreach($concatenar_sql as $j => $palabra){
            if (strstr($palabra['ATRIBUTO'], "'")){
               $palabra['ATRIBUTO']=str_replace("'","'",$palabra['ATRIBUTO']);
            }
            $sql = $sql.$palabra['ATRIBUTO'].' ';
            
        }
        //if($key==10){echo $sql;}
        $resultset = $dbh->Execute($sql);
        if ($resultset == false){echo $dbh->ErrorMsg().' '.$key.'<BR/>';}
        foreach ($resultset as $resultado){
            $_SESSION['DIAGNOSTICOS'][$key]=$resultado;
            //echo $resultado['CATEGORIA'].'<br/>';
        }
        //echo '<br/>';
        //echo '<br/>';

    }

     else {

        echo '<BR/>hay problemas con la consulta FSQL'.' '.$key.'<BR/>';
        echo $diagnostico.'<br/>';
    }
}
header('Location: ../Cliente_Web/resultado.php');
?>