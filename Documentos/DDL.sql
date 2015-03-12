DROP TABLE IF EXISTS Campeonato CASCADE
;
DROP TABLE IF EXISTS Categoria CASCADE
;
DROP TABLE IF EXISTS FaixaDeIdade CASCADE
;
DROP TABLE IF EXISTS Jogador CASCADE
;
DROP TABLE IF EXISTS JogadorNaPartida CASCADE
;
DROP TABLE IF EXISTS JoinCategoriaToCampeonato CASCADE
;
DROP TABLE IF EXISTS JoinJogadorToSumula CASCADE
;
DROP TABLE IF EXISTS JoinTimeToSumula CASCADE
;
DROP TABLE IF EXISTS Partida CASCADE
;
DROP TABLE IF EXISTS Pessoa CASCADE
;
DROP TABLE IF EXISTS Sumula CASCADE
;
DROP TABLE IF EXISTS Time CASCADE
;
DROP TABLE IF EXISTS TimeNaPartida CASCADE
;

CREATE TABLE Campeonato ( 
	nome varchar(50) NOT NULL,
	id integer NOT NULL,
	juizID integer NOT NULL
)
;

CREATE TABLE Categoria ( 
	nome varchar(50) NOT NULL,
	id integer NOT NULL,
	campeonatoID Integer NOT NULL,
	faixaDeIdadeID Integer NOT NULL
)
;

CREATE TABLE FaixaDeIdade ( 
	idadeMaximaGoleiro integer NOT NULL,
	idadeMaximaJogador integer NOT NULL,
	idadeMinimaGoleiro integer NOT NULL,
	idadeMinimaJogador integer NOT NULL,
	id integer NOT NULL
)
;

CREATE TABLE Jogador ( 
	goleiro boolean NOT NULL,
	id integer NOT NULL
)
;

CREATE TABLE JogadorNaPartida ( 
	cartaoVermelho Boolean,
	nCartaoAzul integer NOT NULL,
	nFaltas integer NOT NULL,
	nGol integer NOT NULL,
	PartidaID integer NOT NULL,
	JogadorID integer NOT NULL
)
;

CREATE TABLE JoinCategoriaToCampeonato ( 
	CategoriaID integer NOT NULL,
	CampeonatoID integer NOT NULL
)
;

CREATE TABLE JoinJogadorToSumula ( 
	sumulaID integer NOT NULL,
	jogadorID integer NOT NULL
)
;

CREATE TABLE JoinTimeToSumula ( 
	sumulaID integer NOT NULL,
	timeID integer NOT NULL
)
;

CREATE TABLE Partida ( 
	campo varchar(50) NOT NULL,
	data timestamp NOT NULL,
	nome varchar(50),
	partidaAtiva boolean NOT NULL,
	id integer NOT NULL,
	categoriaID Integer NOT NULL,
	PessoaID integer NOT NULL,
	sumulaID Integer NOT NULL
)
;

CREATE TABLE Pessoa ( 
	login varchar(50),
	senha varchar(50),
	Tipo integer NOT NULL,
	nome varchar(50),
	id integer NOT NULL,
	id_jogador integer
)
;

CREATE TABLE Sumula ( 
	observacoes text NOT NULL,
	id integer NOT NULL
)
;

CREATE TABLE Time ( 
	nome varchar(50) NOT NULL,
	id integer NOT NULL,
	categoriaID Integer NOT NULL
)
;

CREATE TABLE TimeNaPartida ( 
	wo boolean NOT NULL,
	TimeID integer NOT NULL,
	PartidaID integer NOT NULL
)
;


ALTER TABLE Pessoa
	ADD CONSTRAINT UQ_Pessoa_id UNIQUE (id)
;
ALTER TABLE Pessoa
	ADD CONSTRAINT UQ_Pessoa_id_jogador UNIQUE (id_jogador)
;
ALTER TABLE Campeonato ADD CONSTRAINT PK_Campeonato 
	PRIMARY KEY (id)
;


ALTER TABLE Categoria ADD CONSTRAINT PK_Categoria 
	PRIMARY KEY (id)
;


ALTER TABLE FaixaDeIdade ADD CONSTRAINT PK_FaixaDeIdade 
	PRIMARY KEY (id)
;


ALTER TABLE Jogador ADD CONSTRAINT PK_Jogador 
	PRIMARY KEY (id)
;


ALTER TABLE JogadorNaPartida ADD CONSTRAINT PK_JogadorNaPartida 
	PRIMARY KEY (PartidaID, JogadorID)
;


ALTER TABLE JoinCategoriaToCampeonato ADD CONSTRAINT PK_JoinCategoriaToCampeonato 
	PRIMARY KEY (CategoriaID, CampeonatoID)
;


ALTER TABLE JoinJogadorToSumula ADD CONSTRAINT PK_JoinJogadorToSumula 
	PRIMARY KEY (sumulaID, jogadorID)
;


ALTER TABLE JoinTimeToSumula ADD CONSTRAINT PK_JoinTimeToSumula 
	PRIMARY KEY (sumulaID, timeID)
;


ALTER TABLE Partida ADD CONSTRAINT PK_Partida 
	PRIMARY KEY (id)
;


ALTER TABLE Pessoa ADD CONSTRAINT PK_Pessoa 
	PRIMARY KEY (id)
;


ALTER TABLE Sumula ADD CONSTRAINT PK_Sumula 
	PRIMARY KEY (id)
;


ALTER TABLE Time ADD CONSTRAINT PK_Time 
	PRIMARY KEY (id)
;


ALTER TABLE TimeNaPartida ADD CONSTRAINT PK_TimeNaPartida 
	PRIMARY KEY (TimeID, PartidaID)
;




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
