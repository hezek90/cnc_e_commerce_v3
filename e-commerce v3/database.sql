CREATE TABLE PRODUCTO (
	codpro int not null AUTO_INCREMENT,
	nompro varchar(50) null,
	despro varchar(100) null,
	prepro numeric(6,2) null,
	estado int null,
	CONSTRAINT pk_producto
	PRIMARY KEY (codpro) 
);

alter TABLE PRODUCTO add rutimapro varchar(100) null;

INSERT INTO PRODUCTO(nompro,despro,prepro,estado,rutimapro)
VALUES ('Lobo','Ideal para decoración','500',1,'cnc-lobo.png'),
('Plumas','Ideal para decoración','350',1,'p-plumas.png'),
('México', 'Ideal para decoración', '350',1,'p-mexico.png'),
('Caballo', 'Ideal para decoración', '350',1,'p-horse.png'),
('Águila', 'Ideal para decoración', '350',1,'p-eagle.png'),
('Tiburón', 'Ideal para decoración', '350',1,'p-shark.png');

CREATE TABLE USUARIO(
	codusu int not null AUTO_INCREMENT,
	nomusu varchar(50),
	apeusu varchar(50),
	emausu varchar(100) not null,
	pasusu varchar(20) not null,
	estado int not null,
	CONSTRAINT pk_usuario
	PRIMARY KEY (codusu)
)

alter TABLE USUARIO add dirusu varchar(100) null;
alter TABLE USUARIO add telusu varchar(12) null;
alter TABLE USUARIO add citusu varchar(50) null;



INSERT INTO USUARIO (nomusu,apeusu,emausu,pasusu,estado)
VALUES('demo','adfff','demo@gmail.com','1234567890',1);

create table PEDIDO(
	codped int not null AUTO_INCREMENT,
	codusu int not null,
	codpro int not null,
	fecped datetime not null,
	estado int not null,
	dirusuped varchar(50) not null,
	telusuped varchar(12) not null,
	PRIMARY KEY (codped)
);

CREATE TABLE `FORO` (
 `id` int(8) NOT NULL AUTO_INCREMENT,
 `author` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
 `title` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
 `msj` text COLLATE utf8mb4_spanish2_ci NOT NULL,
 `fech` datetime NOT NULL,
 `resp` int(11) NOT NULL,
 `identifier` int(8) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci

# SHOW CREATE TABLE (nombre de tabla); nos retorna el código de la tabla



CREATE TABLE PROCUSTOM(
  idpro int(11) not null AUTO_INCREMENT,
  nompro varchar(50) not null,
  imgpro varchar(100) not null,
  dimx int(3) not null,
  dimy int(3) not null,
  PRIMARY KEY (idpro)
)
 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci