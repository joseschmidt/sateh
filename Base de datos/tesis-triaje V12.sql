-- Bloque de codigo que contiene:
-- Sentencia para crear el tablespace donde se almacenara la base de datos de triaje, creación de usuario
-- create user triaje identified by "triaje"
-- grant connect to triaje
-- grant create tablespace to triaje
-- CREATE TABLESPACE triaje DATAFILE 'triajeD01.dbf' SIZE 500M;

DROP TABLE REFLEJA;
CREATE TABLE REFLEJA(
signo_codigo number(4),
episodio_triaje_codigo number(4)
) TABLESPACE triaje;

DROP TABLE INDICA;
CREATE TABLE INDICA(
constante_codigo number(4),
episodio_triaje_codigo number(4)
) TABLESPACE triaje;

DROP TABLE SE_AGRUPAN;
CREATE TABLE SE_AGRUPAN(
sintoma_codigo number(4),
episodio_triaje_codigo number(4)
) TABLESPACE triaje;

DROP TABLE EPISODIOS_TRIAJE;
CREATE TABLE EPISODIOS_TRIAJE(
codigo number(4) not null,
doctor_codigo number(4) not null,
motivo_urgencia_codigo number(4) not null,
paciente_codigo number(4) not null,
fecha_hora_minuto date not null,
PRIMARY KEY (codigo)
) TABLESPACE triaje;

DROP TABLE ALERGICO_A;
CREATE TABLE ALERGICO_A(
paciente_codigo number(4),
alergia_codigo number(4)
) TABLESPACE triaje;

DROP TABLE A_PADECIDO;
CREATE TABLE A_PADECIDO(
paciente_codigo number(4),
antecedente_codigo number(4)
) TABLESPACE triaje;

DROP TABLE TOMA;
CREATE TABLE TOMA(
paciente_codigo number(4),
medicamento_codigo number(4)
) TABLESPACE triaje;

DROP TABLE SINTOMAS;
CREATE TABLE SINTOMAS(
codigo number(4) not null,
descripcion varchar (150),
localizacion varchar (150) default 'NOAPLICA' not null,
pregunta1 char(2)  default 'NO' not null,
pregunta2 char(2)  default 'NO' not null,
-- La duración es un atributo difuso tipo 2 que mide cuantos minutos le dura al paciente el sintoma 
-- por cada repetición
duraciont number(4) default 0 not null,
duracion1 number(3),
duracion2 number(3),
duracion3 number(3),
duracion4 number(3),
-- La fecha de inicio es un atributo difuso tipo 2, en la que se pueden almacenar valores como
-- hace poco, hace mucho, etc
iniciot number(1) default 0 not null,
inicio1 number(3),
inicio2 number(3),
inicio3 number(3),
inicio4 number(3),
-- La repetición del sintoma del paciente se cuenta por día, puede tomar valores como poco, mas o menos, o mucho
repeticiont number(1) default 1 not null,
repeticion1 number(3),
repeticion2 number(3),
repeticion3 number(3),
repeticion4 number(3),
/* La escala de nivel es un atributo difuso tipo 3, en el que podemos almacenar valores como ligero, moderado, intenso
-- etc.*/
nivelt number(1) default 0 not null, -- solo hace falta comparar las etiquetas, por lo que existen solo 2 columnas
									 -- para la definición del atributo
nivelP1 number(3,2), --aqui almacena cuanto es parecido a la etiqueta de nivel
nivel1 number(3),   --aqui almacena el id de la etiqueta contra la que se esta comparando
PRIMARY KEY (codigo)
) TABLESPACE triaje;

DROP TABLE SINTOMAS_MAESTRA;
CREATE TABLE SINTOMAS_MAESTRA(
descripcion Varchar2(150),
CONSTRAINT unico_sintoma UNIQUE (descripcion)
) TABLESPACE triaje;

DROP TABLE SINTOMAS_LOCALIZACION_MAESTRA;
CREATE TABLE SINTOMAS_LOCALIZACION_MAESTRA(
localizacion Varchar2(150),
CONSTRAINT unica_localizacion UNIQUE (localizacion)
) TABLESPACE triaje;


DROP TABLE CONSTANTES;
CREATE TABLE CONSTANTES(
codigo number (4) not null,
-- La temperatura es un atributo difuso tipo 2, en el que se pueden almacenar valores como baja, normal, fiebre, etc
tempt number(1) default 0 not null,
temp1 number(3),
temp2 number(3),
temp3 number(3),
temp4 number(3),
-- La tensión arterial sistolica es un atributo difuso tipo 2, almacena valores de muy baja, normal, muy alta
tast number(1) default 0 not null,
tas1 number(3),
tas2 number(3),
tas3 number(3),
tas4 number(3),
-- La frecuencia cardíaca es un atributo difuso tipo 2, almacena valores como muy baja, normal, alta y muy alta
fct number(1) default 0 not null,
fc1 number(3),
fc2 number(3),
fc3 number(3),
fc4 number(3),
-- La frecuencia respiratoria es un atributo difuso tipo 2, almacena valores como muy baja, normal, alta y muy alta
frt number(1) default 0 not null,
fr1 number(3),
fr2 number(3),
fr3 number(3),
fr4 number(3),
-- La saturación de oxigeno es un atributo difuso tipo 1, puede tomar valores o etiquetas.
sato2 number (3),
-- La glicemia capilar es un atributo difuso tipo 2, puede tomar valores como hipoglucemia, normal, etc.
glicapt number (1) default 0 not null,
glicap1 number(3),
glicap2 number(3),
glicap3 number(3),
glicap4 number(3),
-- El estado de conciencia es un atributo difuso tipo 2, puede tomar valores como alerta, somnolencia, estupor, etc
nihsst number (1) default 0 not null,
nihss1 number (3),
nihss2 number (3),
nihss3 number (3),
nihss4 number (3),
PRIMARY KEY (codigo)
) TABLESPACE triaje;

