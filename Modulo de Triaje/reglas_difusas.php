<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$from='
                    SINTOMAS SINT,
                    MOTIVOS_URGENCIA M_U,
                    EPISODIOS_TRIAJE ET,
                    PACIENTES P,
                    A_PADECIDO A_P,
                    ANTECEDENTES ANT,
                    INDICA IND,
                    CONSTANTES CONS,
                    SIGNOS SIG,
                    REFLEJA REF,
                    SE_AGRUPAN S_A';

$join='
                P.CODIGO='.$_SESSION['paciente'][0].' AND
                ET.PACIENTE_CODIGO='.$_SESSION['paciente'][0].' AND
                ET.CODIGO='.$_SESSION['IDS']['EPISODIO_ID'].' AND
                A_P.PACIENTE_CODIGO='.$_SESSION['paciente'][0].' AND
                A_P.ANTECEDENTE_CODIGO=ANT.CODIGO AND
                IND.EPISODIO_TRIAJE_CODIGO='.$_SESSION['IDS']['EPISODIO_ID'].' AND
                CONS.CODIGO=IND.CONSTANTE_CODIGO AND
                REF.SIGNO_CODIGO=SIG.CODIGO AND
                REF.EPISODIO_TRIAJE_CODIGO='.$_SESSION['IDS']['EPISODIO_ID'].' AND
                S_A.EPISODIO_TRIAJE_CODIGO='.$_SESSION['IDS']['EPISODIO_ID'].' AND
                S_A.SINTOMA_CODIGO=SINT.CODIGO AND';

$from_2_sintomas='
                    SINTOMAS SINT,
                    SINTOMAS SINT2,
                    MOTIVOS_URGENCIA M_U,
                    EPISODIOS_TRIAJE ET,
                    PACIENTES P,
                    A_PADECIDO A_P,
                    ANTECEDENTES ANT,
                    INDICA IND,
                    CONSTANTES CONS,
                    SIGNOS SIG,
                    REFLEJA REF,
                    SE_AGRUPAN S_A';

$join_2_sintomas='
                P.CODIGO='.$_SESSION['paciente'][0].' AND
                ET.CODIGO='.$_SESSION['IDS']['EPISODIO_ID'].' AND
                A_P.PACIENTE_CODIGO='.$_SESSION['paciente'][0].' AND
                A_P.ANTECEDENTE_CODIGO=ANT.CODIGO AND
                IND.EPISODIO_TRIAJE_CODIGO='.$_SESSION['IDS']['EPISODIO_ID'].' AND
                CONS.CODIGO=IND.CONSTANTE_CODIGO AND
                REF.SIGNO_CODIGO=SIG.CODIGO AND
                REF.EPISODIO_TRIAJE_CODIGO='.$_SESSION['IDS']['EPISODIO_ID'].' AND
                S_A.EPISODIO_TRIAJE_CODIGO='.$_SESSION['IDS']['EPISODIO_ID'].' AND
                (S_A.SINTOMA_CODIGO=SINT.CODIGO OR S_A.SINTOMA_CODIGO=SINT2.CODIGO) AND';

$from_3_sintomas='
                    SINTOMAS SINT,
                    SINTOMAS SINT2,
                    SINTOMAS SINT3,
                    MOTIVOS_URGENCIA M_U,
                    EPISODIOS_TRIAJE ET,
                    PACIENTES P,
                    A_PADECIDO A_P,
                    ANTECEDENTES ANT,
                    INDICA IND,
                    CONSTANTES CONS,
                    SIGNOS SIG,
                    REFLEJA REF,
                    SE_AGRUPAN S_A';

