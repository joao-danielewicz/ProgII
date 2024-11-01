drop database if exists tarefas;
create database tarefas;
use tarefas;

create table cursos (
	idCurso int not null auto_increment primary key,
    nome text not null,
    areaConhecimento text not null,
    dataAdicao datetime not null default current_timestamp,
    quantidadeNovasTarefas int not null default 10,
    idUsuario int not null default 1
);

create table tarefas (
    idTarefa int not null auto_increment primary key,
    assunto varchar(100) not null,
    pergunta text not null,
    resposta text not null,
    midiaPergunta longblob null,
    midiaResposta longblob null,
    dataAdicao datetime default current_timestamp,
    dataProximoEstudo datetime null default current_timestamp,
    dataUltimoEstudo datetime null default current_timestamp,
    nivelEstudo int not null,
    idCurso int not null,
    constraint fk_id_curso foreign key(idcurso) references cursos(idCurso)
);

insert into cursos (nome, areaConhecimento) values ('teste', 'teste');
insert into cursos (nome, areaConhecimento) values ('outroteste', 'outroteste');
insert into tarefas (assunto, pergunta, resposta, nivelestudo, idcurso) values ('teste', 'teste', 'teste', -1, 1);
insert into tarefas (assunto, pergunta, resposta, nivelestudo, idcurso) values ('outroteste', 'outroteste', 'outroteste', -1, 1);
insert into tarefas (assunto, pergunta, resposta, nivelestudo, idcurso) values ('maisoutroteste', 'maisoutroteste', 'maisoutroteste', -1, 2);
select * from tarefas;

select * from cursos;