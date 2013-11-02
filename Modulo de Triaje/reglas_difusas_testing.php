<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$diagnosticos[4]="
            SELECT ''INFARTO MIOCARDIO AGUDO'' AS CATEGORIA, CDEG(*), ANT.DESCRIPCION
            FROM
                    SINTOMAS SINT,
                    MOTIVOS_URGENCIA M_U,
                    EPISODIOS_TRIAJE ET,
                    PACIENTES P,
                    A_PADECIDO A_P,
                    ANTECEDENTES ANT,
                    INDICA IND,
                    CONSTANTES CONS,
                    SIGNOS SIG,
                    REFLEJA REF
            where

                P.CODIGO=".$_SESSION['paciente'][0]." AND
                ET.CODIGO=".$_SESSION['IDS']['EPISODIO_ID']." AND
                A_P.PACIENTE_CODIGO=P.CODIGO AND
                A_P.ANTECEDENTE_CODIGO=ANT.CODIGO AND
                IND.EPISODIO_TRIAJE_CODIGO=ET.CODIGO AND
                CONS.CODIGO=IND.CONSTANTE_CODIGO AND
                REF.SIGNO_CODIGO=SIG.CODIGO AND
                REF.EPISODIO_TRIAJE_CODIGO=ET.CODIGO AND

                NOT SINT.NIVEL FEQ \$LIGERO AND
                (M_U.DESCRIPCION = ''DOLOR'' OR M_U.DESCRIPCION = ''ENTUBACIÓN PREHOSPITALARIA'' OR M_U.DESCRIPCION = ''SIN PULSO'' OR M_U.DESCRIPCION = ''NO RESPIRA'' OR M_U.DESCRIPCION = ''POLITRAUMATISMO SEVERO'' OR M_U.DESCRIPCION = ''DIFICULTAD RESPIRATORIA'' OR M_U.DESCRIPCION = ''OTRO'') AND
                SINT.DESCRIPCION LIKE ''DOLOR %'' AND
                (SINT.LOCALIZACION = ''TORAX'' OR SINT.LOCALIZACION = ''ABDOMEN'' OR SINT.LOCALIZACION = ''BRAZO IZQUIERDO'')



            ";


?>
