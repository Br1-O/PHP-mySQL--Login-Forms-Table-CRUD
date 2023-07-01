-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ DB CREATE INSTRUCTION ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --

create database panama;

-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ NEW TABLE USERS ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --

create table users (
id auto_increment PRIMARY KEY,    
'user' VARCHAR(50), 
'password' VARCHAR(100), 
'role' INT(3), 
'name' VARCHAR(50), 
lastName VARCHAR(50), 
birthDate date, 
gender VARCHAR(30), 
company VARCHAR(100), 
email VARCHAR(100), 
phone VARCHAR(20), 
country VARCHAR(50), 
city VARCHAR(50), 
socialMedia VARCHAR(50), 
picture VARCHAR(255), 
validatedEmail BOOLEAN, 
registrationDate DATE, 
lastLogin TIMESTAMP, 
isActive BOOLEAN, 
activationToken VARCHAR(100), 
resetPasswordToken VARCHAR(100));

-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ NEW TABLE COMPANIES ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --



-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --



create table empresas(id INT auto_increment PRIMARY KEY, 
nombre VARCHAR(255), 
servicios VARCHAR(255), 
responsable VARCHAR(255), 
telefono VARCHAR (50), 
pagina VARCHAR(255), 
comentarios longtext, 
fecha_inicio date, 
fecha_cierre date);

-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ INSERT NEW REGISTER INTO USERS TABLE ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --

insert into users (user, 
password, 
role, 
name, 
lastName, 
birthDate, 
gender, 
company, 
email, 
phone, 
country, 
city, 
socialMedia, 
picture, 
validatedEmail, 
registrationDate, 
lastLogin, 
isActive, 
activationToken, 
resetPasswordToken)
values
('admin',
'admin',
999,
'Bruno',
'Ortuño',
'1990-09-20',
'Hombre',
'Freelancer',
'bruno.ortuno2@gmail.com',
'005492234376321',
'Argentina',
'Mar del Plata',
'["www.facebook.com"]',
'C:\xampp\htdocs\Proyecto_panama\public\images\default-profile-picture.png',
'0',
'2023-06-09',
'0000-00-00',
0,
'dsfdfddsf',
'dsfsdffdsdfs'
);

-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --