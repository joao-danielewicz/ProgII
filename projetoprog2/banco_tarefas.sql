drop database if exists tarefas;
create database tarefas;
use tarefas;
create table tarefas (
    id int not null auto_increment primary key,
    assunto varchar(100) not null,
    pergunta text not null,
    resposta text not null,
    midiaPergunta longblob null,
    midiaResposta longblob null,
    dataAdicao datetime default current_timestamp,
    dataProximoEstudo datetime null default current_timestamp,
    dataUltimoEstudo datetime null default current_timestamp,
    nivelEstudo int not null,
    idcurso int null
);



select * from tarefas;