drop database if exists tarefas;
create database tarefas;
use tarefas;

create table usuarios (
	idUsuario int not null auto_increment primary key,
    nome text not null,
    email text not null,
    senha varchar(64) not null
);

create table cursos (
	idCurso int not null auto_increment primary key,
    nome text not null,
    areaConhecimento text not null,
    dataAdicao datetime not null default current_timestamp,
    quantidadeNovasTarefas int not null default 10,
    idUsuario int not null,
    constraint fk_id_usuario foreign key(idUsuario) references usuarios(idUsuario)
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

insert into usuarios(nome, email, senha) values ('joao', 'joao@joao.com', 'f44d03a974b576b7bd08cadfe90da134ba4cff04cd59e1bb547c4eb39b77725f');
insert into cursos (nome, areaConhecimento, idUsuario) values ('teste', 'teste', 1);
insert into cursos (nome, areaConhecimento, idUsuario) values ('outroteste', 'outroteste', 1);
insert into tarefas (assunto, pergunta, resposta, nivelestudo, idcurso) values ('teste', 'teste', 'teste', -1, 1);
insert into tarefas (assunto, pergunta, resposta, nivelestudo, idcurso) values ('outroteste', 'outroteste', 'outroteste', -1, 1);
insert into tarefas (assunto, pergunta, resposta, nivelestudo, idcurso) values ('maisoutroteste', 'maisoutroteste', 'maisoutroteste', -1, 2);
select * from tarefas;

select * from cursos;