DROP TABLE CATEGORIAS;
CREATE TABLE CATEGORIAS(
codigo number (4) not null,
descripcion Varchar(150) not null,
-- El tipo de categoria es un atributo difuso tipo 3, se necesitan solo dos columnas para definir este atributo
tipo_categoriat number(1) default 0 not null, -- solo hace falta comparar las etiquetas, por lo que existen solo 2 columnas
									 -- para la definición del atributo
tipo_categoriaP1 number (3,2), --aqui almacena cuanto es parecido a la etiqueta de categoria
tipo_categoria1 number  (3),   --aqui almacena el id de la etiqueta contra la que se esta comparando
PRIMARY KEY (codigo)
) TABLESPACE triaje;

DROP TABLE CATEGORIAS_MAESTRA;
CREATE TABLE CATEGORIAS_MAESTRA(
descripcion Varchar2(150),
nivel Number(1),
CONSTRAINT unico_categoria UNIQUE (descripcion)
) TABLESPACE triaje;

DROP TABLE SIGNOS;
CREATE TABLE SIGNOS(
codigo number (4) not null,
-- El tipo de piel es un atributo difuso tipo 3,se necesitan solo dos columnas para definir este atributo
tipo_pielt number(1) default 0 not null, -- solo hace falta comparar las etiquetas, por lo que existen solo 2 columnas
									 -- para la definición del atributo
tipo_pielP1 number (3,2), --aqui almacena cuanto es parecido a la etiqueta de tipo de piel
tipo_piel1 number  (3),   --aqui almacena el id de la etiqueta contra la que se esta comparando
-- El pulso radial es un atributo difuso tipo 2, muy posiblemente todos los valores contra los que se comparen
-- sean funciones L
pulso_radialt number (1) default 0 not null,
pulso_radial1 number (3),
pulso_radial2 number (3),
pulso_radial3 number (3),
pulso_radial4 number (3),
-- El pulso es un atributo difuso tipo 2, muy posiblemente todos los valores contra los que se comparen
-- sean funciones L
pulsot number (1) default 0 not null,
pulso1 number (3),
pulso2 number (3),
pulso3 number (3),
pulso4 number (3),
-- La respiración es un atributo difuso tipo 2
respiraciont number (1) default 0 not null,
respiracion1 number(3),
respiracion2 number(3),
respiracion3 number(3),
respiracion4 number(3),
-- Falta Glasgow y tambien falta Somnolencia o Confusión
PRIMARY KEY (codigo)
) TABLESPACE triaje;

DROP TABLE ALERGIAS;
CREATE TABLE ALERGIAS(
codigo number (4) not null,
descripcion varchar(150) not null,
tipo varchar(150) not null,
PRIMARY KEY (codigo)
) TABLESPACE triaje;

DROP TABLE MOTIVOS_URGENCIA;
CREATE TABLE MOTIVOS_URGENCIA(
codigo number(4) not null,
descripcion varchar(150) not null,
-- La duración es un atributo difuso tipo 2 que mide cuantos minutos le dura al paciente el motivo de urgencia 
duraciont number(4) default 0 not null,
duracion1 number(3),
duracion2 number(3),
duracion3 number(3),
duracion4 number(3),
-- El inicio es un atributo difuso tipo 2, en la que se pueden almacenar valores como
-- hace poco, hace mucho, etc
iniciot number(1) default 0 not null,
inicio1 number(3),
inicio2 number(3),
inicio3 number(3),
inicio4 number(3),
PRIMARY KEY (codigo)
) TABLESPACE triaje;

DROP TABLE MOTIVOS_MAESTRA;
CREATE TABLE MOTIVOS_MAESTRA(
descripcion Varchar2(150),
CONSTRAINT unico_motivo UNIQUE (descripcion)
) TABLESPACE triaje;

DROP TABLE DOCTORES;
CREATE TABLE DOCTORES(
codigo number(4) not null,
nombre varchar(25) not null,
apellido varchar(25) not null,
PRIMARY KEY (codigo)
) TABLESPACE triaje;

DROP TABLE PACIENTES;
CREATE TABLE PACIENTES(
codigo number(4) not null,
nombre varchar(25) not null,
apellido varchar(25) not null,
genero varchar(1) not null,
edad number(3) not null,
-- status puede tener 3 posibles valores 'E' que significa 'Esperando', 'T' que significa clasificado en triaje,y 'A' que significa Atendido.
-- Un paciente es atendido cuando sale de la cola de triaje.
status varchar(1) not null,
PRIMARY KEY (codigo)
) TABLESPACE triaje;

DROP TABLE MEDICAMENTOS;
CREATE TABLE MEDICAMENTOS(
codigo number(4) not null,
categoria char(150) not null, -- antihipertensivos, analgesicos, etc.
descripcion char(150) not null,
PRIMARY KEY (codigo)
) TABLESPACE triaje;