$join_3_sintomas='
                P.CODIGO='.$_SESSION['paciente'][0].' AND
                ET.CODIGO='.$_SESSION['IDS']['EPISODIO_ID'].' AND
                A_P.PACIENTE_CODIGO='.$_SESSION['paciente'][0].' AND
                A_P.ANTECEDENTE_CODIGO=ANT.CODIGO AND
                IND.EPISODIO_TRIAJE_CODIGO='.$_SESSION['IDS']['EPISODIO_ID'].' AND
                CONS.CODIGO=IND.CONSTANTE_CODIGO AND
                REF.SIGNO_CODIGO=SIG.CODIGO AND
                REF.EPISODIO_TRIAJE_CODIGO='.$_SESSION['IDS']['EPISODIO_ID'].' AND
                S_A.EPISODIO_TRIAJE_CODIGO='.$_SESSION['IDS']['EPISODIO_ID'].' AND
                (S_A.SINTOMA_CODIGO=SINT.CODIGO OR S_A.SINTOMA_CODIGO=SINT2.CODIGO OR S_A.SINTOMA_CODIGO=SINT3.CODIGO) AND';

$from_4_sintomas='
                    SINTOMAS SINT,
                    SINTOMAS SINT2,
                    SINTOMAS SINT3,
                    SINTOMAS SINT4,
                    MOTIVOS_URGENCIA M_U,
                    EPISODIOS_TRIAJE ET,
                    PACIENTES P,
                    A_PADECIDO A_P,
                    ANTECEDENTES ANT,
                    INDICA IND,
                    CONSTANTES CONS,
                    SIGNOS SIG,
                    REFLEJA REF,
                    SE_AGRUPAN S_A';

$join_4_sintomas='
                P.CODIGO='.$_SESSION['paciente'][0].' AND
                ET.CODIGO='.$_SESSION['IDS']['EPISODIO_ID'].' AND
                A_P.PACIENTE_CODIGO='.$_SESSION['paciente'][0].' AND
                A_P.ANTECEDENTE_CODIGO=ANT.CODIGO AND
                IND.EPISODIO_TRIAJE_CODIGO='.$_SESSION['IDS']['EPISODIO_ID'].' AND
                CONS.CODIGO=IND.CONSTANTE_CODIGO AND
                REF.SIGNO_CODIGO=SIG.CODIGO AND
                REF.EPISODIO_TRIAJE_CODIGO='.$_SESSION['IDS']['EPISODIO_ID'].' AND
                S_A.EPISODIO_TRIAJE_CODIGO='.$_SESSION['IDS']['EPISODIO_ID'].' AND
                (S_A.SINTOMA_CODIGO=SINT.CODIGO OR S_A.SINTOMA_CODIGO=SINT2.CODIGO OR S_A.SINTOMA_CODIGO=SINT3.CODIGO OR S_A.SINTOMA_CODIGO=SINT4.CODIGO) AND';


$diagnosticos;
$diagnosticos[0]="SELECT ''URGENCIA HIPERTENSIVA'' AS CATEGORIA, ANT.DESCRIPCION, CDEG(*)
                FROM ".$from."
                WHERE ".$join."

            CONS.TAS FGT 170 AND
            CONS.NIHSS FEQ \$ALERTA AND
            CONS.FR FEQ \$NORMAL AND
            M_U.DESCRIPCION <> ''FIEBRE'' AND
            M_U.DESCRIPCION <> ''DIARREA'' AND
            SINT.DESCRIPCION LIKE ''DOLOR %'' AND SINT.LOCALIZACION=''CABEZA''
            
";
$diagnosticos[1]="
            select ''EMERGENCIA HIPERTENSIVA CON ENCEFALOPATIA HIPERTENSIVA'' as CATEGORIA, ANT.DESCRIPCION, CDEG(*)

            FROM ".$from."
            WHERE ".$join."

            CONS.TAS FEQ $[160,170,1000,10001] 0.5 AND
            NOT CONS.NIHSS FEQ \$alerta 0.7 AND
            CONS.FR FEQ \$normal 0.7 AND
            M_U.DESCRIPCION <> ''FIEBRE'' AND
            M_U.DESCRIPCION <> ''DIARREA''
            
            
            ";
