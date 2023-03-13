create database asd;
use asd;

create table todolist(
id int auto_increment primary key,
titulo varchar(30),
descripcion varchar(255),
fecha date,
completado boolean default false
);

insert into todolist(id,titulo,descripcion,fecha,completado) values(1,"asd","asd","2022-1-1",false);
select* from todolist;
