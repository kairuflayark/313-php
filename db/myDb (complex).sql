
CREATE TABLE politics (
    affiliation_id      serial primary key,
    affiliation         TEXT
);  

CREATE TABLE climate (
    climate_id          serial primary key,
    climate             TEXT
);

CREATE TABLE planet_type (
    planet_type_id      serial primary key,
    planet_type         TEXT
);


CREATE TABLE star_system (
    system_id                  serial PRIMARY key,
    system_name                text,
    affiliation_id             int REFERENCES politics (affiliation_id)
);

CREATE TABLE location (
    location_id         serial PRIMARY KEY,
    system_id           int REFERENCES star_system(system_id)
);

CREATE TABLE star (
    star_id             serial PRIMARY KEY,
    star_name           TEXT,
    location_id         int REFERENCES location(location_id),
    spectral_class      text,
    mass                DECIMAL,
    radius              DECIMAL,
    luminosity          DECIMAL
);



CREATE TABLE asteroid_belt (
    belt_id             serial PRIMARY key,
    belt_name           TEXT,
    location_id         int REFERENCES location(location_id),
    orbit_distance      BIGINT,
    belt_width          int,
    resource_value      int,
    population          int
);

CREATE TABLE planet (
    planet_id           serial PRIMARY KEY,
    planet_name         text,
    planet_type_id      int REFERENCES planet_type(planet_type_id),
    location_id         serial REFERENCES location (location_id),
    orbit_distance      BIGINT,
    planet_radius       INT,
    gravity             DECIMAL,
    orbit_period        DECIMAL,
    rotation            DECIMAL,
    climate_id          int REFERENCES climate(climate_id),
    resource_value      int,
    habitability        int,
    population          bigint,
    affiliation_id      int REFERENCES politics(affiliation_id)
);

CREATE TABLE fleet(
    fleet_id            serial primary key,
    fleet_name          text,
    commanding_officer  TEXT,
    affiliation_id      int REFERENCES politics(affiliation_id)
);

CREATE TABLE ship_type(
    ship_type_id        serial primary key,
    type                text
);

CREATE TABLE ships(
    ship_id             serial primary key,
    ship_name           text,
    ship_type_id        int REFERENCES ship_type(ship_type_id),
    commanding_officer  text,
    fleet_id            int REFERENCES fleet(fleet_id),
    affiliation_id      int REFERENCES politics(affiliation_id),
    location_id         int REFERENCES location(location_id),
    ship_size           int,
    crew_size           int,
    weapons             text,
    parasite_craft      text
);

ALTER TABLE location ADD star_id   int REFERENCES star(star_id);
ALTER TABLE location ADD planet_id int REFERENCES planet(planet_id);

INSERT into politics (affiliation) VALUES ('Cordwan');
insert into planet_type (planet_type) values ('Gas Giant');
INSERT into star_system (system_name, affiliation_id) VALUES ('Derri', 1);
insert into location (system_id) values (1);
INSERT into star (star_name, location_id , spectral_class, mass, radius, luminosity) VALUES ('Derri Prime', 1, 'G8V', 1.039, 1.031, 1.1417);
insert into location (system_id, star_id) values (1,1);
insert into planet (planet_name, planet_type_id, location_id, orbit_distance, planet_radius, gravity, orbit_period, rotation) values ('Rella', 1, 2, 145911239, 173455, 4.65, 345, 390);
insert into location (system_id, star_id, planet_id) values (1, 1, 1);
insert into planet_type (planet_type) values ('Ocean');
insert into climate (climate) values ('normal');
insert into planet (planet_name, planet_type_id, location_id, orbit_distance, planet_radius, gravity, orbit_period, rotation, climate_id, resource_value, habitability, population, affiliation_id ) values ('Cordwan', 2, 3, 12345900, 6507, .95, 84.66, 36.2, 1, 0, 1, 3153932000, 1);
insert into planet_type (planet_type) values ('Rock');
insert into politics (affiliation) values ('Cordwan Orbital Authority');
insert into location (system_id, star_id, planet_id) values (1, 1, 2);
insert into planet (planet_name, planet_type_id, location_id, orbit_distance, planet_radius, gravity, orbit_period, rotation, climate_id, resource_value, habitability, population, affiliation_id ) values ('Norman Moon''s', 3, 4, 19768, 745, .3, .18, 0, 1, 0, 0, 763500, 2);



insert into fleet (fleet_name, commanding_officer, affiliation_id) values ('COA First Fleet', 'Admiral Jason Rongabar', 2);
insert into ship_type (type) values ('subCapital, Battlecruiser');
insert into ships (ship_name, ship_type_id, commanding_officer, fleet_id, affiliation_id, location_id, ship_size, crew_size) values ('COAS Methorn Mountains', 1, 'Captain Alfred Savani', 1, 2, 4, 19000, 16000);
insert into ships (ship_name, ship_type_id, commanding_officer, fleet_id, affiliation_id, location_id, ship_size, crew_size) values ('COAS Merskis Falls', 1, 'Captain Tule Sleet', 1, 2, 3, 17500, 13000);


SELECT * from ships where fleet=1;

select id from fleet;

SELECT affiliation from politics where id=2;

drop table fleet;

select fleetid, fleet.fleet_name from fleet left join politics on politics.id = fleet.affiliation;

select * from ships;

select s.ship_name, t.type, f.fleet_name, a.affiliation, ss.system_name, star.star_name, p.planet_name from ships s
left join ship_type t on s.ship_type_id=t.ship_type_id
left join location l on s.location_id=l.location_id
left join star_system ss on l.system_id=ss.system_id
left join star on l.star_id=star.star_id
left join planet p on l.planet_id=p.planet_id
left join fleet f on s.fleet_id=f.fleet_id
left join politics a on s.affiliation_id = a.affiliation_id;

select * from planet;