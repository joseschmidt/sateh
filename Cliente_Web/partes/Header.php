<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Base de datos/conexion.php';
include_once 'partes/variables.php';

if (!isset($_SESSION['logeado']))
    $_SESSION['logeado']=FALSE;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <script type="text/javascript" src="js/dojo/dojo.xd.js" djConfig="parOnLoad: true"></script>
        <!-- sliders para sintomas -->
        <?php if (strstr($_SERVER['PHP_SELF'],'sintomas')){?>
        <?php $nombre_sintoma= 'DOLOR'; $nivel['N_ETIQUETAS']=3; $nivel['ETIQUETAS']="'Poco dolor','Dolor moderado','Dolor insorportable'"; $nivel['MINIMO']=1; $nivel['MAXIMO']=10; include 'partes/slider.php';?>
        <?php $nombre_sintoma= 'FIEBRE'; $nivel['N_ETIQUETAS']=6; $nivel['ETIQUETAS']="'38',' ','Fiebre alta','41',' ','Fiebre muy alta'"; $nivel['MINIMO']=38; $nivel['MAXIMO']=43; include 'partes/slider.php';?>
        <?php $nombre_sintoma= 'TOS';  include 'partes/slider.php';?>
        <?php $nombre_sintoma= 'DIARREA'; $nivel['N_ETIQUETAS']=3; $nivel['ETIQUETAS']="'Poco dolor','Dolor moderado','Dolor insorportable'"; $nivel['MINIMO']=10; $nivel['MAXIMO']=10; include 'partes/slider.php';?>
        <?php } ?>
        <!-- sliders para constantes -->
        <?php if (strstr($_SERVER['PHP_SELF'],'signos_constantes')){?>
        <?php $constante= 'TEMP'; $nivel['N_ETIQUETAS']=5; $nivel['ETIQUETAS']="'35','Temperatura normal','39','40','Temperatura muy alta'"; $nivel['MINIMO']=35; $nivel['MAXIMO']=43;$nivel['NORMAL']=37; include 'partes/slider_constantes.php';?>
        <?php $constante= 'TAS'; $nivel['N_ETIQUETAS']=14; $nivel['ETIQUETAS']="'Tensión arterial muy baja',' ',' ','110','120',' ','140','Normal ',' ',' ','180','190','200','Tensión arterial sistolica muy alta'"; $nivel['MINIMO']=80; $nivel['MAXIMO']=210;$nivel['NORMAL']=150; include 'partes/slider_constantes.php';?>
        <?php $constante= 'FC'; $nivel['N_ETIQUETAS']=6; $nivel['ETIQUETAS']="'FC muy baja','57','Normal','90','110','Frecuencia cardiaca muy alta'"; $nivel['MINIMO']=40; $nivel['MAXIMO']=125;$nivel['NORMAL']=80; include 'partes/slider_constantes.php';?>
        <?php $constante= 'FR'; $nivel['N_ETIQUETAS']=7; $nivel['ETIQUETAS']="'FR muy baja','10','Normal','20','25','30','Frecuencia respiratoria muy alta'"; $nivel['MINIMO']=5; $nivel['MAXIMO']=35;$nivel['NORMAL']=15; include 'partes/slider_constantes.php';?>
        <?php $constante= 'SATO2'; $nivel['N_ETIQUETAS']=6; $nivel['ETIQUETAS']="'SATO2 muy baja','92','94','96','Normal','100'"; $nivel['MINIMO']=90; $nivel['MAXIMO']=100;$nivel['NORMAL']=98; include 'partes/slider_constantes.php';?>
        <?php $constante= 'GLICAP'; $nivel['N_ETIQUETAS']=14; $nivel['ETIQUETAS']="'Hipoglicemia','','75','Normal',' ','90',' ','G. alterada ayuno','',' ','','120',' ','Hiperglucemia'"; $nivel['MINIMO']=65; $nivel['MAXIMO']=130;$nivel['NORMAL']=90; include 'partes/slider_constantes.php';?>
        <!-- sliders para signos -->
        <?php $constante= 'PULSOR'; $nivel['N_ETIQUETAS']=4; $nivel['ETIQUETAS']="'Falta','Debil', 'Normal','Fuerte'"; $nivel['MINIMO']=1; $nivel['MAXIMO']=13;$nivel['NORMAL']=8; include 'partes/slider_constantes.php';?>
        <?php $constante= 'PULSO'; $nivel['N_ETIQUETAS']=10; $nivel['ETIQUETAS']="'Bradicardia','49',' ','65',' ','Normal',' ','100',' ','116','Taquicardia'"; $nivel['MINIMO']=40; $nivel['MAXIMO']=125;$nivel['NORMAL']=80; include 'partes/slider_constantes.php';?>
        

        <?php } ?>

        
        <link rel="stylesheet" href="js/dijit/themes/claro/claro.css"/>
        <link rel="stylesheet" href="css/sateh.css" />
        <!-- <script type="text/javascript" src="frameworks/dojo-release-1.5.0/dijit/dijit-all.js"></script> -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SATEH - <?php echo $pagina; ?></title>
    </head>
    <body class="claro">
    <div id="contenido" >
        <!-- el div de contenido termina en el Footer -->
        <div class="encabezado">
            <img src="css/image001.png" class="encabezado-left" alt="Sociedad Venezolana de Medicina de Emergencia y Desastre" onclick="window.location.href='http://www.svmed.org'"/>
            <img src="css/cisi.png" class="encabezado-right" alt="Centro de investación de sistemas de información - UCV"/>
        Universidad Central de Venezuela<br/>
        Facultad de Ciencias<br/>
        Escuela de Computación<br/>
        Centro de Investigación de Sistemas de Información<br/>
        Sociedad Venezolana de medicina de Emergencia y Desastre<br/>
            
        </div>
        <div class="centro_y_footer">
        <?php if ($_SESSION['logeado'] == TRUE) { ?>
        <div class="bienvenido">
            <span>Actulamente atendiendo a:<?php echo $_SESSION['paciente'][1].' '.$_SESSION['paciente'][2]; ?></span>
            Bienvenid@ <?php echo $_SESSION['medico'][1].' '.$_SESSION['medico'][2]; ?>
        </div>
        <?php } else { ?>
        <div class="bienvenido">
            Por favor ingrese al sistema.
        </div>
        <?php }?>