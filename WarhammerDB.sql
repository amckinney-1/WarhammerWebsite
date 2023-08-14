CREATE DATABASE IF NOT EXISTS WarhammerDB;

use WarhammerDB;

create table if not exists UnitDatasheets(
 Unit_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 UName VARCHAR(25) NOT NULL,
 Faction VARCHAR(25) NOT NULL,
 KeyWords VARCHAR(300),
 Cost int,
 BaseSize int,
 MaxSize int
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

CREATE TABLE IF NOT EXISTS users (
    id int NOT NULL AUTO_INCREMENT primary key,
      username varchar(50) NOT NULL,
      password varchar(100) NOT NULL,
      email varchar(100) NOT NULL,
      isAdmin bool NOT NULL
);

INSERT INTO users (username,password,email,isAdmin) VALUES('admin','admin','admin@email.com',true);
INSERT INTO users (username,password,email,isAdmin) VALUES('user','user','user@email.com',false);