DROP TABLE ANTECEDENTES;
CREATE TABLE ANTECEDENTES(
codigo number(4) not null,
descripcion varchar(150) not null, 
PRIMARY KEY (codigo)
) TABLESPACE triaje;

DROP TABLE ANTECEDENTES_MAESTRA;
CREATE TABLE ANTECEDENTES_MAESTRA(
descripcion Varchar2(150),
CONSTRAINT unico_antecedente UNIQUE (descripcion)
) TABLESPACE triaje;


-- ---------------------------------------------
-- Inicio de los Constraint por clave foranea. -
-- ---------------------------------------------

ALTER TABLE CATEGORIAS
add CONSTRAINT categoria_maestra_fk
FOREIGN KEY (descripcion)
REFERENCES CATEGORIAS_MAESTRA(descripcion);

ALTER TABLE SINTOMAS
add CONSTRAINT sintoma_maestra_fk
FOREIGN KEY (descripcion)
REFERENCES SINTOMAS_MAESTRA(descripcion);

ALTER TABLE SINTOMAS
add CONSTRAINT sintoma_loc_maestra_fk
FOREIGN KEY (localizacion)
REFERENCES SINTOMAS_LOCALIZACION_MAESTRA(localizacion);

ALTER TABLE MOTIVOS_URGENCIA
add CONSTRAINT motivo_maestra_fk
FOREIGN KEY (descripcion)
REFERENCES MOTIVOS_MAESTRA(descripcion);

ALTER TABLE EPISODIOS_TRIAJE
add CONSTRAINT episodio_doctor_fk
FOREIGN KEY (doctor_codigo)
REFERENCES DOCTORES(codigo);

ALTER TABLE EPISODIOS_TRIAJE
add CONSTRAINT episodio_motivo_fk
FOREIGN KEY (motivo_urgencia_codigo)
REFERENCES MOTIVOS_URGENCIA(codigo);

ALTER TABLE EPISODIOS_TRIAJE
add CONSTRAINT episodio_paciente_fk
FOREIGN KEY (paciente_codigo)
REFERENCES PACIENTES(codigo);

ALTER TABLE REFLEJA
add CONSTRAINT refleja_signo_fk
FOREIGN KEY (signo_codigo)
REFERENCES SIGNOS(codigo);

ALTER TABLE REFLEJA
add CONSTRAINT refleja_episodio_fk
FOREIGN KEY (episodio_triaje_codigo)
REFERENCES EPISODIOS_TRIAJE(codigo);

ALTER TABLE INDICA
add CONSTRAINT indica_constante_fk
FOREIGN KEY (constante_codigo)
REFERENCES CONSTANTES(codigo);

ALTER TABLE INDICA
add CONSTRAINT indica_episodio_fk
FOREIGN KEY (episodio_triaje_codigo)
REFERENCES EPISODIOS_TRIAJE(codigo);

ALTER TABLE SE_AGRUPAN
add CONSTRAINT se_agrupan_sintoma_fk
FOREIGN KEY (sintoma_codigo)
REFERENCES SINTOMAS(codigo);

ALTER TABLE SE_AGRUPAN
add CONSTRAINT se_agrupan_episodio_fk
FOREIGN KEY (episodio_triaje_codigo)
REFERENCES EPISODIOS_TRIAJE(codigo);

ALTER TABLE TOMA
add CONSTRAINT toma_medicamento_fk
FOREIGN KEY (medicamento_codigo)
REFERENCES MEDICAMENTOS(codigo);

ALTER TABLE TOMA
add CONSTRAINT toma_paciente_fk
FOREIGN KEY (paciente_codigo)
REFERENCES PACIENTES(codigo);

ALTER TABLE A_PADECIDO
add CONSTRAINT a_padecido_antecedente_fk
FOREIGN KEY (antecedente_codigo)
REFERENCES ANTECEDENTES(codigo);

ALTER TABLE A_PADECIDO
add CONSTRAINT a_padecido_paciente_fk
FOREIGN KEY (paciente_codigo)
REFERENCES PACIENTES(codigo);

ALTER TABLE ALERGICO_A
add CONSTRAINT alergico_a_alergia_fk
FOREIGN KEY (alergia_codigo)
REFERENCES ALERGIAS(codigo);

ALTER TABLE ALERGICO_A
add CONSTRAINT alergico_a_paciente_fk
FOREIGN KEY (paciente_codigo)
REFERENCES PACIENTES(codigo);

-- ---------------------------------------------
-- Inicio de las Secuencias para las tablas  . -
-- ---------------------------------------------

-- Sintomas
drop sequence sintomas_seq;
create sequence sintomas_seq 
start with 1 
increment by 1 
nomaxvalue;

drop trigger sintomas_trigger;
create trigger sintomas_trigger
before insert on sintomas
for each row
begin
select sintomas_seq.nextval into :new.codigo from dual;
end;
/

-- Motivos
drop sequence motivos_urgencia_seq;
create sequence motivos_urgencia_seq 
start with 1 
increment by 1 
nomaxvalue;

drop trigger motivos_urgencia_trigger;
create trigger motivos_urgencia_trigger
before insert on motivos_urgencia
for each row
begin
select motivos_urgencia_seq.nextval into :new.codigo from dual;
end;
/

-- Categorias
drop sequence categorias_seq;
create sequence categorias_seq 
start with 1 
increment by 1 
nomaxvalue;

drop trigger categorias_trigger;
create trigger categorias_trigger
before insert on categorias
for each row
begin
select categorias_seq.nextval into :new.codigo from dual;
end;
/

