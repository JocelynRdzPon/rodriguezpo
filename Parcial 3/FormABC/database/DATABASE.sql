CREATE DATABASE web18100229;
USE web18100229;
-- MySql
CREATE TABLE usuario(
 id_usuario VARCHAR(45) NOT NULL,
 nombre VARCHAR(45) NOT NULL,
 contraseña VARCHAR(45) NOT NULL,
 PRIMARY KEY(id_usuario)
 );
 CREATE TABLE pedido(
 id_pedido smallint not null auto_increment,
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
 PRIMARY KEY(id_pedido)
 );
 use web18100229;

insert into usuario values('U01','admin','12345');
insert into usuario values('U02','cajera','12345');

INSERT INTO pedido (nombrecliente, apellidoscliente, telefono, direccion, fechaentrega, horaentrega, saborpastel, rellenopastel, coberturapastel, porcionespastel)
VALUES ('Santiago','Dominguez Sanchez','867123456','Canales #3450 Buenavista 88000','2021-11-15','15:30:30','Vainilla','Mermelada de fresa','Mantequilla','10-15'); 

INSERT INTO pedido (nombrecliente, apellidoscliente, telefono, direccion, fechaentrega, horaentrega, saborpastel, rellenopastel, coberturapastel, porcionespastel)
VALUES ('Ana Sofia','Ramirez Lopez','867234987','Llano #1670 Los Encinos 8800','2021-11-15','09:00:00','Fresa','Nutella','Mantequilla','5-6'); 

INSERT INTO pedido (nombrecliente, apellidoscliente, telefono, direccion, fechaentrega, horaentrega, saborpastel, rellenopastel, coberturapastel, porcionespastel)
VALUES ('Guillermo','Huerta Diaz','867789345','Adelfa #1230 Los Encinos 88000','2021-11-16','10:45:00','Chocolate','Cajeta','Chocolate','15-20'); 

INSERT INTO pedido (nombrecliente, apellidoscliente, telefono, direccion, fechaentrega, horaentrega, saborpastel, rellenopastel, coberturapastel, porcionespastel)
VALUES ('Susana','Gonzales Rodriguez','867321654','Tampico #7890 Las Torres 88000','2021-11-16','12:00:00','Vainilla','Cajeta','Queso crema','5-6'); 

INSERT INTO pedido (nombrecliente, apellidoscliente, telefono, direccion, fechaentrega, horaentrega, saborpastel, rellenopastel, coberturapastel, porcionespastel)
VALUES ('Daniela','Fuentes Rios','8671298176','Venustiano Carranza #8970 Concordia 88000','2021-11-17','8:00:00','Chocolate','Mermelada de fresa','Mantequilla','8-10');

select * from usuario;
select * from pedido;