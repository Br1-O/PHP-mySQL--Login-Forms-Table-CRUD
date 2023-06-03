create database panama;

create table empresas(id INT auto_increment PRIMARY KEY, 
nombre VARCHAR(255), 
servicios VARCHAR(255), 
responsable VARCHAR(255), 
telefono VARCHAR (50), 
pagina VARCHAR(255), 
comentarios longtext, 
fecha_inicio date, 
fecha_cierre date);

create table usuarios (id INT auto_increment PRIMARY KEY, 
usuario VARCHAR(255), 
contrasena VARCHAR(255), 
nombre VARCHAR (255), 
apellido VARCHAR (255), 
empresa VARCHAR (255), 
email VARCHAR(255), 
telefono VARCHAR(100),
pais VARCHAR(255),
localidad VARCHAR(255)
);

alter table empresas add column nombre VARCHAR(255) after id;