-- Medicamentos
drop sequence medicamentos_seq;
create sequence medicamentos_seq 
start with 1 
increment by 1 
nomaxvalue;

drop trigger medicamentos_trigger;
create trigger medicamentos_trigger
before insert on medicamentos
for each row
begin
select medicamentos_seq.nextval into :new.codigo from dual;
end;
/

-- Signos
drop sequence signos_seq;
create sequence signos_seq 
start with 1 
increment by 1 
nomaxvalue;

drop trigger signos_trigger;
create trigger signos_trigger
before insert on signos
for each row
begin
select signos_seq.nextval into :new.codigo from dual;
end;
/

-- Constantes
drop sequence constantes_seq;
create sequence constantes_seq 
start with 1 
increment by 1 
nomaxvalue;

drop trigger constantes_trigger;
create trigger constantes_trigger
before insert on constantes
for each row
begin
select constantes_seq.nextval into :new.codigo from dual;
end;
/

-- Episodios de triaje
drop sequence episodios_triaje_seq;
create sequence episodios_triaje_seq 
start with 1 
increment by 1 
nomaxvalue;

drop trigger episodios_triaje_trigger;
create trigger episodios_triaje_trigger
before insert on episodios_triaje
for each row
begin
select episodios_triaje_seq.nextval into :new.codigo from dual;
end;
/

-- Doctores
drop sequence doctores_seq;
create sequence doctores_seq 
start with 1 
increment by 1 
nomaxvalue;

drop trigger doctores_trigger;
create trigger doctores_trigger
before insert on doctores
for each row
begin
select doctores_seq.nextval into :new.codigo from dual;
end;
/

-- Antecedentes
drop sequence antecedentes_seq;
create sequence antecedentes_seq 
start with 1 
increment by 1 
nomaxvalue;

drop trigger antecedentes_trigger;
create trigger antecedentes_trigger
before insert on antecedentes
for each row
begin
select antecedentes_seq.nextval into :new.codigo from dual;
end;
/

-- Alergias
drop sequence alergias_seq;
create sequence alergias_seq 
start with 1 
increment by 1 
nomaxvalue;

drop trigger alergias_trigger;
create trigger alergias_trigger
before insert on alergias
for each row
begin
select alergias_seq.nextval into :new.codigo from dual;
end;
/

-- Pacientes
drop sequence pacientes_seq;
create sequence pacientes_seq 
start with 1 
increment by 1 
nomaxvalue;

drop trigger pacientes_trigger;
create trigger pacientes_trigger
before insert on pacientes
for each row
begin
select pacientes_seq.nextval into :new.codigo from dual;
end;
/

-- LLenado del FMB
DECLARE
  t_SINTOMAS    		NUMBER;
  t_CONSTANTES	    	NUMBER;
  t_CATEGORIAS  	  	NUMBER;
  t_SIGNOS   			NUMBER;
  t_MOTIVOS_URGENCIA 	NUMBER;
  t_ALERGIAS  			NUMBER;

  -- tabla sintomas  
  c_inicio_s			NUMBER;
  c_nivel		    	NUMBER;
  c_duracion_s			NUMBER;
  c_repeticion			NUMBER;
  
  -- tabla constantes
  c_temp 				NUMBER;
  c_tas        			NUMBER;
  c_fc     				NUMBER;
  c_fr 				 	NUMBER;
  c_sato2      		 	NUMBER;
  c_glicap    			NUMBER;
  c_nihss				NUMBER;
  
  -- tabla categorias
  c_categoria 			NUMBER;
  
  -- tabla signos
  c_tipo_piel   		NUMBER;
  c_pulso_radial   		NUMBER;
  c_pulso		   		NUMBER;
  c_respiracion    		NUMBER;
  
  -- tabla motivos_urgencia
  c_inicio   			NUMBER;
  c_duracion			NUMBER;

