/* --------------- Creating Database---------- */

/* --------------- Use Database---------- */
USE ipl;

/* --------------- Create Team Table---------- */

CREATE TABLE team(team_id INT(20) NOT NULL AUTO_INCREMENT,team_name VARCHAR(20) NOT NULL, team_captain VARCHAR(20) NOT NULL,
                  PRIMARY KEY(team_id));

/* --------------- Create Venue Table---------- */

CREATE TABLE venue(venue_id int(20) NOT NULL AUTO_INCREMENT,venue_name VARCHAR(20) NOT NULL, venue_address VARCHAR(20) NOT NULL,
                   venue_city VARCHAR(20) NOT NULL, PRIMARY KEY(venue_id));

/* --------------- Create Match Table---------- */

CREATE TABLE match_details(match_id int(20) NOT NULL AUTO_INCREMENT, match_date DATE, venue_name VARCHAR(20) NOT NULL, first_team VARCHAR(20) NOT NULL,
                   second_team VARCHAR(20) NOT NULL,first_team_captain VARCHAR(20) NOT NULL, second_team_captain VARCHAR(20) NOT NULL,
                   toss_won VARCHAR(20) NOT NULL, match_won VARCHAR(20) NOT NULL,PRIMARY KEY(match_id));

/* --------------- Describe Team Table---------- */

DESC team;

/* --------------- Describe Venue Table---------- */

DESC venue;

/* --------------- Describe Match Table---------- */

DESC match_details;

/* --------------- Insert Data into Team  Table---------- */

INSERT INTO  team(team_name, team_captain) VALUES('Delhi','Sewagh');

/* --------------- Insert Data into venue  Table---------- */

INSERT INTO  venue(venue_name, venue_address, venue_city) VALUES('Eden','Kolkata', 'Kolkata');

/* --------------- Insert Data into venue  Table---------- */

INSERT INTO  match_details(match_date, venue_name, first_team, second_team, first_team_captain, second_team_captain, toss_won, match_won) 
                            VALUES('2020-01-16','Kolkata', 'Kolkata', 'delhi', 'ganguly', 'gambhir', 'delhi', 'kolkata');

