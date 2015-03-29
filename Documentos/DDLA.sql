SET FOREIGN_KEY_CHECKS=0;



DROP TABLE IF EXISTS Campeonato CASCADE
;
DROP TABLE IF EXISTS CampeonatoCategoria CASCADE
;
DROP TABLE IF EXISTS Categoria CASCADE
;
DROP TABLE IF EXISTS Diretor CASCADE
;
DROP TABLE IF EXISTS Jogador CASCADE
;
DROP TABLE IF EXISTS JogadorNaPartida CASCADE
;
DROP TABLE IF EXISTS JoinJogadorToSumula CASCADE
;
DROP TABLE IF EXISTS JoinSocioToTime CASCADE
;
DROP TABLE IF EXISTS JoinTimeToSumula CASCADE
;
DROP TABLE IF EXISTS Juiz CASCADE
;
DROP TABLE IF EXISTS Partida CASCADE
;
DROP TABLE IF EXISTS Socio CASCADE
;
DROP TABLE IF EXISTS Sumula CASCADE
;
DROP TABLE IF EXISTS Time CASCADE
;
DROP TABLE IF EXISTS TimeNaPartida CASCADE
;
DROP TABLE IF EXISTS Usuario CASCADE
;

CREATE TABLE Campeonato
(
	ativo Boolean,
	nome String,
	campeonatoID Integer NOT NULL AUTO_INCREMENT,
        juizID Integer NOT NULL,
	PRIMARY KEY (campeonatoID),
        KEY (juizID)
) 
;


CREATE TABLE CampeonatoCategoria --JOIN CAMPEONATO CATEGORIA
(
	campeonatoID Integer NOT NULL,
	categoriaID Integer NOT NULL,
	PRIMARY KEY (campeonatoID,categoriaID)
) 
;


CREATE TABLE Categoria
(
	idadeMaximaGoleiro const int,
	idadeMaximaJogador const int,
	idadeMinimaGoleiro const int,
	idadeMinimaJogador const int,
	nome String,
	categoriaID Integer NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (categoriaID)
) 
;

CREATE TABLE Jogador --JOIN TIME SOCIO
(
	goleiro Boolean,
	jogadorID Integer NOT NULL AUTO_INCREMENT,
        socioID Integer NOT NULL,
        timeID Integer,
        campeonatoCategoriaID Integer NOT NULL,
	PRIMARY KEY (jogadorID),
        KEY (timeID),
        KEY (socioID),
        KEY (campeonatoCategoriaID)
) 
;


CREATE TABLE JogadorNaPartida --JOIN JOGADOR SUMULA
(
	cartaoVermelho Boolean,
	nCartaoAzul int,
	nFaltas int,
	nGol int,
        jogadorID Integer NOT NULL,
        sumulaID Integer NOT NULL,
	PRIMARY KEY (jogadorID,sumulaID),
) 
;

CREATE TABLE Partida
(
	partidaID Integer NOT NULL AUTO_INCREMENT,
	campo String,
	data Datetime,
	nome String,
	partidaAtiva boolean,
	sumulaID Integer,
        campeonatoCategoriaID Integer NOT NULL,
	PRIMARY KEY (partidaID),
	KEY (sumulaID),
        KEY (campeonatoCategoriaID)
) 
;

CREATE TABLE Sumula
(
	observacoes String,
	sumulaID Integer NOT NULL,
	juizID Integer,
	PRIMARY KEY (sumulaID),
	KEY (juizID)
) 
;


CREATE TABLE Time
(
	nome String,
	timeID Integer NOT NULL,
        campeonatoCategoriaID Integer,
	PRIMARY KEY (timeID),
        KEY (campeonatoCategoriaID)

) 
;


CREATE TABLE TimeNaPartida --JOIN SUMULA TIME
(
	wo Boolean,
        sumulaID Integer,
	timeID Integer,
	PRIMARY KEY (sumulaID,timeID)
) 
;


