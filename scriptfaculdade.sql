/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     21/10/2016 12:45:29                          */
/*==============================================================*/


/*==============================================================*/
/* Table: ALUNO                                                 */
/*==============================================================*/
create table ALUNO
(
   MATRICULAALUNO       int not null,
   DATANASCIMENTO       date,
   NOMEALUNO            varchar(50),
   SEXOALUNO            char(1),
   TELEFONE             varchar(15),
   primary key (MATRICULAALUNO)
);

/*==============================================================*/
/* Table: DISCIPLINA                                            */
/*==============================================================*/
create table DISCIPLINA
(
   CODIGODISCIPLINA     int auto_increment,
   NOMEDISCIPLINA       varchar(50),
   primary key (CODIGODISCIPLINA)
);

/*==============================================================*/
/* Table: DISCIPLINATURMA                                       */
/*==============================================================*/
create table DISCIPLINATURMA
(
   CODIGODISCIPLINATURMA int auto_increment,
   CODIGODISCIPLINA      int not null,
   CODIGOPROFESSOR       int not null,
   CODIGOTURMA           int not null,
   CODIGONOTA            int not null,
   primary key (CODIGODISCIPLINATURMA)
);

/*==============================================================*/
/* Table: FALTA                                                 */
/*==============================================================*/
create table FALTA
(
   MATRICULAALUNO        int not null,
   CODIGODISCIPLINATURMA int not null,
   MES                   varchar(15),
   FALTA                 int,
   ABONO                 varchar(5),
   MOTIVO                varchar(50)   
);

/*==============================================================*/
/* Table: NOTA                                                  */
/*==============================================================*/
create table NOTA
(
   CODIGONOTA           int auto_increment,
   MATRICULAALUNO       int not null,
   RECUPERACAO          varchar(10),
   FINAL                varchar(10),
   TIPONOTA             VARCHAR(10),
   SITUACAO             VARCHAR(15),
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
   MATRICULAALUNO       int not null,
   NOTA1                varchar(10),
   NOTA2                varchar(10)
);

/*==============================================================*/
/* Table: PRESENCA                                              */
/*==============================================================*/
create table FREQUENCIA
(
   MATRICULAALUNO        int,
   CODIGODISCIPLINATURMA int  
);

/*==============================================================*/
/* Table: PROFESSOR                                             */
/*==============================================================*/
create table PROFESSOR
(
   CODIGOPROFESSOR      int not null,
   NOME                 varchar(50),
   TELEFONE             varchar(15),
   primary key (CODIGOPROFESSOR)
);

/*==============================================================*/
/* Table: PROFESSORDISCIPLINA                                   */
/*==============================================================*/
create table PROFESSORDISCIPLINA
(
   CODIGOPROFESSOR      int,
   CODIGODISCIPLINA     int
);

/*==============================================================*/
/* Table: PERIODO                                               */
/*==============================================================*/
create table PERIODO
(
   CODIGOPERIODO        int auto_increment,
   NUMEROPERIODO        int,
   TIPOENSINO           varchar(10),
   primary key (CODIGOPERIODO)
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
   CODIGOPERIODO        int not null,
   ANO                  varchar(4),
   TURNO                varchar(5),  
   primary key (CODIGOTURMA)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   CODIGOUSUARIO        int auto_increment,
   CODIGOTIPOUSUARIO    int not null,
   USUARIOLOGIN         varchar(50) not null,
   SENHA                int not null,
   CONFIRMARSENHA       int not null,   
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

alter table FREQUENCIA add constraint FK_FREQUENCIA_ALUNO foreign key (MATRICULAALUNO)
      references ALUNO (MATRICULAALUNO) on delete CASCADE on update CASCADE;

alter table FREQUENCIA add constraint FK_FREQUENCIA_DISCIPLINATURMA foreign key (CODIGODISCIPLINATURMA)
      references DISCIPLINATURMA (CODIGODISCIPLINATURMA) on delete CASCADE on update CASCADE;

alter table PROFESSORDISCIPLINA add constraint FK_PROFESSORDISCIPLINA_DISCIPLINA foreign key (CODIGODISCIPLINA)
      references DISCIPLINA (CODIGODISCIPLINA) on delete CASCADE on update CASCADE;

alter table PROFESSORDISCIPLINA add constraint FK_PROFESSORDISCIPLINA_PROFESSOR foreign key (CODIGOPROFESSOR)
      references PROFESSOR (CODIGOPROFESSOR) on delete CASCADE on update CASCADE;

alter table TURMA add constraint FK_TURMA_PERIODO foreign key (CODIGOPERIODO)
      references PERIODO (CODIGOPERIODO) on delete CASCADE on update CASCADE;
      
alter table USUARIO add constraint FK_USUARIO_TIPOUSUARIO foreign key (CODIGOTIPOUSUARIO)
     references TIPOUSUARIO (CODIGOTIPOUSUARIO) on delete CASCADE on update CASCADE;