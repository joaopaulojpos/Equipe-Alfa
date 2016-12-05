
/*==============================================================*/
/* Table: GRADE                                                 */
/*==============================================================*/
create table GRADE
(
   CODIGOGRADE           int,
   CODIGOCURSO           int not null,  
   CODIGOPERIODO         int not null,
   CODIGODISCIPLINA      int,
   primary key (CODIGOGRADE)
);

/*==============================================================*/
/* Table: DISCIPLINATURMA                                       */
/*==============================================================*/
create table DISCIPLINATURMA
(
   CODIGODISCIPLINATURMA int auto_increment,
   CODIGODISCIPLINA      int,
   CODIGOPROFESSOR       int,
   CODIGOTURMA           int,
   CODIGONOTA            int,
   primary key (CODIGODISCIPLINATURMA)
);

/*==============================================================*/
/* Table: FALTA                                                 */
/*==============================================================*/
create table FALTA
(
   MATRICULAALUNO        int,
   CODIGODISCIPLINATURMA int,
   MÊS					 varchar(15),
   QTDFALTAS			 int,
   ABONO                 varchar(5),
   MOTIVO                varchar(50)
);

/*==============================================================*/
/* Table: PRESENCA                                              */
/*==============================================================*/
create table PRESENCA
(
   MATRICULAALUNO        int unsigned,
   CODIGODISCIPLINATURMA int unsigned,   
);

/*==============================================================*/
/* Table: NOTA                                                  */
/*==============================================================*/
create table NOTA
(
   CODIGONOTA           int auto_increment,
   MATRICULAALUNO       int not null,
   RECUPERACAO			varchar(10) default = null,
   FINAL				varchar(10) default = null,
   TIPONOTA             varchar(10),
   SITUACAO				varchar(15),  
   primary key (CODIGONOTA)
);

/*==============================================================*/
/* Table: NOTACONCEITO                                          */
/*==============================================================*/
create table NOTACONCEITO
(
   CODIGONOTA           int not null,
   CONCEITO1            varchar(10) default = null,
   CONCEITO2			varchar(10) default = null
);

/*==============================================================*/
/* Table: NOTANUMERO                                            */
/*==============================================================*/
create table NOTANUMERO
(
   CODIGONOTA           int not null,
   NOTA1        	  	varchar(10) default = null,
   NOTA2				varchar(10)	default = null
);

/*==============================================================*/
/* Table: PERIODO                                               */
/*==============================================================*/
create table PERIODO
(
   CODIGOPERIODO        int auto_increment,
   CODIGOCURSO          int not null,
   NUMEROPERIODO        int,
   primary key (CODIGOPERIODO)
);

/*==============================================================*/
/* Table: PROFESSOR                                             */
/*==============================================================*/
create table PROFESSOR
(
   CODIGOPROFESSOR      int auto_increment,
   NOME                 varchar(50),
   TELEFONE             varchar(15),
   primary key (CODIGOPROFESSOR)
);

/*==============================================================*/
/* Table: PROFESSORDISCIPLINA                                   */
/*==============================================================*/
create table PROFESSORDISCIPLINA
(
   CODIGOPROFESSORDISCIPLINA int auto_increment,
   CODIGOPROFESSOR      	 int,
   CODIGODISCIPLINA          int
);

/*==============================================================*/
/* Table: TIPOUSUARIO                                           */
/*==============================================================*/
create table TIPOUSUARIO
(
   CODIGOTIPOUSUARIO    int not null,
   DESCRICAOTIPOUSUARIO varchar(50),
   primary key (CODIGOTIPOUSUARIO)
);

/*==============================================================*/
/* Table: TURMA                                                 */
/*==============================================================*/
create table TURMA
(
   CODIGOTURMA          int auto_increment,
   CODIGOPERIODO        int,
   ANO                  int,
   TURNO                varchar(5),   
   primary key (CODIGOTURMA)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   CODIGOUSUARIO        int auto_increment,
   CODIGOTIPOUSUARIO    int,
   USUARIOLOGIN         varchar(50),
   SENHA                int,
   CONFIRMARSENHA       int,   
   primary key (CODIGOUSUARIO)
);

