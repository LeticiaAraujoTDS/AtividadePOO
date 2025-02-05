/* Atividade POO */

create table artistas (
id int auto_increment not null,
nome_artistico varchar(30) not null,
nome varchar(30) not null,
genero_principal varchar(30) not null,
idade int not null,
tipo_artista varchar(1) not null, /*A = Autor, M = Musico, T = Ator */
tipo_midia varchar(20), /*Cinema ou TV*/
num_paticipacoes int,
num_obras int,
obra_famosa varchar(30),
instrumento varchar(20),
num_albuns int,
primary key (id)
);
