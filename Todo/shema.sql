create database takalo;

drop table echange;
drop table photo;
drop table historique;
drop table objet;
drop table categorie;
drop table membres;

create table membres(
    id_membre integer PRIMARY KEY auto_increment,
    nom varchar(100),
    prenom varchar(100),
    sexe integer,
    mdp varchar(50),
    dtn DATE
);
create table categorie(
    id_categorie integer PRIMARY KEY auto_increment,
    nom varchar(50)
);


insert into categorie values(default,'vetement');
insert into categorie values(default,'technologie');
insert into categorie values(default,'accessoir');
insert into categorie values(default,'autre');
insert into categorie values(default,'sport');
create table objet(
    id_objet integer PRIMARY KEY auto_increment,
    desciption TEXT,
    prix integer,
    id_membre integer,
    id_cat integer,
    FOREIGN KEY(id_membre) REFERENCES membres(id_membre),
    FOREIGN KEY(id_cat) REFERENCES categorie(id_categorie)
);

create table historique(
    idhisto integer PRIMARY KEY auto_increment,
    idob1 integer,
    idob2 integer,
    idm1 integer,
    idm2 integer,
    daty DATE,
    FOREIGN KEY(idob1) REFERENCES objet(id_objet),
    FOREIGN KEY(idob2) REFERENCES objet(id_objet),
    FOREIGN KEY(idm1) REFERENCES membres(id_membre),
    FOREIGN KEY(idm2) REFERENCES membres(id_membre)
);

create table photo
(
    id_photo integer PRIMARY KEY auto_increment,
    nom varchar(100),
    id_objet integer,
    FOREIGN KEY(id_objet) REFERENCES objet(id_objet)
);

create table echange
(
    id_echange integer PRIMARY KEY auto_increment,
    idob1 integer,
    idob2 integer,
    idm1 integer,
    idm2 integer,
    dateAccepte DATE,
    FOREIGN KEY(idob1) REFERENCES objet(id_objet),
    FOREIGN KEY(idob2) REFERENCES objet(id_objet),
    FOREIGN KEY(idm1) REFERENCES membres(id_membre),
    FOREIGN KEY(idm2) REFERENCES membres(id_membre)
);

insert into membres values(default,'Rindra','Juvenal',1,'1234','2000-12-23');
insert into membres values(default,'Steven','Rasolofoson',1,'1234','2002-05-24');
insert into membres values(default,'Lucas','Rakotobe',1,'1234','1978-01-03');
insert into membres values(default,'Alice','Mahalanja',2,'1234','2004-12-23');
insert into membres values(default,'Cynthia','Juvenal',2,'1234','2020-11-18');
insert into membres values(default,'Rosalinda','Fitia',2,'1234','2006-12-23');
insert into membres values(default,'Admin','admin',null,'admin',null);

insert into objet values(default,'Etat presque neuve impecable',2000,1,null);
insert into objet values(default,'Provence d\'europe autenthique',3000,1,null);
insert into objet values(default,'Valeur encestral d\'afrique',4000,3,null);
insert into objet values(default,'Qualite exceptionnel magic',1500,3,null);

insert into photo values(default,'bike.jpg',1);
insert into photo values(default,'montre.jpg',2);
insert into photo values(default,'parfum.jpg',3);
insert into photo values(default,'sac.jpg',4);

select m.id_membre,m.nom,m.prenom,o.id_objet,o.desciption,o.prix,p.nom as image from objet o
    join membres m on o.id_membre = m.id_membre
    join photo p on o.id_objet = p.id_objet;

select e.id_echange,
        p1.nom as photo1,p2.nom as photo2,
        o1.id_objet as objet1,o1.desciption as desc1,o1.prix as prix1,o1.id_membre as membre1,
        o2.id_objet as objet2,o2.desciption as desc2,o2.prix as prix2,o2.id_membre as membre2
        from echange e
    join objet o1 on e.idob1=o1.id_objet
    join objet o2 on e.idob2=o2.id_objet 
    join photo p1 on o1.id_objet = p1.id_objet
    join photo p2 on o2.id_objet = p2.id_objet
;

select h.idhisto,
        p1.nom as photo1,p2.nom as photo2,
        o1.id_objet as objet1,o1.desciption as desc1,o1.prix as prix1,o1.id_membre as membre1,
        o2.id_objet as objet2,o2.desciption as desc2,o2.prix as prix2,o2.id_membre as membre2,
        h.daty
        from historique h
    join objet o1 on h.idob1=o1.id_objet
    join objet o2 on h.idob2=o2.id_objet 
    join photo p1 on o1.id_objet = p1.id_objet
    join photo p2 on o2.id_objet = p2.id_objet
    order by daty desc
;