CREATE TABLE `CharacterUpdates` (
`id` MediumInt( 9 ) AUTO_INCREMENT NOT NULL, 
`name` VarChar( 191 ) NOT NULL, 
`height` Smallint( 6 ) NOT NULL,
`mass` VarChar( 100 )	NOT NULL,
`hair_color` VarChar( 191 )	NOT NULL,
`skin_color` VarChar( 191 )	NOT NULL,
`eye_color` VarChar( 191 )	NOT NULL,
`birth_year` VarChar( 191 )	NOT NULL,
`gender` VarChar( 191 )	NOT NULL,
`created` Timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
`homeworld_name` VarChar( 100 ) NOT NULL, 
`species_name` VarChar( 100 ) NOT NULL,
PRIMARY KEY ( `id` ),
CONSTRAINT `name` UNIQUE( `name` )
);


INSERT INTO
`CharacterUpdates`(`id`,`name`,`height`,`mass`,`hair_color`,`skin_color`,`eye_color`,`birth_year`,`gender`,`created`,`homeworld_name`,`species_name`) 
VALUES ( '2', 'C-3PO', '167', '75', 'n/a', 'gold', 'yellow', '112BBY', 'female', '2019-01-02 13:29:10', 'Pluto', 'Kangaroo' );


INSERT INTO
`CharacterUpdates`(`id`,`name`,`height`,`mass`,`hair_color`,`skin_color`,`eye_color`,`birth_year`,`gender`,`created`,`homeworld_name`,`species_name`) 
VALUES ( '3', 'R2-D2', '96', '32', 'n/a', 'white, blue', 'red', '33BBY', 'female', '2019-01-02 13:29:10', 'Venus', 'Chimpanzee' );


INSERT INTO
`CharacterUpdates`(`id`,`name`,`height`,`mass`,`hair_color`,`skin_color`,`eye_color`,`birth_year`,`gender`,`created`,`homeworld_name`,`species_name`) 
VALUES ( '13', 'Chewbacca', '228', 'testing!', 'brown', 'unknown', 'blue', '200BBY', 'male', '2019-01-02 13:29:40', 'Mars', 'Wombat' );


INSERT INTO
`CharacterUpdates`(`id`,`name`,`height`,`mass`,`hair_color`,`skin_color`,`eye_color`,`birth_year`,`gender`,`created`,`homeworld_name`,`species_name`) 
VALUES ( '19', 'Yoda', '66', '17', 'white', 'green', 'brown', '896BBY', 'male', '2019-01-02 13:29:40', 'Saturn', 'Elephant' );