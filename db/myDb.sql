
CREATE TABLE politics (
    id                  serial primary key,
    affiliation         TEXT
);  

CREATE TABLE climate (
    id                  serial primary key,
    climate             TEXT
);

CREATE TABLE planet_type (
    id                  serial primary key,
    planet_type         TEXT
);


CREATE TABLE star_system (
    id                  serial PRIMARY key,
    name                text,
    affiliation         int REFERENCES politics (id)
);

CREATE TABLE star (
    id                  serial PRIMARY KEY,
    name                TEXT,
    star_system         int REFERENCES star_system (id),
    spectral_class      text,
    mass                DECIMAL,
    radius              DECIMAL,
    luminosity          DECIMAL
);

CREATE TABLE location (
    id                  serial PRIMARY KEY,
    star_system         int REFERENCES star_system(id),
    orbit_star          int REFERENCES star(id)
);

CREATE TABLE asteroid_belt (
    id                  serial PRIMARY key,
    name                TEXT,
    location            int REFERENCES location(id),
    orbit_distance      BIGINT,
    belt_width          int,
    resource_value      int,
    population          int
);

CREATE TABLE planet (
    id                  serial PRIMARY KEY,
    name                text,
    planet_type         int REFERENCES planet_type(id),
    location            serial REFERENCES location (id),
    orbit_distance      BIGINT,
    planet_radius       INT,
    gravity             DECIMAL,
    orbit_period        DECIMAL,
    rotation            DECIMAL,
    climate             int REFERENCES climate(id),
    resource_value      int,
    habitability        int,
    population          bigint,
    affiliation         int REFERENCES politics(id)
);

CREATE TABLE fleet(
    id                  serial primary key,
    fleet_name          text,
    commanding_officer  TEXT,
    affiliation         int REFERENCES politics(id)
);

CREATE TABLE ship_type(
    id                  serial primary key,
    type                text
);

CREATE TABLE ships(
    id                  serial primary key,
    name                text,
    type                int REFERENCES ship_type(id),
    commanding_officer  text,
    fleet               int REFERENCES fleet(id),
    affiliation         int REFERENCES politics(id),
    current_location    int REFERENCES location(id),
    ship_size           int,
    crew_size           int,
    weapons             text,
    parasite_craft      text
);

ALTER TABLE location ADD orbit_planet int REFERENCES planet(id);

INSERT into politics (affiliation) VALUES ('Cordwan');
insert into planet_type (planet_type) values ('Gas Giant');
INSERT into star_system (name, affiliation) VALUES ('Derri', 1);
INSERT into star (name, star_system, spectral_class, mass, radius, luminosity) VALUES ('Derri Prime', 1, 'G8V', 1.039, 1.031, 1.1417);
insert into location (star_system, orbit_star) values (1,1);
insert into planet (name, planet_type, location, orbit_distance, planet_radius, gravity, orbit_period, rotation) values ('Rella', 1, 1, 145911239, 173455, 4.65, 345, 390);
insert into location (star_system, orbit_star, orbit_planet) values (1, 1, 1);
insert into planet_type (planet_type) values ('Ocean');
insert into climate (climate) values ('normal');
insert into planet (name, planet_type, location, orbit_distance, planet_radius, gravity, orbit_period, rotation, climate, resource_value, habitability, population, affiliation ) values ('Cordwan', 2, 2, 12345900, 6507, .95, 84.66, 36.2, 1, 0, 1, 3153932000, 1);
insert into planet_type (planet_type) values ('Rock');
insert into politics (affiliation) values ('Cordwan Orbital Authority');
insert into location (star_system, orbit_star, orbit_planet) values (1, 1, 2);
insert into planet (name, planet_type, location, orbit_distance, planet_radius, gravity, orbit_period, rotation, resource_value, habitability, population, affiliation) values ('Norman Moon''s', 3, 3, 19768, 745, .3, .18, 0, 0, 0, 763500, 2);



insert into fleet (fleet_name, commanding_officer, affiliation) values ('COA First Fleet', 'Admiral Jason Rongabar', 2);
insert into ship_type (type) values ('subCapital, Battlecruiser');
insert into ships (name, type, commanding_officer, fleet, affiliation, current_location, ship_size, crew_size) values ('COAS Methorn Mountains', 1, 'Captain Alfred Savani', 1, 2, 3, 19000, 16000);
insert into ships (name, type, commanding_officer, fleet, affiliation, current_location, ship_size, crew_size) values ('COAS Merskis Falls', 1, 'Captain Tule Sleet', 1, 2, 3, 17500, 13000);


SELECT * from ships where fleet=1;

select id from fleet;


drop table fleet;