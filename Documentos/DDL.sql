BEGIN;
SET FOREIGN_KEY_CHECKS=0;

#CODE IGNITER
DROP TABLE IF EXISTS `ci_sessions` CASCADE;

CREATE TABLE IF NOT EXISTS  `ci_sessions` (
	session_id varchar(40) DEFAULT '0' NOT NULL,
	ip_address varchar(45) DEFAULT '0' NOT NULL,
	user_agent varchar(120) NOT NULL,
	last_activity int(10) unsigned DEFAULT 0 NOT NULL,
	user_data text NOT NULL,
	PRIMARY KEY (session_id),
	KEY `last_activity_idx` (`last_activity`)
);
#CODE IGNITER END

DROP TABLE IF EXISTS Campeonato CASCADE
;
DROP TABLE IF EXISTS CampeonatoCategoria CASCADE
;
DROP TABLE IF EXISTS Categoria CASCADE
;
DROP TABLE IF EXISTS Jogador CASCADE
;
DROP TABLE IF EXISTS JogadorNaSumula CASCADE
;
DROP TABLE IF EXISTS TimeNaSumula CASCADE
;
DROP TABLE IF EXISTS Partida CASCADE
;
DROP TABLE IF EXISTS Sumula CASCADE
;
DROP TABLE IF EXISTS Time CASCADE
;
DROP TABLE IF EXISTS Usuario CASCADE
;

CREATE TABLE Campeonato
(
	ativo Boolean NOT NULL,
	nome varchar(256) NOT NULL,
        data Datetime NOT NULL,
	campeonatoID Integer NOT NULL AUTO_INCREMENT,
        juizID Integer NOT NULL,
	PRIMARY KEY (campeonatoID),
        KEY (juizID)
) 
;


CREATE TABLE CampeonatoCategoria #JOIN CAMPEONATO CATEGORIA
(
	campeonatoID Integer NOT NULL,
	categoriaID Integer NOT NULL,
	PRIMARY KEY (campeonatoID,categoriaID)
) 
;


CREATE TABLE Categoria
(
	idadeMaximaGoleiro int NOT NULL,
	idadeMaximaJogador int NOT NULL,
	idadeMinimaGoleiro int NOT NULL,
	idadeMinimaJogador int NOT NULL,
	sexo varchar(256) NOT NULL,
	nome varchar(256) NOT NULL,
	categoriaID Integer NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (categoriaID)
) 
;

CREATE TABLE Jogador #JOIN TIME SOCIO 
(
	goleiro Boolean NOT NULL,
	jogadorID Integer NOT NULL AUTO_INCREMENT,
        socioID Integer NOT NULL,
        timeID Integer,
        campeonatoID Integer NOT NULL,
        categoriaID Integer NOT NULL,
	PRIMARY KEY (jogadorID),
        KEY (timeID),
        KEY (socioID),
        KEY (campeonatoID),
        KEY (categoriaID)
) 
;


CREATE TABLE JogadorNaSumula #JOIN JOGADOR SUMULA 
(
	cartaoVermelho Boolean NOT NULL,
	nCartaoAzul int NOT NULL,
	nFaltas int NOT NULL,
	nGol int NOT NULL,
        jogadorID Integer NOT NULL,
        sumulaID Integer NOT NULL,
	PRIMARY KEY (jogadorID,sumulaID)
) 
;

CREATE TABLE Partida 
(
	partidaID Integer NOT NULL AUTO_INCREMENT,
	campo varchar(256) NOT NULL,
	data Datetime NOT NULL,
	nome varchar(256) NOT NULL,
	partidaAtiva boolean NOT NULL,
	sumulaID Integer,
        campeonatoID Integer NOT NULL,
        categoriaID Integer NOT NULL,
	PRIMARY KEY (partidaID),
	KEY (sumulaID),
        KEY (campeonatoID),
        KEY (categoriaID)
) 
;

CREATE TABLE Sumula
(
	observacoes varchar(9800),
	sumulaID Integer NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (sumulaID)
) 
;