$diagnosticos[2]="
            select ''EMERGENCIA HIPERTENSIVA CON EDEMA AGUDO DE PULMON'' as CATEGORIA, ANT.DESCRIPCION, CDEG(*)
            FROM ".$from."
            WHERE ".$join."

            CONS.TAS FGT 170 AND
            CONS.NIHSS FEQ \$alerta AND
            CONS.FR FEQ \$normal AND
            M_U.DESCRIPCION <> ''FIEBRE'' AND
            M_U.DESCRIPCION <> ''DIARREA'' AND
            SINT.DESCRIPCION LIKE ''TOS %'' AND SINT.PREGUNTA1=''ON''
            ";
$diagnosticos[3]="
            select ''EMERGENCIA HIPERTENSIVA CON EDEMA AGUDO DE PULMON E INMINENTE PARO CARDIACO'' as CATEGORIA, ANT.DESCRIPCION, CDEG(*)
            FROM ".$from."
            WHERE ".$join."

            CONS.TAS FGT 170 AND
            CONS.NIHSS FEQ \$alerta AND
            (CONS.FR FEQ \$bradipnea OR CONS.FR FEQ \$taquipnea) AND
            M_U.DESCRIPCION <> ''FIEBRE'' AND
            M_U.DESCRIPCION <> ''DIARREA'' AND
            SINT.DESCRIPCION LIKE ''TOS %'' AND SINT.PREGUNTA1=''ON'' AND
            P.EDAD > 29
            ";

$diagnosticos[5]="
            select ''NEUMONIA'' as CATEGORIA, ANT.DESCRIPCION, CDEG(*)
            FROM 
                 ".$from_2_sintomas."
            WHERE ".$join_2_sintomas."
                
                M_U.DESCRIPCION <> ''DIARREA'' AND
                M_U.DESCRIPCION <> ''DOLOR'' AND
                SINT.DESCRIPCION LIKE ''TOS %'' AND
                SINT2.DESCRIPCION = ''FIEBRE'' AND
                CONS.NIHSS FEQ \$alerta 0.7 AND
                CONS.TEMP FEQ \$normal 0.7 AND
                SIG.RESPIRACION FEQ \$superficial_y_rapida 0.7 

            ";
$diagnosticos[6]="
            select ''ASMA LEVE'' as CATEGORIA, ANT.DESCRIPCION, CDEG(*)
            FROM ".$from."
            WHERE ".$join."
                
                SINT.DESCRIPCION LIKE ''TOS %'' AND
                CONS.NIHSS FEQ \$alerta AND
                CONS.FR FEQ \$normal 0.7 AND
                CONS.FC FLT 100 0.7 AND
                CONS.SATO2 > 95 AND
                SIG.RESPIRACION FEQ \$normal 0.7 AND
                M_U.DESCRIPCION <> ''DIARREA'' AND
                M_U.DESCRIPCION <> ''DOLOR'' AND
                M_U.DESCRIPCION <> ''FIEBRE'' 
                
                

            ";
$diagnosticos[7]="
            select ''ASMA MODERADA'' as CATEGORIA, ANT.DESCRIPCION, CDEG(*)
            FROM ".$from."
            WHERE ".$join."
                
                CONS.NIHSS FEQ \$alerta AND
                CONS.FR FLT 30 0.7 AND
                CONS.FC FGT 100 AND CONS.FC FLT 120 AND
                CONS.SATO2 > 91 AND CONS.SATO2 < 95 AND
                SIG.RESPIRACION FLT \$normal 0.7 AND
                M_U.DESCRIPCION <> ''DIARREA'' AND
                M_U.DESCRIPCION <> ''DOLOR'' AND
                M_U.DESCRIPCION <> ''FIEBRE'' AND
                SINT.DESCRIPCION LIKE ''TOS %'' 
                ";

$diagnosticos[8]="
            select ''DENGUE TIPO2'' as CATEGORIA, ANT.DESCRIPCION, CDEG(*)
            FROM ".$from."
            WHERE ".$join."
                
                M_U.DESCRIPCION <> ''DIARREA'' AND
                M_U.DESCRIPCION <> ''TOS'' AND
                (CONS.TEMP FGT 38 OR CONS.TEMP FEQ \$baja) AND
                CONS.TAS FEQ \$muy_alta AND
                 NOT CONS.NIHSS FEQ \$alerta AND
                CONS.FR FEQ \$bradipnea 0.7 AND
                CONS.FC FEQ \$muy_baja ";
                