BEGIN

  -- Obtener el # de objeto para las tablas con columnas difusas:
  SELECT object_id into t_SINTOMAS FROM user_objects WHERE object_name='SINTOMAS';
  SELECT object_id into t_CONSTANTES FROM user_objects WHERE object_name='CONSTANTES';
  SELECT object_id into t_CATEGORIAS FROM user_objects WHERE object_name='CATEGORIAS';
  SELECT object_id into t_SIGNOS   FROM user_objects WHERE object_name='SIGNOS';
  SELECT object_id into t_MOTIVOS_URGENCIA   FROM user_objects WHERE object_name='MOTIVOS_URGENCIA';

  -- Obtener el # de objeto para las columnas difusas:
  -- tabla sintomas
  SELECT column_id into c_inicio_s
    FROM user_tab_columns WHERE table_name='SINTOMAS' AND column_name='INICIOT';
	
  SELECT column_id into c_nivel
    FROM user_tab_columns WHERE table_name='SINTOMAS' AND column_name='NIVELT';

  SELECT column_id into c_duracion_s
    FROM user_tab_columns WHERE table_name='SINTOMAS' AND column_name='DURACIONT';
	
  SELECT column_id into c_repeticion
    FROM user_tab_columns WHERE table_name='SINTOMAS' AND column_name='REPETICIONT';
	
  -- tabla constantes
  SELECT column_id into c_temp
    FROM user_tab_columns WHERE table_name='CONSTANTES' AND column_name='TEMPT';
	
  SELECT column_id into c_tas
    FROM user_tab_columns WHERE table_name='CONSTANTES' AND column_name='TAST';
	
  SELECT column_id into c_fc
    FROM user_tab_columns WHERE table_name='CONSTANTES' AND column_name='FCT';
	
  SELECT column_id into c_fr
    FROM user_tab_columns WHERE table_name='CONSTANTES' AND column_name='FRT';
		
  SELECT column_id into c_sato2
    FROM user_tab_columns WHERE table_name='CONSTANTES' AND column_name='SATO2';

  SELECT column_id into c_glicap
    FROM user_tab_columns WHERE table_name='CONSTANTES' AND column_name='GLICAPT';

  SELECT column_id into c_nihss
    FROM user_tab_columns WHERE table_name='CONSTANTES' AND column_name='NIHSST';
	
  -- tabla categorias
  SELECT column_id into c_categoria
    FROM user_tab_columns WHERE table_name='CATEGORIAS' AND column_name='TIPO_CATEGORIAT';
	
  -- tabla signos
  SELECT column_id into c_tipo_piel
    FROM user_tab_columns WHERE table_name='SIGNOS' AND column_name='TIPO_PIELT';

  SELECT column_id into c_pulso_radial
    FROM user_tab_columns WHERE table_name='SIGNOS' AND column_name='PULSO_RADIALT';
  
  SELECT column_id into c_pulso
    FROM user_tab_columns WHERE table_name='SIGNOS' AND column_name='PULSOT';
  
  SELECT column_id into c_respiracion
    FROM user_tab_columns WHERE table_name='SIGNOS' AND column_name='RESPIRACIONT';

  -- tabla motivos_consulta
  SELECT column_id into c_inicio
    FROM user_tab_columns WHERE table_name='MOTIVOS_URGENCIA' AND column_name='INICIOT';

  SELECT column_id into c_duracion
    FROM user_tab_columns WHERE table_name='MOTIVOS_URGENCIA' AND column_name='DURACIONT';
	
-- --------------------------------------------------------------------------------------   
  -- Información de las columnas difusas en la tabla Fuzzy Column List
  INSERT into FCL values (t_SINTOMAS,c_inicio_s,2,1,USER||'.SINTOMAS.INICIO');
  INSERT into FCL values (t_SINTOMAS,c_duracion_s,2,1,USER||'.SINTOMAS.DURACION');
  INSERT into FCL values (t_SINTOMAS,c_nivel,3,1,USER||'.SINTOMAS.NIVEL');
  INSERT into FCL values (t_SINTOMAS,c_repeticion,2,1,USER||'.SINTOMAS.REPETICION');  
  INSERT into FCL values (t_CONSTANTES,c_temp,2,1,USER||'.CONSTANTES.TEMP');
  INSERT into FCL values (t_CONSTANTES,c_tas,2,1,USER||'.CONSTANTES.TAS');
  INSERT into FCL values (t_CONSTANTES,c_fc,2,1,USER||'.CONSTANTES.FC');
  INSERT into FCL values (t_CONSTANTES,c_fr,2,1,USER||'.CONSTANTES.FR');
  INSERT into FCL values (t_CONSTANTES,c_sato2,1,1,USER||'.CONSTANTES.SATO2');
  INSERT into FCL values (t_CONSTANTES,c_glicap,2,1,USER||'.CONSTANTES.GLICAP');
  INSERT into FCL values (t_CONSTANTES,c_nihss,2,1,USER||'.CONSTANTES.NIHSS');
  INSERT into FCL values (t_CATEGORIAS,c_categoria,3,1,USER||'.CONSTANTES.CATEGORIA');
  INSERT into FCL values (t_SIGNOS,c_tipo_piel,3,1,USER||'.SIGNOS.TIPO_PIEL');
  INSERT into FCL values (t_SIGNOS,c_pulso_radial,2,1,USER||'.SIGNOS.PULSO_RADIAL');
  INSERT into FCL values (t_SIGNOS,c_pulso,2,1,USER||'.SIGNOS.PULSO');
  INSERT into FCL values (t_SIGNOS,c_respiracion,2,1,USER||'.SIGNOS.RESPIRACION');
  INSERT into FCL values (t_MOTIVOS_URGENCIA,c_inicio,2,1,USER||'.MOTIVOS_URGENCIA.INICIO');
  INSERT into FCL values (t_MOTIVOS_URGENCIA,c_duracion,1,1,USER||'.MOTIVOS_URGENCIA.DURACION');
  
    -- COMPATIBILIDAD de atributos tipo 3:
  -- Por ahora no existe compatibilidad entre atributos
  -- INSERT into FCC values (t_NOMBRETABLA,c_NOMBRECOLUMNA,t_NOMBRETABLA,c_NOMBRECOLUMNA);
  
