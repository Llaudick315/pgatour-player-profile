DROP TABLE IF EXISTS authorship;
DROP TABLE IF EXISTS article;
DROP TABLE IF EXISTS author;

CREATE TABLE author (
	authorId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(32) NOT NULL,
	email VARCHAR(128) NOT NULL,
	hash CHAR(128),
	salt CHAR(64),
	UNIQUE(name),
	UNIQUE(email),
	PRIMARY KEY(authorId)
);

CREATE TABLE article (
	articleId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	authorId INT UNSIGNED NOT NULL,
	INDEX(authorId),
	FOREIGN KEY(authorId) REFERENCES author(authorId),
	PRIMARY KEY(articleId)
);

CREATE TABLE authorship (
	authorId INT UNSIGNED NOT NULL,
	articleId INT UNSIGNED NOT NULL,
	INDEX(authorId),
	INDEX(articleId),
	FOREIGN KEY(authorId) REFERENCES author(authorId),
	FOREIGN KEY(articleId) REFERENCES article(articleId),
	PRIMARY KEY(authorId, articleId)
);