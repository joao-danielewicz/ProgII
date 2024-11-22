drop database if exists tarefas;
create database tarefas;
use tarefas;

create table usuarios (
	idUsuario int not null auto_increment primary key,
    nome text not null,
    email text not null,
    dataNascimento date not null,
    telefone text not null,
    qtdPontos int not null default 0,
    isAdmin int not null default 0,
    senha varchar(64) not null
);

create table itensCosmeticos(
	idItem int not null auto_increment primary key,
    descricao text not null,
    tipo text not null,
    preco int not null,
    midia longblob not null
);

create table inventarios(
	idInventario int not null auto_increment primary key,
    idUsuario int not null,
    constraint fk_id_usuario_inventario foreign key(idUsuario) references usuarios(idUsuario) on delete cascade
);

create table itensInventario(
	idItem int not null,
    idInventario int not null,
    primary key(idItem, idInventario),
    constraint fk_id_item foreign key(idItem) references itensCosmeticos(idItem) on delete cascade,
    constraint fk_id_inventario foreign key(idInventario) references inventarios(idInventario) on delete cascade
);

create table feedbacks(
	idFeedback int not null auto_increment primary key,
    assunto text not null,
    texto text not null,
    idUsuario int not null,
    constraint fk_id_usuario_feedback foreign key(idUsuario) references usuarios(idUsuario)
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
    constraint fk_id_curso foreign key(idcurso) references cursos(idCurso) on delete cascade
);



select * from inventarios;