$diagnosticos[9]="
            select ''DENGUE TIPO3'' as CATEGORIA, ANT.DESCRIPCION, CDEG(*)
            FROM ".$from."
            WHERE ".$join."
                
                CONS.TEMP FGT 38 AND
                CONS.TAS FEQ \$normal AND
                CONS.NIHSS FEQ \$alerta AND
                CONS.FR FEQ \$taquipnea 0.7 AND
                (CONS.FC FEQ \$muy_alta 0.6 or SIG.PULSO FEQ \$taquicardia) AND
                M_U.DESCRIPCION <> ''DIARREA'' AND
                M_U.DESCRIPCION <> ''TOS'' 
                
            ";

$diagnosticos[10]="
            select ''CEFALEA'' as CATEGORIA, ANT.DESCRIPCION, CDEG(*)
            FROM ".$from."
            WHERE ".$join."
                
                (SINT.DESCRIPCION = ''DOLOR INTENSO'' AND SINT.LOCALIZACION = ''CABEZA'') AND
                M_U.DESCRIPCION IN (''FIEBRE'',''DOLOR'',''OTRO'')
                
            ";
$diagnosticos[11]="
            select ''PRIORIDAD 1'' as CATEGORIA, ANT.DESCRIPCION, CDEG(*)
            FROM ".$from."
            WHERE ".$join."

            CONS.SATO2 FEQ $[0,1,91,95] 0.5

            ";
$diagnosticos[12]="
            select ''PRIORIDAD 2'' as CATEGORIA, ANT.DESCRIPCION, CDEG(*)
            FROM ".$from."
            WHERE ".$join."


            SINT.NIVEL FEQ \$intenso AND
            SINT.DESCRIPCION LIKE ''DOLOR %'' AND
            SINT.LOCALIZACION = ''TORAX'' AND
            SINT.LOCALIZACION = ''ABDOMEN'' AND
            SINT.LOCALIZACION = ''GENITALES''

            ";

$diagnosticos[13]="
            select ''PRIORIDAD 3'' as CATEGORIA, ANT.DESCRIPCION, CDEG(*)
            FROM ".$from."
            WHERE ".$join."


            CONS.TAS FEQ \$muy_alta AND
            NOT CONS.NIHSS FEQ \$alerta

            ";

$diagnosticos[14]="
            select ''PRIORIDAD 2'' as CATEGORIA, ANT.DESCRIPCION, CDEG(*)
            FROM ".$from."
            WHERE ".$join."


            CONS.FR FEQ \$bradipnea

            ";

$diagnosticos[15]="
            select ''PRIORIDAD 3'' as CATEGORIA, ANT.DESCRIPCION, CDEG(*)
            FROM ".$from."
            WHERE ".$join."


            CONS.SATO2 < 95 AND CONS.SATO2 >92

            ";

$diagnosticos[16]="
            select ''PRIORIDAD 5'' as CATEGORIA, ANT.DESCRIPCION, CDEG(*)
            FROM ".$from."
            WHERE ".$join."

            CONS.TEMP FEQ \$normal AND
            CONS.FR FEQ \$normal AND
            CONS.FC FEQ \$normal AND
            CONS.TAS FEQ \$normal AND
            CONS.GLICAP FEQ \$normal AND
            CONS.NIHSS FEQ \$alerta AND
            SIG.TIPO_PIEL FEQ \$normal AND
            SIG.PULSO_RADIAL FEQ \$normal AND
            SIG.PULSO FEQ \$normal AND
            CONS.SATO2 >= 95
            
            ";

$diagnosticos[17]="
            select ''PRIORIDAD 3'' as CATEGORIA, ANT.DESCRIPCION, CDEG(*)
            FROM ".$from."
            WHERE ".$join."


            CONS.TAS FEQ \$muy_alta AND
            CONS.FR FEQ $[25,26,29,30]

            ";
?>
