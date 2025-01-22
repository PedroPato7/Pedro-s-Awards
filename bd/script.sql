CREATE SCHEMA IF NOT EXISTS pedroAwards;

USE pedroAwards;

CREATE TABLE IF NOT EXISTS jogo(
	id INT NOT NULL UNIQUE AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    extensaoImagem VARCHAR(45) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS categoria(
	id INT NOT NULL UNIQUE AUTO_INCREMENT,
    nome VARCHAR(45) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS jogo_categoria(
	id_jogo INT NOT NULL,
    id_categoria INT NOT NULL,
    totalVotos INT DEFAULT 0,
    PRIMARY KEY (id_jogo, id_categoria),
    FOREIGN KEY (id_jogo) REFERENCES jogo (id),
    FOREIGN KEY (id_categoria) REFERENCES categoria (id)
);