drop database if exists tarefas;
create database tarefas;
use tarefas;
create table tarefas (
    id int not null auto_increment primary key,
    assunto varchar(100) not null,
    pergunta text not null,
    midia longblob null,
    dataAdicao datetime default current_timestamp,
    dataProximoEstudo datetime null default current_timestamp,
    dataUltimoEstudo datetime null default current_timestamp,
    nivelEstudo int not null,
    idcurso int null
);


create table respostas (
	id int not null auto_increment primary key,
    respostaCcorreta text not null,
    midia longblob null,
    isMultiplaEscolha bool not null default 0,
    idTarefa int not null,
    constraint fk_id_tarefa foreign key(idTarefa) references tarefas(id)
);

create table opcoesResposta (
	id int not null auto_increment primary key,
    descricao text not null,
    idResposta int not null,
    constraint fk_id_resposta foreign key(idResposta) references respostas(id)
);

select * from tarefas;