-- --------------------------------------------------------------------------------------  
  -- Información de las etiquetas que se almacenaran en las columnas difusas, Fuzzy Object List
  -- Tipo 0 indica que es un predicado de la columna,
  -- 1 que esta referenciada en la tabla de cercanias y
  -- 4 que es un cuantificador absoluto
  
  -- Tabla Sintomas
  INSERT INTO FOL VALUES (T_SINTOMAS,C_INICIO_S,0,'HACE_POCO',0);
  INSERT INTO FOL VALUES (T_SINTOMAS,C_INICIO_S,1,'MAS_O_MENOS',0);
  INSERT INTO FOL VALUES (T_SINTOMAS,C_INICIO_S,2,'HACE_MUCHO',0);
  
  INSERT INTO FOL VALUES (T_SINTOMAS,C_NIVEL,0,'LIGERO',1);
  INSERT INTO FOL VALUES (T_SINTOMAS,C_NIVEL,1,'MODERADO',1);
  INSERT INTO FOL VALUES (T_SINTOMAS,C_NIVEL,2,'INTENSO',1);

  INSERT INTO FOL VALUES (T_SINTOMAS,C_DURACION_S,0,'POCO',0);
  INSERT INTO FOL VALUES (T_SINTOMAS,C_DURACION_S,1,'MAS_O_MENOS',0);
  INSERT INTO FOL VALUES (T_SINTOMAS,C_DURACION_S,2,'MUCHO',0);  
  
  INSERT INTO FOL VALUES (T_SINTOMAS,C_REPETICION,0,'POCO',0);
  INSERT INTO FOL VALUES (T_SINTOMAS,C_REPETICION,1,'MAS_O_MENOS',0);
  INSERT INTO FOL VALUES (T_SINTOMAS,C_REPETICION,2,'MUCHO',0);  
  
  -- TABLA CONSTANTES
  INSERT INTO FOL VALUES (T_CONSTANTES,C_TEMP,0,'BAJA',0);
  INSERT INTO FOL VALUES (T_CONSTANTES,C_TEMP,1,'NORMAL',0);
  INSERT INTO FOL VALUES (T_CONSTANTES,C_TEMP,2,'FIEBRE',0);
  INSERT INTO FOL VALUES (T_CONSTANTES,C_TEMP,3,'FIEBRE_MUY_ALTA',0);
  
  INSERT INTO FOL VALUES (T_CONSTANTES,C_TAS,0,'MUY_BAJA',0);
  INSERT INTO FOL VALUES (T_CONSTANTES,C_TAS,1,'NORMAL',0);
  INSERT INTO FOL VALUES (T_CONSTANTES,C_TAS,2,'MUY_ALTA',0);
  
  INSERT INTO FOL VALUES (T_CONSTANTES,C_FC,0,'MUY_BAJA',0);
  INSERT INTO FOL VALUES (T_CONSTANTES,C_FC,1,'NORMAL',0);
  INSERT INTO FOL VALUES (T_CONSTANTES,C_FC,2,'MUY_ALTA',0);

  INSERT INTO FOL VALUES (T_CONSTANTES,C_FR,0,'MUY_BAJA',0);
  INSERT INTO FOL VALUES (T_CONSTANTES,C_FR,1,'NORMAL',0);
  INSERT INTO FOL VALUES (T_CONSTANTES,C_FR,2,'MUY_ALTA',0);
  
  INSERT INTO FOL VALUES (T_CONSTANTES,C_SATO2,0,'MUY_BAJA',0);
  INSERT INTO FOL VALUES (T_CONSTANTES,C_SATO2,1,'NORMAL',0);
  
  INSERT INTO FOL VALUES (T_CONSTANTES,C_GLICAP,0,'HIPOGLUCEMIA',0);
  INSERT INTO FOL VALUES (T_CONSTANTES,C_GLICAP,1,'NORMAL',0);
  INSERT INTO FOL VALUES (T_CONSTANTES,C_GLICAP,2,'GLUCOSA_ALTERADA_EN_AYUNO',0);
  INSERT INTO FOL VALUES (T_CONSTANTES,C_GLICAP,3,'HIPERGLUCEMIA',0);
  
  INSERT INTO FOL VALUES (T_CONSTANTES,C_NIHSS,0,'ALERTA',0);
  INSERT INTO FOL VALUES (T_CONSTANTES,C_NIHSS,1,'CONFUSO',0);
  INSERT INTO FOL VALUES (T_CONSTANTES,C_NIHSS,2,'LETARGICO',0);
  INSERT INTO FOL VALUES (T_CONSTANTES,C_NIHSS,3,'COMA_PROFUNDO',0);
  
  -- TABLA CATEGORIAS
  INSERT INTO FOL VALUES (T_CATEGORIAS,C_CATEGORIA,0,'HEMORRAGIA',1);
  INSERT INTO FOL VALUES (T_CATEGORIAS,C_CATEGORIA,1,'HIPERTENSION',1);
  INSERT INTO FOL VALUES (T_CATEGORIAS,C_CATEGORIA,2,'DIABETICO',1);
  INSERT INTO FOL VALUES (T_CATEGORIAS,C_CATEGORIA,3,'TRAUMATISMO',1);
  INSERT INTO FOL VALUES (T_CATEGORIAS,C_CATEGORIA,4,'NORMAL',1);
  
  -- TABLA SIGNOS
  INSERT INTO FOL VALUES (T_SIGNOS,C_TIPO_PIEL,0,'PIEL_FRIA_Y_PALIDA',1);
  INSERT INTO FOL VALUES (T_SIGNOS,C_TIPO_PIEL,1,'SUDADA_Y_CALIENTE',1);
  INSERT INTO FOL VALUES (T_SIGNOS,C_TIPO_PIEL,2,'MUY_CALIENTE',1);
  INSERT INTO FOL VALUES (T_SIGNOS,C_TIPO_PIEL,3,'NORMAL',1);
  
  INSERT INTO FOL VALUES (T_SIGNOS,C_PULSO_RADIAL,0,'FALTA',1);
  INSERT INTO FOL VALUES (T_SIGNOS,C_PULSO_RADIAL,1,'DEBIL',1);
  INSERT INTO FOL VALUES (T_SIGNOS,C_PULSO_RADIAL,2,'FUERTE',1);
  INSERT INTO FOL VALUES (T_SIGNOS,C_PULSO_RADIAL,3,'NORMAL',1);
  
  INSERT INTO FOL VALUES (T_SIGNOS,C_PULSO,0,'BRADICARDIA',1);
  INSERT INTO FOL VALUES (T_SIGNOS,C_PULSO,1,'TAQUICARDIA',1);
  INSERT INTO FOL VALUES (T_SIGNOS,C_PULSO,2,'NORMAL',1);

  INSERT INTO FOL VALUES (T_SIGNOS,C_RESPIRACION,0,'BRADIPNEA',1);
  INSERT INTO FOL VALUES (T_SIGNOS,C_RESPIRACION,1,'TAQUIPNEA',1);
  INSERT INTO FOL VALUES (T_SIGNOS,C_RESPIRACION,2,'NORMAL',1);

  -- TABLA MOTIVOS DE URGENCIA
  INSERT INTO FOL VALUES (T_MOTIVOS_URGENCIA,C_INICIO,0,'HACE_POCO',0);
  INSERT INTO FOL VALUES (T_MOTIVOS_URGENCIA,C_INICIO,1,'MAS_O_MENOS',0);
  INSERT INTO FOL VALUES (T_MOTIVOS_URGENCIA,C_INICIO,2,'HACE_MUCHO',0);
  
  INSERT INTO FOL VALUES (T_MOTIVOS_URGENCIA,C_DURACION,0,'POCO',0);
  INSERT INTO FOL VALUES (T_MOTIVOS_URGENCIA,C_DURACION,1,'MAS_O_MENOS',0);
  INSERT INTO FOL VALUES (T_MOTIVOS_URGENCIA,C_DURACION,2,'MUCHO',0);
  
  -- Tabla Alergias
  -- Faltan las alergias
  