CREATE TABLE Usuario
(
	login String,
	nome String,
	senha String,
	usuarioID Integer NOT NULL,
        tipo Integer NOT NULL,
	PRIMARY KEY (usuarioID)

) 
;



SET FOREIGN_KEY_CHECKS=1;


ALTER TABLE Campeonato ADD CONSTRAINT FK_Campeonato_Juiz 
	FOREIGN KEY (juizID) REFERENCES Juiz (juizID)
;

ALTER TABLE Campeonato ADD CONSTRAINT Cria 
	FOREIGN KEY (diretorID) REFERENCES Diretor (diretorID)
;

ALTER TABLE CampeonatoCategoria ADD CONSTRAINT FK_CampeonatoCategoria_Campeonato 
	FOREIGN KEY (campeonatoID) REFERENCES Campeonato (campeonatoID)
;

ALTER TABLE CampeonatoCategoria ADD CONSTRAINT FK_CampeonatoCategoria_Categoria 
	FOREIGN KEY (categoriaID) REFERENCES Categoria (categoriaID)
;

ALTER TABLE CampeonatoCategoria ADD CONSTRAINT FK_CampeonatoCategoria_Partida 
	FOREIGN KEY (partidaID) REFERENCES Partida (partidaID)
;

ALTER TABLE CampeonatoCategoria ADD CONSTRAINT FK_CampeonatoCategoria_Jogador 
	FOREIGN KEY (jogadorID) REFERENCES Jogador (jogadorID)
;

ALTER TABLE CampeonatoCategoria ADD CONSTRAINT FK_CampeonatoCategoria_Time 
	FOREIGN KEY (timeID) REFERENCES Time (timeID)
;

ALTER TABLE Diretor ADD CONSTRAINT FK_Diretor_Usuario 
	FOREIGN KEY (diretorID) REFERENCES Usuario (usuarioID)
;

ALTER TABLE JoinJogadorToSumula ADD CONSTRAINT Sumula 
	FOREIGN KEY (sumulaID) REFERENCES Sumula (sumulaID)
;

ALTER TABLE JoinJogadorToSumula ADD CONSTRAINT Jogador 
	FOREIGN KEY (jogadorID) REFERENCES Jogador (jogadorID)
;

ALTER TABLE JoinSocioToTime ADD CONSTRAINT Time 
	FOREIGN KEY (timeID) REFERENCES Time (timeID)
;

ALTER TABLE JoinSocioToTime ADD CONSTRAINT Socio 
	FOREIGN KEY (socioID) REFERENCES Socio (socioID)
;

ALTER TABLE JoinTimeToSumula ADD CONSTRAINT Sumula 
	FOREIGN KEY (sumulaID) REFERENCES Sumula (sumulaID)
;

ALTER TABLE JoinTimeToSumula ADD CONSTRAINT Time 
	FOREIGN KEY (timeID) REFERENCES Time (timeID)
;

ALTER TABLE Juiz ADD CONSTRAINT Cadastra 
	FOREIGN KEY (diretorID) REFERENCES Diretor (diretorID)
;

ALTER TABLE Juiz ADD CONSTRAINT FK_Juiz_Usuario 
	FOREIGN KEY (juizID) REFERENCES Usuario (usuarioID)
;

ALTER TABLE Partida ADD CONSTRAINT Agenda 
	FOREIGN KEY (juizID) REFERENCES Juiz (juizID)
;

ALTER TABLE Partida ADD CONSTRAINT FK_Partida_Sumula 
	FOREIGN KEY (sumulaID) REFERENCES Sumula (sumulaID)
;

ALTER TABLE Socio ADD CONSTRAINT FK_Socio_Usuario 
	FOREIGN KEY (socioID) REFERENCES Usuario (usuarioID)
;

ALTER TABLE Sumula ADD CONSTRAINT Cria 
	FOREIGN KEY (juizID) REFERENCES Juiz (juizID)
;
