-- This entire database can be constructed by running “source setup.sql” from mysql.
CREATE DATABASE `digestion_quiz` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

USE `digestion_quiz`;

GRANT ALL PRIVILEGES ON digestion_quiz.* TO 'danaavesar'@'localhost' IDENTIFIED BY 'secretpassword';


source user.sql;
source score.sql;