-- --------------------------------------------------------------------------------------  
  -- Información de los valores que corresponden a las etiquetas, Fuzzy Label Definition
  -- Por ahora, los valores de la inicio se maneja en horas, la duración esta expresada en minutos
  -- Tabla Sintomas
  INSERT into FLD values (t_SINTOMAS,c_inicio_s,0,0,1,14,24);
  INSERT into FLD values (t_SINTOMAS,c_inicio_s,1,15,30,72,96);
  INSERT into FLD values (t_SINTOMAS,c_inicio_s,2,84,96,10000,10001);
  
  INSERT into FLD values (t_SINTOMAS,c_duracion_s,0,0,1,5,10);
  INSERT into FLD values (t_SINTOMAS,c_duracion_s,1,8,15,25,28);
  INSERT into FLD values (t_SINTOMAS,c_duracion_s,2,25,30,10000,10001);
  
  -- La repeticion mide en cuantas veces por dia repite el sintoma
  INSERT into FLD values (t_SINTOMAS,c_repeticion,0,0,1,5,10);
  INSERT into FLD values (t_SINTOMAS,c_repeticion,1,6,8,12,15);
  INSERT into FLD values (t_SINTOMAS,c_repeticion,2,10,12,10000,10001);  
  
  -- Tabla Constantes
  INSERT into FLD values (t_CONSTANTES,c_temp,0,0,1,36,37);
  INSERT into FLD values (t_CONSTANTES,c_temp,1,37,38,39,40);
  INSERT into FLD values (t_CONSTANTES,c_temp,2,39,40,41,42);
  INSERT into FLD values (t_CONSTANTES,c_temp,3,41,42,10000,10001);
  
  INSERT into FLD values (t_CONSTANTES,c_tas,0,0,1,90,95);
  INSERT into FLD values (t_CONSTANTES,c_tas,1,90,95,180,200);
  INSERT into FLD values (t_CONSTANTES,c_tas,2,190,200,10000,10001);
  
  INSERT into FLD values (t_CONSTANTES,c_fc,0,0,1,40,45);
  INSERT into FLD values (t_CONSTANTES,c_fc,1,40,45,120,126);
  INSERT into FLD values (t_CONSTANTES,c_fc,2,120,125,10000,10001);

  INSERT into FLD values (t_CONSTANTES,c_fr,0,0,1,10,13);
  INSERT into FLD values (t_CONSTANTES,c_fr,1,10,11,29,31);
  INSERT into FLD values (t_CONSTANTES,c_fr,2,29,30,10000,10001);
  
  INSERT into FLD values (t_CONSTANTES,c_sato2,0,0,1,92,93);
  INSERT into FLD values (t_CONSTANTES,c_sato2,1,92,93,1000,1001);
  
  INSERT into FLD values (t_CONSTANTES,c_glicap,0,0,1,69,73);
  INSERT into FLD values (t_CONSTANTES,c_glicap,1,68,70,99,105);
  INSERT into FLD values (t_CONSTANTES,c_glicap,2,98,100,124,126);
  INSERT into FLD values (t_CONSTANTES,c_glicap,3,124,126,10000,10001);
  
/*
  NIHSS no debe ser un atributo difuso tipo 2, posiblemente sea tipo 4 o 3.
*/
  INSERT into FLD values (t_CONSTANTES,c_nihss,0,0,1,2,3);     -- alerta
  INSERT into FLD values (t_CONSTANTES,c_nihss,1,3,4,5,6);     --'confuso',0);
  INSERT into FLD values (t_CONSTANTES,c_nihss,2,6,7,8,9);     -- letargico',0);
  INSERT into FLD values (t_CONSTANTES,c_nihss,3,9,10,11,12);  -- 'coma_profundo',0);

  -- Tabla Signos
