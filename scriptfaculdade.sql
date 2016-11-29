/*CREATE DATABASE faculdade;*/
/*USE faculdade;*/

/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     21/10/2016 12:45:29                          */
/*==============================================================*/


/*==============================================================*/
/* Table: ALUNO                                                 */
/*==============================================================*/
create table ALUNO
(
   MATRICULAALUNO       int unsigned not null,
   DATANASCIMENTO       date,
   NOMEALUNO            varchar(50),
   SEXOALUNO           	char(1),
   TELEFONE             varchar(15),
   primary key (MATRICULAALUNO)
);

/*==============================================================*/
/* Table: DISCIPLINA                                            */
/*==============================================================*/
create table DISCIPLINA
(
   CODIGODISCIPLINA     int unsigned not null,
   NOMEDISCIPLINA       varchar(50),
   primary key (CODIGODISCIPLINA)
);

/*==============================================================*/
/* Table: DISCIPLINATURMA                                       */
/*==============================================================*/
create table DISCIPLINATURMA
(
   CODIGODISCIPLINATURMA int unsigned not null,
   CODIGODISCIPLINA      int unsigned,
   CODIGOPROFESSOR       int unsigned,
   CODIGOTURMA           int unsigned,
   CODIGONOTA            int unsigned,
   primary key (CODIGODISCIPLINATURMA)
);

/*==============================================================*/
/* Table: FALTA                                                 */
/*==============================================================*/
create table FALTA
(
   MATRICULAALUNO        int unsigned,
   CODIGODISCIPLINATURMA int unsigned,
   ABONO                 varchar(50),
   MOTIVO                varchar(50),
   DATA                  date
);

/*==============================================================*/
/* Table: NOTA                                                  */
/*==============================================================*/
create table NOTA
(
   CODIGONOTA           int auto_increment,
   MATRICULAALUNO       int unsigned not null,
   RECUPERACAO          varchar(10),
   FINAL                varchar(10),
   TIPONOTA             VARCHAR(10),
   SITUACAO             VARCHAR(15)
   primary key (CODIGONOTA)
);

/*==============================================================*/
/* Table: NOTACONCEITO                                          */
/*==============================================================*/
create table NOTACONCEITO
(
   CODIGONOTA           int not null,
   MATRICULAALUNO       int not null,
   CONCEITO1            varchar(10),
   CONCEITO2            varchar(10)
);

/*==============================================================*/
/* Table: NOTANUMERO                                            */
/*==============================================================*/

create table NOTANUMERO
(
   CODIGONOTA           int not null,
   MATRICULAALUNO       int not null
   NOTA1                varchar(10),
   NOTA2                varchar(10)
);

/*==============================================================*/
/* Table: PRESENCA                                              */
/*==============================================================*/
create table PRESENCA
(
   MATRICULAALUNO        int unsigned,
   CODIGODISCIPLINATURMA int unsigned,
   DATA                  date
);

/*==============================================================*/
/* Table: PROFESSOR                                             */
/*==============================================================*/
create table PROFESSOR
(
   CODIGOPROFESSOR      int unsigned not null,
   NOME                 varchar(50),
   TELEFONE             varchar(15),
   primary key (CODIGOPROFESSOR)
);

/*==============================================================*/
/* Table: PROFESSORDISCIPLINA                                   */
/*==============================================================*/
create table PROFESSORDISCIPLINA
(
   CODIGOPROFESSOR      int unsigned,
   CODIGODISCIPLINA     int unsigned
);

/*==============================================================*/
/* Table: PERIODO                                               */
/*==============================================================*/
create table PERIODO
(
   CODIGOPERIODO        int unsigned not null,
   TIPOENSINO           varchar(50),
   primary key (CODIGOPERIODO)
);

/*==============================================================*/
/* Table: TIPOUSUARIO                                           */
/*==============================================================*/
create table TIPOUSUARIO
(
   CODIGOTIPOUSUARIO    int UNSIGNED not null,
   DESCRICAOTIPOUSUARIO varchar(50),
   primary key (CODIGOTIPOUSUARIO)
);

/*==============================================================*/
/* Table: TURMA                                                 */
/*==============================================================*/
create table TURMA
(
   ANO                  int unsigned,
   TURNO                varchar(20),
   CODIGOTURMA          int unsigned not null,
   CODIGOPERIODO        int unsigned,
   primary key (CODIGOTURMA)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   CODIGOUSUARIO        int unsigned not null,
   CODIGOTIPOUSUARIO    int unsigned,
   USUARIOLOGIN         varchar(50),
   SENHA                int unsigned,
   CONFIRMARSENHA       int unsigned,   
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

alter table PROFESSORDISCIPLINA add constraint FK_PROFESSORDISCIPLINA_DISCIPLINA foreign key (CODIGODISCIPLINA)
      references DISCIPLINA (CODIGODISCIPLINA) on delete CASCADE on update CASCADE;

alter table PROFESSORDISCIPLINA add constraint FK_PROFESSORDISCIPLINA_PROFESSOR foreign key (CODIGOPROFESSOR)
      references PROFESSOR (CODIGOPROFESSOR) on delete CASCADE on update CASCADE;

alter table TURMA add constraint FK_TURMA_PERIODO foreign key (CODIGOPERIODO)
      references PERIODO (CODIGOPERIODO) on delete CASCADE on update CASCADE;
      
alter table USUARIO add constraint FK_USUARIO_TIPOUSUARIO foreign key (CODIGOTIPOUSUARIO)
	  references TIPOUSUARIO (CODIGOTIPOUSUARIO) on delete CASCADE on update CASCADE;
