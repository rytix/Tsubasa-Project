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
	ativo Boolean NOT NULL,
	nome String NOT NULL,
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
	idadeMaximaGoleiro const int NOT NULL,
	idadeMaximaJogador const int NOT NULL,
	idadeMinimaGoleiro const int NOT NULL,
	idadeMinimaJogador const int NOT NULL,
	nome String NOT NULL,
	categoriaID Integer NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (categoriaID)
) 
;

CREATE TABLE Jogador --JOIN TIME SOCIO 
(
	goleiro Boolean NOT NULL,
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


CREATE TABLE JogadorNaSumula --JOIN JOGADOR SUMULA 
(
	cartaoVermelho Boolean NOT NULL,
	nCartaoAzul int NOT NULL,
	nFaltas int NOT NULL,
	nGol int NOT NULL,
        jogadorID Integer NOT NULL,
        sumulaID Integer NOT NULL,
	PRIMARY KEY (jogadorID,sumulaID),
) 
;

CREATE TABLE Partida 
(
	partidaID Integer NOT NULL AUTO_INCREMENT,
	campo String NOT NULL,
	data Datetime NOT NULL,
	nome String NOT NULL,
	partidaAtiva boolean NOT NULL,
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
	sumulaID Integer NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (sumulaID),
) 
;


CREATE TABLE Time 
(
	nome String NOT NULL,
	timeID Integer AUTO_INCREMENT,
        campeonatoCategoriaID Integer NOT NULL,
	PRIMARY KEY (timeID),
        KEY (campeonatoCategoriaID)
) 
;


CREATE TABLE TimeNaSumula --JOIN SUMULA TIME (são informações da sumula) 
(
	wo Boolean NOT NULL,
        sumulaID Integer NOT NULL,
	timeID Integer NOT NULL,
	PRIMARY KEY (sumulaID,timeID)
) 
;


CREATE TABLE Usuario
(
	login String NOT NULL,
	nome String NOT NULL,
	senha String NOT NULL,
	usuarioID Integer NOT NULL AUTO_INCREMENT,
        tipo Integer NOT NULL,
	PRIMARY KEY (usuarioID)

) 
;


SET FOREIGN_KEY_CHECKS=1;


ALTER TABLE Campeonato ADD CONSTRAINT FK_Campeonato_UsuarioJuiz 
	FOREIGN KEY (juizID) REFERENCES Usuario (usuarioID)
;

ALTER TABLE CampeonatoCategoria ADD CONSTRAINT FK_CampeonatoCategoria_Campeonato 
	FOREIGN KEY (campeonatoID) REFERENCES Campeonato (campeonatoID)
;

ALTER TABLE CampeonatoCategoria ADD CONSTRAINT FK_CampeonatoCategoria_Categoria 
	FOREIGN KEY (categoriaID) REFERENCES Categoria (categoriaID)
;

ALTER TABLE Jogador ADD CONSTRAINT FK_Jogador_Time
	FOREIGN KEY (timeID) REFERENCES Time (timeID)
;

ALTER TABLE Jogador ADD CONSTRAINT FK_Jogador_Socio 
	FOREIGN KEY (socioID) REFERENCES Socio (socioID)
;

ALTER TABLE Jogador ADD CONSTRAINT FK_Jogador_CampeonatoCategoria 
	FOREIGN KEY (campeonatoCategoriaID) REFERENCES CampeonatoCategoria (campeonatoCategoriaID)
;

ALTER TABLE JogadorNaSumula ADD CONSTRAINT FK_JogadorNaSumula_Jogador 
	FOREIGN KEY (jogadorID) REFERENCES Jogador (jogadorID)
;

ALTER TABLE JogadorNaSumula ADD CONSTRAINT FK_JogadorNaSumula_Sumula
	FOREIGN KEY (sumulaID) REFERENCES Sumula (sumulaID)
;

ALTER TABLE Partida ADD CONSTRAINT FK_Partida_Sumula 
	FOREIGN KEY (sumulaID) REFERENCES Sumula (sumulaID)
;

ALTER TABLE Partida ADD CONSTRAINT FK_Partida_CampeonatoCategoriaID 
	FOREIGN KEY (campeonatoCategoriaID) REFERENCES CampeonatoCategoria (campeonatoCategoriaID)
;

ALTER TABLE Time ADD CONSTRAINT FK_Time_CampeonatoCategoria 
	FOREIGN KEY (campeonatoCategoriaID) REFERENCES CampeonatoCategoria (campeonatoCategoriaID)
;

ALTER TABLE TimeNaSumula ADD CONSTRAINT FK_TimeNaSumula_Sumula 
	FOREIGN KEY (sumulaID) REFERENCES Sumula (sumulaID)
;

ALTER TABLE TimeNaSumula ADD CONSTRAINT FK_TimeNaSumula_Time
	FOREIGN KEY (timeID) REFERENCES Time (timeID)
;