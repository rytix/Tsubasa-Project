#Usuarios **********************************************************************
INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('diretor','Grande Diretor','123',1,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('juiz','Grande Juiz','123',2,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio1','Socio 01','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio2','Socio 02','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio3','Socio 03','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio4','Socio 04','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio5','Socio 05','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio6','Socio 06','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio7','Socio 07','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio8','Socio 08','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio9','Socio 09','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio10','Socio 10','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio11','Socio 11','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio12','Socio 12','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio13','Socio 13','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio14','Socio 14','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio15','Socio 15','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio16','Socio 16','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio17','Socio 17','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio18','Socio 18','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio19','Socio 19','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio20','Socio 20','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio21','Socio 21','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio22','Socio 22','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio23','Socio 23','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio24','Socio 24','123',3,'MASCULINO','1994-01-01');

INSERT INTO `tsubasa_db`.`usuario`
(`login`,`nome`,`senha`,`tipo`,sexo,dataNascimento)
VALUES
('socio25','Socio 25','123',3,'MASCULINO','1994-01-01');

#Campeonatos********************************************************************
INSERT INTO `tsubasa_db`.`campeonato`
(`ativo`,`nome`,`juizID`,data)
VALUES
(true,'Pequeno Campeonato',2,'2015-09-03');

INSERT INTO `tsubasa_db`.`campeonato`
(`ativo`,`nome`,`juizID`,data)
VALUES
(true,'Pequeno Aberto',2,'2014-03-03');

#Categorias*********************************************************************
INSERT INTO `tsubasa_db`.`categoria`
(`idadeMaximaGoleiro`, `idadeMaximaJogador`, `idadeMinimaGoleiro`,
`idadeMinimaJogador`, `nome`,sexo)
VALUES
(7,7,5,5,'Fraudinha','UNISEX');

INSERT INTO `tsubasa_db`.`categoria`
(`idadeMaximaGoleiro`, `idadeMaximaJogador`, `idadeMinimaGoleiro`,
`idadeMinimaJogador`, `nome`,sexo)
VALUES
(11,11,8,8,'Dente de Leite','UNISEX');

INSERT INTO `tsubasa_db`.`categoria`
(`idadeMaximaGoleiro`, `idadeMaximaJogador`, `idadeMinimaGoleiro`,
`idadeMinimaJogador`, `nome`,sexo)
VALUES
(14,14,12,12,'Infanto-Juvenil','MASCULINO');

INSERT INTO `tsubasa_db`.`categoria`
(`idadeMaximaGoleiro`, `idadeMaximaJogador`, `idadeMinimaGoleiro`,
`idadeMinimaJogador`, `nome`,sexo)
VALUES
(999,34,15,15,'Novos','MASCULINO');

INSERT INTO `tsubasa_db`.`categoria`
(`idadeMaximaGoleiro`, `idadeMaximaJogador`, `idadeMinimaGoleiro`,
`idadeMinimaJogador`, `nome`,sexo)
VALUES
(999,47,30,35,'Veteranos','MASCULINO');

INSERT INTO `tsubasa_db`.`categoria`
(`idadeMaximaGoleiro`, `idadeMaximaJogador`, `idadeMinimaGoleiro`,
`idadeMinimaJogador`, `nome`,sexo)
VALUES
(999,999,48,48,'Master','MASCULINO');

INSERT INTO `tsubasa_db`.`categoria`
(`idadeMaximaGoleiro`, `idadeMaximaJogador`, `idadeMinimaGoleiro`,
`idadeMinimaJogador`, `nome`,sexo)
VALUES
(999,999,15,12,'Fraudinha','FEMININO');

#CampeonatoCategoria ***********************************************************
INSERT INTO `tsubasa_db`.`campeonatocategoria`
(`campeonatoID`, `categoriaID`)
VALUES
(1,4);
INSERT INTO `tsubasa_db`.`campeonatocategoria`
(`campeonatoID`, `categoriaID`)
VALUES
(2,1);

#Time **************************************************************************
INSERT INTO `tsubasa_db`.`time`
(`nome`, `campeonatoID`, `categoriaID`)
VALUES
('Pinoquio Grande', 1,4);

INSERT INTO `tsubasa_db`.`time`
(`nome`, `campeonatoID`, `categoriaID`)
VALUES
('Palito Rolisso de Madeira', 1,4);

#Jogador ***********************************************************************
INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(true, 3, 1, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 4, 1, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 5, 1, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 6, 1, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 7, 1, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 8, 1, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 9, 1, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 10, 1, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 11, 1, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 12, 1, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 13, 1, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(true, 14, 2, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 15, 2, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 16, 2, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 17, 2, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 18, 2, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 19, 2, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 20, 2, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 21, 2, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 22, 2, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 23, 2, 1, 4);

INSERT INTO `tsubasa_db`.`jogador`
(`goleiro`, `socioID`, `timeID`, `campeonatoID`, `categoriaID`)
VALUES
(false, 24, 2, 1, 4);
#Sumula ************************************************************************
INSERT INTO `tsubasa_db`.`sumula`
(`observacoes`)
VALUES
('Gosto de Torta');

#Partida ***********************************************************************
INSERT INTO `tsubasa_db`.`partida`
(`campo`, `data`, `nome`, `partidaAtiva`, `sumulaID`, `campeonatoID`, `categoriaID`)
VALUES
('Jordão', '2014-03-29','Partida Dos Truta 1', false, 1, 1, 4);

#TimeNaSumula ******************************************************************
INSERT INTO `tsubasa_db`.`timenasumula`
(`wo`, `sumulaID`, `timeID`)
VALUES
(false, 1,1);
INSERT INTO `tsubasa_db`.`timenasumula`
(`wo`, `sumulaID`, `timeID`)
VALUES
(false, 1,2);

#JogadorNaSumula ***************************************************************
INSERT INTO `tsubasa_db`.`jogadornasumula`
(`cartaoVermelho`, `nCartaoAzul`, `nFaltas`, `nGol`, `jogadorID`, `sumulaID`)
VALUES
(true, 1, 7, 0, 1, 1);
INSERT INTO `tsubasa_db`.`jogadornasumula`
(`cartaoVermelho`, `nCartaoAzul`, `nFaltas`, `nGol`, `jogadorID`, `sumulaID`)
VALUES
(false, 1, 2, 3, 2, 1);
INSERT INTO `tsubasa_db`.`jogadornasumula`
(`cartaoVermelho`, `nCartaoAzul`, `nFaltas`, `nGol`, `jogadorID`, `sumulaID`)
VALUES
(false, 0, 0, 2, 3, 1);
INSERT INTO `tsubasa_db`.`jogadornasumula`
(`cartaoVermelho`, `nCartaoAzul`, `nFaltas`, `nGol`, `jogadorID`, `sumulaID`)
VALUES
(false, 0, 0, 1, 4, 1);
INSERT INTO `tsubasa_db`.`jogadornasumula`
(`cartaoVermelho`, `nCartaoAzul`, `nFaltas`, `nGol`, `jogadorID`, `sumulaID`)
VALUES
(false, 0, 0, 1, 5, 1);
INSERT INTO `tsubasa_db`.`jogadornasumula`
(`cartaoVermelho`, `nCartaoAzul`, `nFaltas`, `nGol`, `jogadorID`, `sumulaID`)
VALUES
(false, 0, 0, 3, 14, 1);
INSERT INTO `tsubasa_db`.`jogadornasumula`
(`cartaoVermelho`, `nCartaoAzul`, `nFaltas`, `nGol`, `jogadorID`, `sumulaID`)
VALUES
(false, 0, 0, 4, 15, 1);