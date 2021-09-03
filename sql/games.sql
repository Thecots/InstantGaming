DROP DATABASE IF EXISTS shop;
CREATE DATABASE shop;
USE shop;
CREATE TABLE tb_users (id_user INT PRIMARY KEY AUTO_INCREMENT, username VARCHAR(15), passwd VARCHAR(20), email VARCHAR(40), nombre VARCHAR(25), apellido VARCHAR(35), birth DATE, lvl INT, dayone DATE, profile_picture VARCHAR(140), cartera INT, user_type INT );
CREATE TABLE tb_user_logros(id_logros INT PRIMARY KEY AUTO_INCREMENT, id_user INT, l1 INT, l2 INT,l3 INT,l4 INT,l5 INT, l6 INT);
CREATE TABLE tb_top_game(id_top INT PRIMARY KEY AUTO_INCREMENT, id_user INT, hi_score INT );
CREATE TABLE tb_friends(id_friends INT PRIMARY KEY AUTO_INCREMENT, friend1 INT, friend2 INT, friend_status INT);

CREATE TABLE tb_user_games(id_user_games INT PRIMARY KEY AUTO_INCREMENT, id_user INT, id_game INT, buyed_day DATE, buyed_price int);

CREATE TABLE tb_games (id_game INT PRIMARY KEY AUTO_INCREMENT, title VARCHAR(100), precio int, estado int, dayone_game DATE, cantidad int, game_img VARCHAR(120), vendidos int);

CREATE TABLE tb_compras(id_compra INT PRIMARY KEY AUTO_INCREMENT, id_user INT, id_game INT);

INSERT INTO tb_users VALUE 
(1,'root','root','root@gmail.com','root','root','2000-05-18',0,'2021-03-10','img/user-img/root.jpg',0,0),
(2,'juan','root','root@gmail.com','root','root','2000-05-18',0,'2021-03-10','img/user-img/default.jpg',0,0),
(3,'felix','root','root@gmail.com','root','root','2000-05-18',0,'2021-03-10','img/user-img/default.jpg',0,0),
(4,'rengar','root','root@gmail.com','root','root','2000-05-18',0,'2021-03-10','img/user-img/default.jpg',0,0),
(5,'lux','root','root@gmail.com','root','root','2000-05-18',0,'2021-03-10','img/user-img/default.jpg',0,0),
(6,'Pyke','root','root@gmail.com','root','root','2000-05-18',0,'2021-03-10','img/user-img/default.jpg',0,0),
(7,'Ramon','root','root@gmail.com','root','root','2000-05-18',0,'2021-03-10','img/user-img/default.jpg',0,0),
(9,'DiGreg','root','root@gmail.com','root','root','2000-05-18',0,'2021-03-10','img/user-img/default.jpg',0,0),
(8,'qwertyuiopassdf','root','root@gmail.com','root','root','2000-05-18',0,'2021-03-10','img/user-img/default.jpg',0,0);

INSERT INTO tb_top_game VALUE
(null, 1, 351),
(null, 2, 3251),
(null, 3, 4351),
(null, 4, 515),
(null, 5, 44),
(null,6, 32),
(null, 7, 351),
(null, 8, 351),
(null, 9, 4),
(null, 10, 1),
(null, 11, 42),
(null, 12, 42);

INSERT INTO tb_user_logros VALUE 
(null, 1, 1, 0, 0, 0, 0, 0),
(null, 2, 1, 0, 0, 0, 0, 0),
(null, 3, 1, 0, 0, 0, 0, 0),
(null, 4, 1, 0, 0, 0, 0, 0), 
(null, 5, 1, 0, 0, 0, 0, 0),
(null, 6, 1, 0, 0, 0, 0, 0),
(null, 7, 1, 0, 0, 0, 0, 0),
(null, 8, 1, 0, 0, 0, 0, 0);


INSERT INTO tb_friends VALUE
(null,1,2,1),
(null,1,4,1),
(null,1,5,1),
(null,1,6,1),
(null,7,1,1),
(null,8,1,1),
(null,3,1,1);

INSERT INTO tb_user_games VALUE
(null,1, 1,'2020-03-10',23),
(null,1, 2,'2020-03-10',23),
(null,1, 4,'2020-03-10',23),
(null,1, 7,'2020-03-10',23),
(null,1, 2,'2020-03-10',23),
(null,1, 8,'2020-03-10',23);


INSERT INTO tb_games VALUE
(null,'Cyberpun.',0,1,'2020-03-10',210,'img/games/cyberpunk.jpg',0),
(null,'fifa 21',25,1,'2020-03-10',210,'img/games/fifa21.jpg',0),
(null,'forza Horizon 4',30,1,'2020-03-10',210,'img/games/forza.jpg',0),
(null,'Grand theft auto',10,1,'2020-03-10',210,'img/games/gta.jpg',0),
(null,'Minecraft',18,1,'2020-03-10',210,'img/games/minecraft.jpg',0),
(null,'Outriders',23,1,'2020-03-10',210,'img/games/outriders.jpg',0),
(null,'Resident Evil Village',40,1,'2020-03-10',210,'img/games/village.jpg',0),
(null,'Sims 4',5,1,'2020-03-10',210,'img/games/sims4.jpg',0),
(null,'Monster haunter',23,1,'2020-03-10',210,'img/games/mh.jpg',0),
(null,'Dark douls 3',14,1,'2020-03-10',210,'img/games/ds3.jpg',0),

(null,'Assetto Corsa',14,0,'2020-03-10',210,'img/games/asseto.jpg',0);

/*
Usuarios:
    Información usuario:
        Principal: id, username, passwd, lastpasswd, nombre, apellidos, correo, perfil.
            Secundario: cumpleaños, dayone, user_picture, lvl, saldo.
    productos:
        principal: titulo, precio, img, 


ID > titulo > mini-imagen > estado > cantidad > precio > editar > borrar

ID > usuario > tipo usuario > info > editar > borrar



root - juan

root juan

s * f tb_friends where id1 = root and id2 = root

logros:
        1 Registrate
        2 compra 1 juego
        3 compra 5 juegos
        4 Compra 10 juegs
        5 Compra 50 juegos
        6 Añade a un amigo
        7 Añade a 5 amigos
        8 Cambia tu foto de perfil
        9 Gana 10 de credito
        10 Gana 50 de credito
        11 Gana 100 de credito
        12 Pon un comentario
        

*/