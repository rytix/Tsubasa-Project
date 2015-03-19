SET FOREIGN_KEY_CHECKS=0;


CREATE TABLE IF NOT EXISTS  `ci_sessions` (
	session_id varchar(40) DEFAULT '0' NOT NULL,
	ip_address varchar(45) DEFAULT '0' NOT NULL,
	user_agent varchar(120) NOT NULL,
	last_activity int(10) unsigned DEFAULT 0 NOT NULL,
	user_data text NOT NULL,
	PRIMARY KEY (session_id),
	KEY `last_activity_idx` (`last_activity`)
);

CREATE TABLE Campeonato
(
	nome VARCHAR(50) NOT NULL,
	id INTEGER NOT NULL,
	juizID INTEGER NOT NULL,
	PRIMARY KEY (id),
	KEY (juizID)

) 
;


CREATE TABLE Categoria
(
	nome VARCHAR(50) NOT NULL,
	id INTEGER NOT NULL,
	campeonatoID INTEGER NOT NULL,
	faixaDeIdadeID INTEGER NOT NULL,
	PRIMARY KEY (id),
	KEY (faixaDeIdadeID)

) 
;


CREATE TABLE FaixaDeIdade
(
	idadeMaximaGoleiro INTEGER NOT NULL,
	idadeMaximaJogador INTEGER NOT NULL,
	idadeMinimaGoleiro INTEGER NOT NULL,
	idadeMinimaJogador INTEGER NOT NULL,
	id INTEGER NOT NULL,
	PRIMARY KEY (id)

) 
;


CREATE TABLE Jogador
(
	goleiro BOOL NOT NULL,
	id INTEGER NOT NULL,
	PRIMARY KEY (id)

) 
;


CREATE TABLE JogadorNaPartida
(
	cartaoVermelho BOOL,
	nCartaoAzul INTEGER NOT NULL,
	nFaltas INTEGER NOT NULL,
	nGol INTEGER NOT NULL,
	PartidaID INTEGER NOT NULL,
	JogadorID INTEGER NOT NULL,
	PRIMARY KEY (PartidaID, JogadorID),
	KEY (JogadorID),
	KEY (PartidaID)

) 
;


CREATE TABLE JoinCategoriaToCampeonato
(
	CategoriaID INTEGER NOT NULL,
	CampeonatoID INTEGER NOT NULL,
	PRIMARY KEY (CategoriaID, CampeonatoID),
	KEY (CategoriaID)

) 
;


CREATE TABLE JoinJogadorToSumula
(
	sumulaID INTEGER NOT NULL,
	jogadorID INTEGER NOT NULL,
	PRIMARY KEY (sumulaID, jogadorID),
	KEY (jogadorID),
	KEY (sumulaID)

) 
;


CREATE TABLE JoinTimeToSumula
(
	sumulaID INTEGER NOT NULL,
	timeID INTEGER NOT NULL,
	PRIMARY KEY (sumulaID, timeID),
	KEY (sumulaID),
	KEY (timeID)

) 
;


CREATE TABLE Partida
(
	campo VARCHAR(50) NOT NULL,
	data DATETIME NOT NULL,
	nome VARCHAR(50),
	partidaAtiva BOOL NOT NULL,
	id INTEGER NOT NULL,
	categoriaID INTEGER NOT NULL,
	PessoaID INTEGER NOT NULL,
	sumulaID INTEGER NOT NULL,
	PRIMARY KEY (id),
	KEY (categoriaID),
	KEY (PessoaID),
	KEY (sumulaID)

) 
;


CREATE TABLE Pessoa
(
	login VARCHAR(50),
	senha VARCHAR(50),
	Tipo INTEGER NOT NULL,
	nome VARCHAR(50),
	id INTEGER NOT NULL,
	id_jogador INTEGER,
	PRIMARY KEY (id),
	KEY (id_jogador)

) 
;


CREATE TABLE Sumula
(
	observacoes TEXT NOT NULL,
	id INTEGER NOT NULL,
	PRIMARY KEY (id)

) 
;


CREATE TABLE Time
(
	nome VARCHAR(50) NOT NULL,
	id INTEGER NOT NULL,
	categoriaID INTEGER NOT NULL,
	PRIMARY KEY (id),
	KEY (categoriaID)

) 
;


CREATE TABLE TimeNaPartida
(
	wo BOOL NOT NULL,
	TimeID INTEGER NOT NULL,
	PartidaID INTEGER NOT NULL,
	PRIMARY KEY (TimeID, PartidaID),
	KEY (PartidaID),
	KEY (TimeID)

) 
;



SET FOREIGN_KEY_CHECKS=1;


ALTER TABLE Campeonato ADD CONSTRAINT FK_Campeonato_Pessoa 
	FOREIGN KEY (juizID) REFERENCES Pessoa (id)
;

ALTER TABLE Categoria ADD CONSTRAINT FK_Categoria_FaixaDeIdade 
	FOREIGN KEY (faixaDeIdadeID) REFERENCES FaixaDeIdade (id)
;

ALTER TABLE JogadorNaPartida ADD CONSTRAINT FK_JogadorNaPartida_Jogador 
	FOREIGN KEY (JogadorID) REFERENCES Jogador (id)
;

ALTER TABLE JogadorNaPartida ADD CONSTRAINT FK_JogadorNaPartida_Partida 
	FOREIGN KEY (PartidaID) REFERENCES Partida (id)
;

ALTER TABLE JoinCategoriaToCampeonato ADD CONSTRAINT FK_JoinCategoriaToCampeonato_Categoria 
	FOREIGN KEY (CategoriaID) REFERENCES Categoria (id)
;

ALTER TABLE JoinJogadorToSumula ADD CONSTRAINT FK_JoinJogadorToSumula_Jogador 
	FOREIGN KEY (jogadorID) REFERENCES Jogador (id)
;

ALTER TABLE JoinJogadorToSumula ADD CONSTRAINT FK_JoinJogadorToSumula_Sumula 
	FOREIGN KEY (sumulaID) REFERENCES Sumula (id)
;

ALTER TABLE JoinTimeToSumula ADD CONSTRAINT FK_JoinTimeToSumula_Sumula 
	FOREIGN KEY (sumulaID) REFERENCES Sumula (id)
;

ALTER TABLE JoinTimeToSumula ADD CONSTRAINT FK_JoinTimeToSumula_Time 
	FOREIGN KEY (timeID) REFERENCES Time (id)
;

ALTER TABLE Partida ADD CONSTRAINT FK_Partida_Categoria 
	FOREIGN KEY (categoriaID) REFERENCES Categoria (id)
;

ALTER TABLE Partida ADD CONSTRAINT FK_Partida_Pessoa 
	FOREIGN KEY (PessoaID) REFERENCES Pessoa (id)
;

ALTER TABLE Partida ADD CONSTRAINT FK_Partida_Sumula 
	FOREIGN KEY (sumulaID) REFERENCES Sumula (id)
;

ALTER TABLE Pessoa ADD CONSTRAINT FK_Pessoa_Jogador 
	FOREIGN KEY (id_jogador) REFERENCES Jogador (id)
;

ALTER TABLE Time ADD CONSTRAINT FK_Time_Categoria 
	FOREIGN KEY (categoriaID) REFERENCES Categoria (id)
;

ALTER TABLE TimeNaPartida ADD CONSTRAINT FK_TimeNaPartida_Partida 
	FOREIGN KEY (PartidaID) REFERENCES Partida (id)
;

ALTER TABLE TimeNaPartida ADD CONSTRAINT FK_TimeNaPartida_Time 
	FOREIGN KEY (TimeID) REFERENCES Time (id)
;
