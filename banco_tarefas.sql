drop database if exists tarefas;
create database tarefas;
use tarefas;
create table tarefas (
    id int not null auto_increment primary key,
    nome varchar(100) not null,
    descricao varchar(200) not null,
    prioridade char(10) not null,
    prazo datetime,
    concluida bool
);
insert into tarefas (nome, descricao, prioridade, prazo, concluida) values ('teste', 'teste', 'alto', 20240916, false);
insert into tarefas (nome, descricao, prioridade, prazo, concluida) values ('outro teste', 'mais um teste', 'baixo', 20240927, false);

select * from tarefas;