CREATE TABLE Time 
(
	nome varchar(256) NOT NULL,
	timeID Integer AUTO_INCREMENT,
        campeonatoID Integer NOT NULL,
        categoriaID Integer NOT NULL,
	PRIMARY KEY (timeID),
        KEY (campeonatoID),
        KEY (categoriaID)
) 
;


CREATE TABLE TimeNaSumula #JOIN SUMULA TIME (sÃ£o informaÃ§Ãµes da sumula) 
(
	wo Boolean NOT NULL,
        sumulaID Integer NOT NULL,
	timeID Integer NOT NULL,
	PRIMARY KEY (sumulaID,timeID)
) 
;


CREATE TABLE Usuario
(
	login varchar(256) NOT NULL,
	nome varchar(256) NOT NULL,
	senha varchar(256) NOT NULL,
	usuarioID Integer NOT NULL AUTO_INCREMENT,
        tipo Integer NOT NULL,
        dataNascimento Datetime,
        sexo varchar(256),
	PRIMARY KEY (usuarioID)

) 
;


SET FOREIGN_KEY_CHECKS=1;


ALTER TABLE Campeonato ADD CONSTRAINT FK_Campeonato_UsuarioJuiz 
	FOREIGN KEY (juizID) REFERENCES Usuario (usuarioID) ON DELETE CASCADE
;

ALTER TABLE CampeonatoCategoria ADD CONSTRAINT FK_CampeonatoCategoria_Campeonato 
	FOREIGN KEY (campeonatoID) REFERENCES Campeonato (campeonatoID) ON DELETE CASCADE
;

ALTER TABLE CampeonatoCategoria ADD CONSTRAINT FK_CampeonatoCategoria_Categoria 
	FOREIGN KEY (categoriaID) REFERENCES Categoria (categoriaID) ON DELETE CASCADE
;

ALTER TABLE Jogador ADD CONSTRAINT FK_Jogador_Time
	FOREIGN KEY (timeID) REFERENCES Time (timeID) ON DELETE CASCADE
;

ALTER TABLE Jogador ADD CONSTRAINT FK_Jogador_Usuario 
	FOREIGN KEY (socioID) REFERENCES Usuario (usuarioID) ON DELETE CASCADE
;

ALTER TABLE Jogador ADD CONSTRAINT FK_Jogador_CampeonatoCategoria 
	FOREIGN KEY (campeonatoID,categoriaID) REFERENCES CampeonatoCategoria (campeonatoID,categoriaID) ON DELETE CASCADE
;

ALTER TABLE JogadorNaSumula ADD CONSTRAINT FK_JogadorNaSumula_Jogador 
	FOREIGN KEY (jogadorID) REFERENCES Jogador (jogadorID) ON DELETE CASCADE
;

ALTER TABLE JogadorNaSumula ADD CONSTRAINT FK_JogadorNaSumula_Sumula 
	FOREIGN KEY (sumulaID) REFERENCES Sumula (sumulaID) ON DELETE CASCADE
;

ALTER TABLE Partida ADD CONSTRAINT FK_Partida_Sumula 
	FOREIGN KEY (sumulaID) REFERENCES Sumula (sumulaID) ON DELETE CASCADE
;

ALTER TABLE Partida ADD CONSTRAINT FK_Partida_CampeonatoCategoriaID 
	FOREIGN KEY (campeonatoID,categoriaID) REFERENCES CampeonatoCategoria (campeonatoID,categoriaID) ON DELETE CASCADE
;

ALTER TABLE Time ADD CONSTRAINT FK_Time_CampeonatoCategoria 
	FOREIGN KEY (campeonatoID,categoriaID) REFERENCES CampeonatoCategoria (campeonatoID,categoriaID) ON DELETE CASCADE
;

ALTER TABLE TimeNaSumula ADD CONSTRAINT FK_TimeNaSumula_Sumula 
	FOREIGN KEY (sumulaID) REFERENCES Sumula (sumulaID) ON DELETE CASCADE
;

ALTER TABLE TimeNaSumula ADD CONSTRAINT FK_TimeNaSumula_Time 
	FOREIGN KEY (timeID) REFERENCES Time (timeID) ON DELETE CASCADE
;
COMMIT;