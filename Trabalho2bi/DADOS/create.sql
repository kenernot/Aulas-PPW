DROP DATABASE IF EXISTS trabalho2bi;
CREATE DATABASE trabalho2bi;
USE trabalho2bi;

-- Criação de tabela

CREATE TABLE estado(
	idEstado INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(50),
	sigla VARCHAR(2)
);

CREATE TABLE cidade(
	idCidade INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	idEstado INT,
	nome VARCHAR(50),
	FOREIGN KEY (idEstado) REFERENCES estado(idEstado)
);

CREATE TABLE usuario(
	idUsuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user VARCHAR(50) UNIQUE,
	password VARCHAR(100),
	nivel CHAR(1)
);

-- Inserção de registros estado

INSERT INTO estado(nome,sigla) VALUES('PARANA','PR');
INSERT INTO estado(nome,sigla) VALUES('SANTA CATARINA','SC');
INSERT INTO estado(nome,sigla) VALUES('MINAS GERAIS','MG');
INSERT INTO estado(nome,sigla) VALUES('RIO GRANDE DO SUL','RS');

-- Inserção de registros cidade

INSERT INTO cidade(nome,idEstado) VALUES('PALOTINA',1);
INSERT INTO cidade(nome,idEstado) VALUES('TOLEDO',1);
INSERT INTO cidade(nome,idEstado) VALUES('FLORIPA',2);
INSERT INTO cidade(nome,idEstado) VALUES('JOAÇABA',2);
INSERT INTO cidade(nome,idEstado) VALUES('CHUI',4);
INSERT INTO cidade(nome,idEstado) VALUES('ERECHIM',4);

-- Inserção de registros usuario

INSERT INTO usuario(user,password,nivel) VALUES('admin',MD5('admin'),'9');