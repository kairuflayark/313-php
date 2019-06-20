
CREATE TABLE politics (
    affiliation_id      serial primary key,
    affiliation         TEXT
);  

CREATE TABLE planet_type (
    planet_type_id      serial primary key,
    planet_type         TEXT
);

CREATE TABLE star_system (
    system_id           serial PRIMARY key,
    system_name         text,
    affiliation_id      int REFERENCES politics (affiliation_id)
);

CREATE TABLE location (
    location_id         serial PRIMARY KEY,
    system_id           int REFERENCES star_system(system_id)
);

CREATE TABLE star (
    star_id             serial PRIMARY KEY,
    star_name           TEXT,
    location_id         int REFERENCES location(location_id)
);

CREATE TABLE planet (
    planet_id           serial PRIMARY KEY,
    planet_name         text,
    planet_type_id      int REFERENCES planet_type(planet_type_id),
    location_id         serial REFERENCES location (location_id),
    orbit_distance      BIGINT,
    gravity             DECIMAL,
    resource_value      int,
    habitability        int,
    population          bigint,
    affiliation_id      int REFERENCES politics(affiliation_id),
    is_moon             bool
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

INSERT into politics (affiliation) VALUES ('Cordwan'), ('Cordwan Orbital Authority'), ('House Ragala'), ('House W''kine'),  ('House Jatta'), ('House Dexa'),  ('House Vega'), ('House Mutri'), ('House Starden'), ('House Taysee'), ('House Marine');
insert into planet_type (planet_type) values ('Gas Giant'), ('Ocean'), ('Rock'), ('Garden'), ('Ice');


INSERT into star_system (system_name, affiliation_id) VALUES ('Derri', 1);
insert into location (system_id) values (1);
INSERT into star (star_name, location_id) VALUES ('Serska', 1);
insert into location (system_id, star_id) values (1,1);
insert into planet (planet_name, planet_type_id, location_id, orbit_distance, gravity, is_moon) values ('Rella', 1, 2, 145911239, 4.65, false);
insert into location (system_id, star_id, planet_id) values (1, 1, 1);
insert into planet (planet_name, planet_type_id, location_id, orbit_distance, gravity, resource_value, habitability, population, affiliation_id, is_moon ) values ('Cordwan', 2, 3, 12345900, .95, 3, 5, 3153932000, 1, true);
insert into location (system_id, star_id, planet_id) values (1, 1, 2);
insert into planet (planet_name, planet_type_id, location_id, orbit_distance, gravity, resource_value, habitability, population, affiliation_id, is_moon) values ('Norman''s Moon', 3, 4, 19768,  .3, 0, 0, 763500, 2, true);




Insert into planet (planet_name, planet_type_id, location_id, orbit_distance, gravity, resource_value, habitability, is_moon) values ('Derri I', 3, 2, 36130669, .31, -1, -1, false);
Insert into planet (planet_name, planet_type_id, location_id, orbit_distance, gravity, is_moon) values ('Aso', 1, 2, 370188398, 5.89, false);
INSERT INTO location (system_id, star_id, planet_id) values (1, 1, 5);
Insert into planet (planet_name, planet_type_id, location_id, orbit_distance, gravity, resource_value, habitability, population, affiliation_id, is_moon) values ('Rella.7', 4, 3, 445432, .96, 4, 4, 130468130, 3, true);
Insert into planet (planet_name, planet_type_id, location_id, orbit_distance, gravity, resource_value, habitability, population, affiliation_id, is_moon) values ('Rella.10', 5, 3, 771181, .33, 0, 0, 74047800, 4, true);
Insert into planet (planet_name, planet_type_id, location_id, orbit_distance, population, affiliation_id, is_moon) values ('Cordwan Intersystem Exchange', 3, 3, 18849212, 453500, 1, true);
Insert into planet (planet_name, planet_type_id, location_id, orbit_distance, gravity, resource_value, habitability, population, affiliation_id, is_moon) values ('Aso.7', 4, 5, 459705, .81, 2, 2, 105584500, 6, true);

insert into fleet (fleet_name, commanding_officer, affiliation_id) values ('COA First Fleet', 'Admiral Jason Rongabar', 2), ('Ragala First Fleet', 'Charles Ragala', 3);

insert into ship_type (type) values ('subCapital, Battlecruiser'), ('Capital, Battlecruiser'), ('Capital, Dreadnaught');
insert into ships (ship_name, ship_type_id, commanding_officer, fleet_id, affiliation_id, location_id, ship_size, crew_size) values ('COAS Methorn Mountains', 1, 'Captain Alfred Savani', 1, 2, 4, 19000, 16000);
insert into ships (ship_name, ship_type_id, commanding_officer, fleet_id, affiliation_id, location_id, ship_size, crew_size) values ('COAS Merskis Falls', 1, 'Captain Tule Sleet', 1, 2, 3, 17500, 13000);

INSERT INTO location (system_id, star_id, planet_id) values (1,1,6);

INSERT INTO ships (ship_name, ship_type_id, commanding_officer, fleet_id, affiliation_id, location_id, ship_size, crew_size) values ('Ragala''s Victory', 3, 'Captain Ri W''kine', 2, 3, 6, 30000, 50000);


select l.location_id, ss.system_name, s.star_name, p.planet_name from location l 
left join star_system ss on l.system_id = ss.system_id
left join star s on l.star_id = s.star_id
left join planet p on l.planet_id = p.planet_id;

select * from planet;

select * from location;

SELECT * from ships where fleet=1;

select id from fleet;

SELECT affiliation from politics where id=2;

drop table fleet;

select * from fleet left join politics on politics.affiliation_id = fleet.affiliation_id;

select * from ships;

select s.ship_name, t.type, f.fleet_name, a.affiliation, l.location_id, ss.system_name, star.star_name, p.planet_name, s.ship_size, s.crew_size from ships s
left join ship_type t on s.ship_type_id=t.ship_type_id
left join location l on s.location_id=l.location_id
left join star_system ss on l.system_id=ss.system_id
left join star on l.star_id=star.star_id
left join planet p on l.planet_id=p.planet_id
left join fleet f on s.fleet_id=f.fleet_id
left join politics a on s.affiliation_id = a.affiliation_id
where s.fleet_id=1;

UPDATE ships SET location_id = 4  where ship_id = 2;

select * from planet;

INSERT INTO ships (ship_name, ship_type_id, commanding_officer, fleet_id, affiliation_id, location_id, ship_size, ) VALUES (Menthorn Mountains, 2, Captain Slonger, 1, 1, 3, 15000, 14000)

DROP SCHEMA public CASCADE;
CREATE SCHEMA public;