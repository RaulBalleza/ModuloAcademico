#INSERTAMOS UN PLAN DE ESTUDIOS
INSERT INTO plan_estudios (clv_plan, nombre_plan, nivel, idcarrera) VALUES ("iti-2010","Ingeniería en Tecnologías de la Información","ING", 1);
INSERT INTO plan_estudios (clv_plan, nombre_plan, nivel, idcarrera) VALUES ("parp-2010","Profesional Asociado en Redes y Programación","PA", 1);


#MATERIAS DE 1ER CUATRIMESTRE DE ITI-2010
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INGI-TR","Inglés I", 90, 1,1,"iti-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("VAS-TR","VALORES DEL SER", 45, 1,2,"iti-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ALG-ES","ALGORITMOS", 120, 1,3,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("HEO-ES","HERRAMIENTAS OFIMÁTICAS", 75, 1,4,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("IIT-ES","INTRODUCCIÓN A LA ITI", 60, 1,5,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ARC-EX","ARQUITECTURA DE COMPUTADORAS", 105, 1,6,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("MAB-CV","MATEMÁTICAS BÁSICAS", 105, 1,7,"iti-2010","CIB");
#MATERIAS DE 2DO CUATRIMESTRE DE ITI 2010
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INGII-TR","Inglés II", 90, 2,1,"iti-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INE-TR","INTELIGENCIA EMOCIONAL", 45, 2,2,"iti-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("LC-ES","LÓGICA COMPUTACIONAL", 90, 2,3,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("HM-ES","HERRAMIENTAS MULTIMEDIA", 75, 2,4,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("FR-ES","FUNDAMENTOS DE REDES", 90, 2,5,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("FUF-CV","FUNDAMENTOS DE FÍSICA", 120, 2,6,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("MAD-CV","MATEMÁTICAS DISCRETAS", 90, 2,7,"iti-2010","CIB");
#MATERIAS DE 3er CUATRIMESTRE DE ITI 2010
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INGIII-TR","Inglés III", 90, 3,1,"iti-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("DEI-TR","DESARROLLO INTERPERSONAL", 45, 3,2,"iti-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("PES-ES","PROGRAMACIÓN ESTRUCTURADA", 90, 3,3,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ASO-ES","ADMINISTRACIÓN DE SISTEMAS OPERATIVOS", 105, 3,4,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("RUT-ES","RUTEO", 90, 3,5,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("FSI-ES","FUNDAMENTOS DE SISTEMAS DE INFORMACIÓN", 60, 3,6,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("CDI-CV","CÁLCULO DIFERENCIAS E INTEGRAL", 120, 3,7,"iti-2010","CIB");
#MATERIAS DE 4er CUATRIMESTRE DE ITI 2010
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INGIV-TR","Inglés IV", 90, 4,1,"iti-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("HAP-TR","HABILIDADES DEL PENSAMIENTO", 45, 4,2,"iti-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("IPO-ES","INTRODUCCIÓN A LA PROGRAMACIÓN ORIENTADA A OBJETOS", 90, 4,3,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("IBD-ES","INTRODUCCIÓN A LAS BASES DE DATOS", 75, 4,4,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("SWI-ES","SWITCHEO Y WIRELESS", 90, 4,5,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ALL-CV","ÁLGEBRA LINEAL", 90, 4,6,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ESTANCIAI","ESTANCIA I", 120, 4,7,"iti-2010","ESP");
#MATERIAS DE 5er CUATRIMESTRE DE ITI 2010
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INGV-TR","INGLÉS V", 90, 5,1,"iti-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("HAO-TR","HABILIDADES ORGANIZACIONALES", 45, 5,2,"iti-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ESD-ES","ESTRUCTURA DE DATOS", 90, 5,3,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("DBD-ES","DISEÑO DE BASES DE DATOS", 105, 5,4,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("TEW-ES","TECNOLOGÍAS WAN", 90, 5,5,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("PRE-CV","PROBABILIDAD Y ESTADÍSTICA", 90, 5,6,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INR-ES","INGENIERÍA EN REQUERIMIENTOS", 90, 5,7,"iti-2010","CIB");
#MATERIAS DE 6to CUATRIMESTRE DE ITI 2010
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INGVI-TR","INGLÉS VI", 90, 6,1,"iti-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ETP-TR","ÉTICA PROFRESIONAL", 45, 6,2,"iti-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ADO-ES","ANÁLISIS Y DISEÑO ORIENTADO A OBJETOS", 105, 6,3,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("MBD-ES","IMPLEMENTACIÓN DE BASES DE DATOS", 105, 6,4,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("PAD-ES","PROCESO ADMINISTRATIVO", 60, 6,5,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ADS-ES","ANÁLISIS Y DISEÑO DE SISTEMAS", 105, 6,6,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ISW-ES","INGENIERÍA DE SOFTWARE", 105, 6,7,"iti-2010","CIB");
#MATERIAS DE 7to CUATRIMESTRE DE ITI 2010
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INGVII-TR","INGLÉS VII", 90, 7,1,"iti-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("DIN-ES","DISEÑO DE INTERFACES", 75, 7,2,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("POO-ES","PROGRAMACIÓN ORIENTADA A OBJETOS", 90, 7,3,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("SEI-ES","SEGURIDAD INFORMÁTICA", 75, 7,4,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("IGC-ES","INTRODUCCIÓN A LA GRAFICACIÓN POR COMPUTADORA", 90, 7,5,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("SIN-ES","SEMINARIO DE INVESTIGACIÓN", 60, 7,6,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ESTII","ESTANCIA II", 120, 7,7,"iti-2010","ESP");
#MATERIAS DE 8Vo CUATRIMESTRE DE ITI 2010
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INGVIII-TR","INGLÉS VIII", 90, 8,1,"iti-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("NEL-ES","NEGOCIOS ELECTRÓNICOS", 60, 8,2,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("PWE-ES","PROGRAMACIÓN WEB", 120, 8,3,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("MDA-ES","MINERÍA DE DATOS APLICADA", 120, 8,4,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("GCA-ES","GRAFICACIÓN POR COMPUTADORA AVANZADA", 90, 8,5,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("PTI-ES","SPROYECTOS DE TECNOLOGÍAS DE LA INFORMACIÓN", 60, 8,6,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ASI-ES","ADMINISTRACIÓN DE SISTEMAS INTEGRALES", 60, 8,7,"iti-2010","ESP");
#MATERIAS DE 9no CUATRIMESTRE DE ITI 2010
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INGVIX-TR","INGLÉS IX", 90, 9,1,"iti-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ACC-ES","ADMINISTRACIÓN DE CENTROS DE CÓMPUTO", 75, 9,2,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("TAW-ES","TECNOLOGÍA Y APLICACIONES WEB", 90, 9,3,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INE-ES","INTELIGENCIA DE NEGOCIOS", 90, 9,4,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("CDM-ES","COMPUTO EN DISPOSITIVOS MÓVILES", 90, 9,5,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("DEM-ES","DESARROLLO DE EMPRENDEDORES", 75, 9,6,"iti-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ITI-ES","INTEGRACIÓN DE TECNOLOGÍAS DE LA INFORMACIÓN", 90, 9,7,"iti-2010","ESP");
#METARIAS DEL 10mo CUATRIMESTRE DE ITI 2010
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ESTADIA","ESTADÍA", 90, 10,1,"iti-2010","ESP");

##### ---------------------------------------- materias del profesional asociado en redes y programación -----------------------------------------------------------
#MATERIAS DE 1ER CUATRIMESTRE DE ITI-2010
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INGI-TR","Inglés I", 90, 1,1,"parp-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("VAS-TR","VALORES DEL SER", 45, 1,2,"parp-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ALG-ES","ALGORITMOS", 120, 1,3,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("HEO-ES","HERRAMIENTAS OFIMÁTICAS", 75, 1,4,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("IIT-ES","INTRODUCCIÓN A LA ITI", 60, 1,5,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ARC-EX","ARQUITECTURA DE COMPUTADORAS", 105, 1,6,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("MAB-CV","MATEMÁTICAS BÁSICAS", 105, 1,7,"parp-2010","CIB");
#MATERIAS DE 2DO CUATRIMESTRE DE ITI 2010
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INGII-TR","Inglés II", 90, 2,1,"parp-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INE-TR","INTELIGENCIA EMOCIONAL", 45, 2,2,"parp-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("LC-ES","LÓGICA COMPUTACIONAL", 90, 2,3,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("HM-ES","HERRAMIENTAS MULTIMEDIA", 75, 2,4,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("FR-ES","FUNDAMENTOS DE REDES", 90, 2,5,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("FUF-CV","FUNDAMENTOS DE FÍSICA", 120, 2,6,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("MAD-CV","MATEMÁTICAS DISCRETAS", 90, 2,7,"parp-2010","CIB");
#MATERIAS DE 3er CUATRIMESTRE DE ITI 2010
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INGIII-TR","Inglés III", 90, 3,1,"parp-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("DEI-TR","DESARROLLO INTERPERSONAL", 45, 3,2,"parp-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("PES-ES","PROGRAMACIÓN ESTRUCTURADA", 90, 3,3,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ASO-ES","ADMINISTRACIÓN DE SISTEMAS OPERATIVOS", 105, 3,4,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("RUT-ES","RUTEO", 90, 3,5,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("FSI-ES","FUNDAMENTOS DE SISTEMAS DE INFORMACIÓN", 60, 3,6,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("CDI-CV","CÁLCULO DIFERENCIAS E INTEGRAL", 120, 3,7,"parp-2010","CIB");
#MATERIAS DE 4er CUATRIMESTRE DE ITI 2010
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INGIV-TR","Inglés IV", 90, 4,1,"parp-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("HAP-TR","HABILIDADES DEL PENSAMIENTO", 45, 4,2,"parp-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("IPO-ES","INTRODUCCIÓN A LA PROGRAMACIÓN ORIENTADA A OBJETOS", 90, 4,3,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("IBD-ES","INTRODUCCIÓN A LAS BASES DE DATOS", 75, 4,4,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("SWI-ES","SWITCHEO Y WIRELESS", 90, 4,5,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ALL-CV","ÁLGEBRA LINEAL", 90, 4,6,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ESTANCIAI","ESTANCIA I", 120, 4,7,"parp-2010","ESP");
#MATERIAS DE 5er CUATRIMESTRE DE ITI 2010
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INGV-TR","INGLÉS V", 90, 5,1,"parp-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("HAO-TR","HABILIDADES ORGANIZACIONALES", 45, 5,2,"parp-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ESD-ES","ESTRUCTURA DE DATOS", 90, 5,3,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("DBD-ES","DISEÑO DE BASES DE DATOS", 105, 5,4,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("TEW-ES","TECNOLOGÍAS WAN", 90, 5,5,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("PRE-CV","PROBABILIDAD Y ESTADÍSTICA", 90, 5,6,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INR-ES","INGENIERÍA EN REQUERIMIENTOS", 90, 5,7,"parp-2010","CIB");
#MATERIAS DE 6to CUATRIMESTRE DE ITI 2010
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("INGVI-TR","INGLÉS VI", 90, 6,1,"parp-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ETP-TR","ÉTICA PROFRESIONAL", 45, 6,2,"parp-2010","TRC");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ADO-ES","ANÁLISIS Y DISEÑO ORIENTADO A OBJETOS", 105, 6,3,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("MBD-ES","IMPLEMENTACIÓN DE BASES DE DATOS", 105, 6,4,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("PAD-ES","PROCESO ADMINISTRATIVO", 60, 6,5,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ADS-ES","ANÁLISIS Y DISEÑO DE SISTEMAS", 105, 6,6,"parp-2010","ESP");
INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ISW-ES","INGENIERÍA DE SOFTWARE", 105, 6,7,"parp-2010","CIB");

INSERT INTO materias(clv_materia, nombre_materia, creditos, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ("ESTADIA","ESTADÍA", 90, 7,1,"parp-2010","ESP");
