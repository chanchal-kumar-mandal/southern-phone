CREATE TABLE `Characters` (
`id` MediumInt( 9 ) AUTO_INCREMENT NOT NULL, 
`name` VarChar( 191 ) NOT NULL, 
`height` Smallint( 6 ) NOT NULL,
`mass` VarChar( 100 )	NOT NULL,
`hair_color` VarChar( 191 )	NOT NULL,
`skin_color` VarChar( 191 )	NOT NULL,
`eye_color` VarChar( 191 )	NOT NULL,
`birth_year` VarChar( 191 )	NOT NULL,
`gender` VarChar( 191 )	NOT NULL,
`created` Timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
`updated` Timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
`homeworld_name` VarChar( 100 ) NOT NULL, 
`species_name` VarChar( 100 ) NOT NULL,
PRIMARY KEY ( `id` ),
CONSTRAINT `name` UNIQUE( `name` )
);