alter table DISCIPLINATURMA add constraint FK_DISCIPLINATURMA_DISCIPLINA foreign key (CODIGODISCIPLINA)
      references DISCIPLINA (CODIGODISCIPLINA) on delete CASCADE on update CASCADE;

alter table DISCIPLINATURMA add constraint FK_DISCIPLINATURMA_NOTA foreign key (CODIGONOTA)
      references NOTA (CODIGONOTA) on delete CASCADE on update CASCADE;

alter table DISCIPLINATURMA add constraint FK_DISCIPLINATURMA_PROFESSOR foreign key (CODIGOPROFESSOR)
      references PROFESSOR (CODIGOPROFESSOR) on delete CASCADE on update CASCADE;

alter table DISCIPLINATURMA add constraint FK_DISCIPLINATURMA_TURMA foreign key (CODIGOTURMA)
      references TURMA (CODIGOTURMA) on delete CASCADE on update CASCADE;

alter table FALTA add constraint FK_FALTA_ALUNO foreign key (MATRICULAALUNO)
      references ALUNO (MATRICULAALUNO) on delete CASCADE on update CASCADE;

alter table FALTA add constraint FK_FALTA_DISCIPLINA foreign key (CODIGODISCIPLINATURMA)
      references DISCIPLINATURMA (CODIGODISCIPLINATURMA) on delete CASCADE on update CASCADE;

alter table NOTA add constraint FK_NOTA_ALUNO foreign key (MATRICULAALUNO)
      references ALUNO (MATRICULAALUNO) on delete CASCADE on update CASCADE;

alter table NOTACONCEITO add constraint FK_NOTACONCEITO_NOTA foreign key (CODIGONOTA)
      references NOTA (CODIGONOTA) on delete CASCADE on update CASCADE;

alter table NOTANUMERO add constraint FK_NOTANUMERO_NOTA foreign key (CODIGONOTA)
      references NOTA (CODIGONOTA) on delete CASCADE on update CASCADE;

alter table PRESENCA add constraint FK_PRESENCA_ALUNO foreign key (MATRICULAALUNO)
      references ALUNO (MATRICULAALUNO) on delete CASCADE on update CASCADE;

alter table PRESENCA add constraint FK_PRESENCA_DISCIPLINATURMA foreign key (CODIGODISCIPLINATURMA)
      references DISCIPLINATURMA (CODIGODISCIPLINATURMA) on delete CASCADE on update CASCADE;
	  
alter table PERIODO ADD constraint FK_PRESENCA_CURSO foreign key (CODIGOCURSO)
	  references CURSO (CODIGOCURSO) on delete CASCADE on update CASCADE; 

alter table PROFESSORDISCIPLINA add constraint FK_PROFESSORDISCIPLINA_DISCIPLINA foreign key (CODIGODISCIPLINA)
      references DISCIPLINA (CODIGODISCIPLINA) on delete CASCADE on update CASCADE;

alter table PROFESSORDISCIPLINA add constraint FK_PROFESSORDISCIPLINA_PROFESSOR foreign key (CODIGOPROFESSOR)
      references PROFESSOR (CODIGOPROFESSOR) on delete CASCADE on update CASCADE;

alter table TURMA add constraint FK_TURMA_PERIODO foreign key (CODIGOPERIODO)
      references PERIODO (CODIGOPERIODO) on delete CASCADE on update CASCADE;
      
alter table USUARIO add constraint FK_USUARIO_TIPOUSUARIO foreign key (CODIGOTIPOUSUARIO)
	  references TIPOUSUARIO (CODIGOTIPOUSUARIO) on delete CASCADE on update CASCADE;

alter table GRADE add constraint FK_GRADE_CURSO foreign key (CODIGOCURSO)
	  references CURSO (CODIGOCURSO) on delete CASCADE on update CASCADE;
	 
alter table GRADE add constraint FK_GRADE_PERIODO foreign key (CODIGOPERIODO)
	  references PERIODO (CODIGOPERIODO) on delete CASCADE on update CASCADE;
	  
alter table GRADE add constraint FK_GRADE_DISCIPLINA foreign key (CODIGODISCIPLINA)
	  references DISCIPLINA (CODIGODISCIPLINA) on delete CASCADE on update CASCADE;
