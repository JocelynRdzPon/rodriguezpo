CREATE DATABASE N18100229;
USE N18100229;
-- MySql
CREATE TABLE usuario(
 id_usuario VARCHAR(45) NOT NULL,
 correo VARCHAR(45) NOT NULL,
 contraseña VARCHAR(45) NOT NULL,
 PRIMARY KEY(id_usuario)
 );
 CREATE TABLE pedido(
 id_pedido VARCHAR(45) NOT NULL,
 id_usuario VARCHAR(45) NOT NULL,
 nombrecliente VARCHAR(45) NOT NULL,
 apellidoscliente VARCHAR(45) NOT NULL,
 telefono VARCHAR(45) NULL,
 direccion VARCHAR(45) NOT NULL,
 fechaentrega DATE NOT NULL,
 horaentrega TIME NOT NULL,
 saborpastel VARCHAR(45) NOT NULL,
 rellenopastel VARCHAR(45) NOT NULL,
 coberturapastel VARCHAR(45) NOT NULL,
 porcionespastel VARCHAR(45) NOT NULL,
 PRIMARY KEY(id_pedido),
 CONSTRAINT fK_pedido_usuario FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
 );
 use N18100229;

insert into usuario values('U01','santiagodo@gmail.com','12345');
insert into usuario values('U02','anasofia@gmail.com','12345');
insert into usuario values('U03','guillehuerta@gmail.com','12345');
insert into usuario values('U04','susanagonzal@gmail.com','12345');
insert into usuario values('U05','danifuentes@gmail.com','12345');


insert into pedido values('P01','U01','Santiago','Dominguez Sanchez','867123456','Canales #3450 Buenavista 88000','2021-11-15','15:30:30','Vainilla','Mermelada de fresa','Mantequilla','10-15'); 
insert into pedido values('P02','U02','Ana Sofia','Ramirez Lopez','867234987','Llano #1670 Los Encinos 8800','2021-11-15','09:00:00','Fresa','Nutella','Mantequilla','5-6'); 
insert into pedido values('P03','U03','Guillermo','Huerta Diaz','867789345','Adelfa #1230 Los Encinos 88000','2021-11-16','10:45:00','Chocolate','Cajeta','Chocolate','15-20'); 
insert into pedido values('P04','U04','Susana','Gonzales Rodriguez','867321654','Tampico #7890 Las Torres 88000','2021-11-16','12:00:00','Vainilla','Cajeta','Queso crema','5-6'); 
insert into pedido values('P05','U05','Daniela','Fuentes Rios','8671298176','Venustiano Carranza #8970 Concordia 88000','2021-11-17','8:00:00','Chocolate','Mermelada de fresa','Mantequilla','8-10'); 

select * from usuario;
select * from pedido;