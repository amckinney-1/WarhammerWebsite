CREATE DATABASE IF NOT EXISTS WarhammerDB;

use WarhammerDB;

create table if not exists UnitDatasheets(
 Unit_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 UName VARCHAR(30) NOT NULL,
 Faction VARCHAR(30) NOT NULL,
 KeyWords VARCHAR(300),
 Cost int,
 BaseSize int,
 MaxSize int,
 IsActive bool DEFAULT true
);

INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Drazhar','Drukhari','Epic Hero, Drazhar, Aeldari, Infantry, Character',105,1,1);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Archon','Drukhari','Character, Infantry, Kabal, Aeldari, Archon',85,1,1);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Beastmaster','Drukhari','Beastmaster, Aeldari, Character, Mounted, Fly, Beast',120,7,7);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Corsair Voidreavers','Corsairs','Infantry, Battleline, Grenades, Anrathe, Corsair Voidreavers',70,5,10);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Kabalite Warriors','Drukhari','Kabalite Warriors, Aeldari, Kabal, Battleline, Infantry',120,10,10);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Corsair Voidscarred','Corsairs','Infantry, Anrathe, Corsair Voidscarred',90,5,10);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Court of the Archon','Drukhari','Court of the Archon, Aeldari, Kabal, Infantry',95,4,4);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Incubi','Drukhari','Incubi, Aeldari, Infantry',85,5,10);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Mandrakes','Drukhari','Mandrakes, Aeldari, Infantry',70,5,10);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Scourges','Drukhari','Scourges, Aeldari, Fly, Grenades, Infantry',120,5,10);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Ravager','Drukhari','Ravager, Aeldari, Kabal, Fly, Vehicle',95,1,1);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Tantalus','Drukhari','Vehicle, Transport, Fly, Aeldari',230,1,1);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Raider','Drukhari','Raider, Aeldari, Dedicated Transport, Fly, Vehicle, Transport',90,1,1);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Venom','Drukhari','Venom, Aeldari, Fly, Dedicated Transport, Transport, Vehicle',80,1,1);

INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Belisarius Cawl','Adeptus Mechanicus','Belisarius Cawl, Epic Hero, Monster, Character, Tech-Priest, Imperium',185,1,1);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Cybernetica Datasmith','Adeptus Mechanicus','Cybernetica Datasmith, Tech-Priest, Infantry, Character, Imperium',35,1,1);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Skitarii Marshal','Adeptus Mechanicus','Marshal, Imperium, Faction: Adeptus Mechanicus, Skitarri, Character',45,1,1);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Tech-Priest Dominus','Adeptus Mechanicus','Dominus, Imperium, Tech-Priest, Character, Infantry',75,1,1);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Tech-Priest Enginseer','Adeptus Mechanicus','Enginseer, Imperium, Tech-Priest, Character, Infantry',45,1,1);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Tech-Priest Manipulus','Adeptus Mechanicus','Manipulus, Imperium, Tech-Priest, Character, Infantry',60,1,1);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Technoarcheologist','Adeptus Mechanicus','Technoarcheologist, Imperium, Tech-Priest, Character, Infantry',45,1,1);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Skitarii Rangers','Adeptus Mechanicus','Rangers, Imperium, Infantry, Skitarri, Battleline',125,10,10);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Skitarii Vanguard','Adeptus Mechanicus','Vanguard, Imperium, Infantry, Skitarri, Battleline',100,10,10);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Corpuscarii Electro-Priest','Adeptus Mechanicus','Electro-Priests, Corpuscarii, Imperium, Infantry',65,5,10);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Fulgurite Electro-Priests','Adeptus Mechanicus','Electro-Priests, Fulgurite, Infantry, Imperium',80,5,10);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Kataphron Breachers','Adeptus Mechanicus','Breachers, Kataphron, Infantry, Imperium',150,3,6);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Kataphron Destroyers','Adeptus Mechanicus','Destroyers, Kataphron, Infantry, Imperium',130,3,6);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Pteraxii Skystalkers','Adeptus Mechanicus','Pteraxii Skystalkers, Imperium, Infantry, Fly, Jump Pack, Grenades, Skitarri',70,5,10);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Pteraxii Sterylizors','Adeptus Mechanicus','Pteraxii Sterylizors, Imperium, Infantry, Fly, Jump Pack, Grenades, Skitarri',75,5,10);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Servitors','Adeptus Mechanicus','Servitors, Imperium, Infantry',50,4,4);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Sicarian Infiltrators','Adeptus Mechanicus','Imperium, Skitarri, Infantry, Sicarian Infiltrators',80,5,10);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Sicarian Rustalkers','Adeptus Mechanicus','Sicarian Ruststalkers, Imperium, Infantry, Skitarri',75,5,10);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Serberys Raiders','Adeptus Mechanicus','Serberys Raiders, Imperium, Skitarri, Mounted',75,3,6);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Serberys Sulphurhounds','Adeptus Mechanicus','Serberys Sulphurhounds, Imperium, Skitarri, Mounted',65,3,6);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Archaeopter Fusilave','Adeptus Mechanicus','Archaeopter Fusilave, Vehicle, Aircraft, Fly, Imperium, Skitarri',160,1,1);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Ironstrider Ballistarii','Adeptus Mechanicus','Ironstrider Ballistarii, Vehicle, Smoke, Skitarri',50,1,3);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Kastelan Robots','Adeptus Mechanicus','Kastelan Robots, Imperium, Vehicle, Walker',215,2,4);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Onager Dunecrawler','Adeptus Mechanicus','Onager Dunecrawler, Imperium, Vehicle, Walker, Skitarri',140,1,1);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Skorpius Disintegrator','Adeptus Mechanicus','Skorpius Disintegrator, Imperium, Skitarri, Vehicle',195,1,1);
INSERT INTO UnitDatasheets (UName,Faction,KeyWords,Cost,BaseSize,MaxSize) VALUES('Sydonian Dragoons','Adeptus Mechanicus','Sydonian Dragoons, Imperium, Skitarri, Vehicle, Walker',75,1,3);

CREATE TABLE IF NOT EXISTS users (
    id int NOT NULL AUTO_INCREMENT primary key,
      username varchar(50) NOT NULL,
      password varchar(100) NOT NULL,
      email varchar(100) NOT NULL,
      isAdmin bool NOT NULL,
	  IsActive bool DEFAULT true
);

INSERT INTO users (username,password,email,isAdmin) VALUES('admin','admin','admin@email.com',true);
INSERT INTO users (username,password,email,isAdmin) VALUES('user','user','user@email.com',false);