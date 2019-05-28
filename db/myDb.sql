
CREATE TABLE politics (
    id                  serial primary key,
    affiliation         TEXT
);  

CREATE TABLE climate (
    id                  serial primary key,
    climate_type        TEXT
);

CREATE TABLE planet_type (
    id                  serial primary key,
    planet_type         TEXT
);


CREATE TABLE star_system (
    id                  serial PRIMARY key,
    name                text,
    affiliation         text REFERENCES politics(id)
);

CREATE TABLE star (
    id                  serial PRIMARY KEY,
    name                TEXT,
    star_system         int REFERENCES star_system(id),
    spectral_class      text,
    mass                DECIMAL,
    radius              DECIMAL,
    luminosity          DECIMAL
);

CREATE TABLE location (
    id                  serial,
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
    population          int,
);

CREATE TABLE planet (
    id                  serial PRIMARY KEY,
    planet_type         TEXT REFERENCES planet_type(id),
    planet_name         text,
    location            int REFERENCES location(id),
    orbit_distance      BIGINT,
    planet_radius       INT,
    gravity             DECIMAL,
    orbit_period        DECIMAL,
    rotation            DECIMAL,
    climate_type        TEXT REFERENCES climate(id),
    mean_temp           int,
    water_index         DECIMAL,
    resource_value      int,
    habitability        int,
    population          int,
    affiliation_ID      text REFERENCES politics(id)
);

CREATE TABLE fleet(
    id                  serial primary key,
    fleet_name          text,
    commanding_officer  TEXT,
    affiliation_ID      text REFERENCES politics(id),
);

CREATE TABLE ships(
    id                  serial primary key,
    ship_name           text,
    ship_type           text,
    commanding_officer  text,
    fleet               text REFERENCES fleet(id),
    affiliation_ID      text REFERENCES politics(affiliation_ID),
    current_location    int REFERENCES location(id),
    ship_size           int,
    crew_size           int,
    weapons             text,
    parasite_craft      text
);

ALTER TABLE location ADD orbit_planet int REFERENCES planet(id)