/*
  Parece ser un atributo difuso tipo 3 o 4
*/
  INSERT INTO FLD values (t_SIGNOS,c_pulso_radial,0,0,1,2,3);     -- 'falta',1);
  INSERT INTO FLD values (t_SIGNOS,c_pulso_radial,1,3,4,5,6);     -- 'debil',1);
  INSERT INTO FLD values (t_SIGNOS,c_pulso_radial,3,10,11,12,13);    -- 'fuerte',1);
  INSERT INTO FLD values (t_SIGNOS,c_pulso_radial,2,7,8,9,10); -- 'normal',1);
  
  INSERT INTO FLD values (t_SIGNOS,c_pulso,0,0,1,50,51); -- 'bradicardia',1);
  INSERT INTO FLD values (t_SIGNOS,c_pulso,1,119,120,10000,10001); -- 'taquicardia',1);
  INSERT INTO FLD values (t_SIGNOS,c_pulso,2,50,51,119,122); -- 'normal',1);

  INSERT INTO FLD values (t_SIGNOS,c_respiracion,0,0,1,12,13); -- 'bradipnea',1);
  INSERT INTO FLD values (t_SIGNOS,c_respiracion,1,19,20,10000,10001); -- 'taquipnea',1);
  INSERT INTO FLD values (t_SIGNOS,c_respiracion,2,12,13,18,20); -- 'normal',1);

  -- Tabla MOTIVOS_URGENCIA
  INSERT into FLD values (t_MOTIVOS_URGENCIA,c_inicio,0,0,8,18,24);
  INSERT into FLD values (t_MOTIVOS_URGENCIA,c_inicio,1,20,48,72,96);
  INSERT into FLD values (t_MOTIVOS_URGENCIA,c_inicio,2,84,96,10000,10001);  
  
  INSERT into FLD values (t_MOTIVOS_URGENCIA,c_duracion,0,0,1,5,10);
  INSERT into FLD values (t_MOTIVOS_URGENCIA,c_duracion,1,8,15,25,28);
  INSERT into FLD values (t_MOTIVOS_URGENCIA,c_duracion,2,25,30,10000,10001); 

-- --------------------------------------------------------------------------------------  
-- Fuzzy Aproximity Much
	INSERT into FAM values (t_SINTOMAS,c_inicio_s,8,32);
	INSERT into FAM values (t_MOTIVOS_URGENCIA,c_inicio,8,32);
	INSERT into FAM values (t_SINTOMAS,c_duracion_s,3,15);
	INSERT into FAM values (t_MOTIVOS_URGENCIA,c_duracion,3,15);
	INSERT into FAM values (t_SINTOMAS,c_repeticion,3,15);	 
	INSERT into FAM values (t_CONSTANTES,c_temp,2,5);  
	INSERT into FAM values (t_CONSTANTES,c_tas,15,40);
	INSERT into FAM values (t_CONSTANTES,c_fc,10,40);
	INSERT into FAM values (t_CONSTANTES,c_fr,5,15);
	INSERT into FAM values (t_CONSTANTES,c_glicap,10,30);
	INSERT into FAM values (t_SIGNOS,c_pulso,10,30);	 
	INSERT into FAM values (t_SIGNOS,c_respiracion,3,10);  

-- --------------------------------------------------------------------------------------  
-- Fuzzy Nearness Definition
-- La escala de nivel se trata dentro de la tabla Fuzzy Nearness Definition
  INSERT into FND values (t_SINTOMAS,c_nivel,0,1,0.5);
  INSERT into FND values (t_SINTOMAS,c_nivel,0,2,0);
  INSERT into FND values (t_SINTOMAS,c_nivel,1,2,0.5);
  
-- Las categorias dentro de la Fuzzy Nearness Definition  
  INSERT INTO FND values (t_CATEGORIAS,c_categoria,0,1,0.3);
  INSERT INTO FND values (t_CATEGORIAS,c_categoria,0,2,0.5);
  INSERT INTO FND values (t_CATEGORIAS,c_categoria,0,3,0.8);
  INSERT INTO FND values (t_CATEGORIAS,c_categoria,0,4,0);
  INSERT INTO FND values (t_CATEGORIAS,c_categoria,1,2,0.8);
  INSERT INTO FND values (t_CATEGORIAS,c_categoria,1,3,0.1);
  INSERT INTO FND values (t_CATEGORIAS,c_categoria,1,4,0);
  INSERT INTO FND values (t_CATEGORIAS,c_categoria,2,3,0.3);
  INSERT INTO FND values (t_CATEGORIAS,c_categoria,2,4,0);
  INSERT INTO FND values (t_CATEGORIAS,c_categoria,3,4,0);

  INSERT INTO FND values (t_SIGNOS,c_tipo_piel,0,1,0.15);  
  INSERT INTO FND values (t_SIGNOS,c_tipo_piel,0,2,0.10);  
  INSERT INTO FND values (t_SIGNOS,c_tipo_piel,0,3,0.25);  
  INSERT INTO FND values (t_SIGNOS,c_tipo_piel,1,2,0.60);  
  INSERT INTO FND values (t_SIGNOS,c_tipo_piel,1,3,0.25);  
  INSERT INTO FND values (t_SIGNOS,c_tipo_piel,2,3,0.25);  
  
  
  COMMIT;
  END;
/   