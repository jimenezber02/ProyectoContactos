CREATE DATABASE IF NOT EXISTS proyectocontactos;
CREATE TABLE IF NOT EXISTS proyectocontactos.usuario(
    id int(11) AUTO_INCREMENT,
	nombre_user varchar(20) not null,
	contrasena varchar(20) not null,

	PRIMARY KEY(id)
); 
CREATE TABLE IF NOT EXISTS proyectocontactos.contactos(
    id int(11) AUTO_INCREMENT,
	nombre varchar(20) not null,
	movil varchar(18) not null,
	correo varchar(30) not null,
	nombre_foto varchar(50) not null,
	id_usuario int(20) NOT NULL,
	CONSTRAINT usuario_id FOREIGN KEY(id_usuario) REFERENCES usuario(id) ON DELETE CASCADE,

	PRIMARY KEY(id) 
)ENGINE=InnoDb;

