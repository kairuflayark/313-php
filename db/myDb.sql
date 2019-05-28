CREATE TABLE star_system (
    star_system_ID      INT PRIMARY key,
    star_ID             INTEGER REFERENCES star(star_ID),
    affiliation_ID      text REFERENCES politics(affiliation_ID),
);

CREATE TABLE star (
    star_ID             INT PRIMARY KEY,
    star_name           TEXT,
    spectral_class      text,
    mass                DECIMAL,
    radius              DECIMAL,
    luminosity          DECIMAL,
    planet_id           INTEGER,
);

CREATE TABLE asteroid_belt (
    belt_id             int PRIMARY key,
    orbit_distance      BIGINT,
    belt_width          int,
    resource_value      int,
    population          int,
);

CREATE TABLE planet (
    planet_id           INT PRIMARY KEY,
    planet_type         TEXT REFERENCES planet_type(planet_type_ID),
    planet_name         text,
    orbit_distance      BIGINT,
    planet_radius       INT,
    gravity             DECIMAL,
    orbit_period        DECIMAL,
    rotation            DECIMAL,
    climate_type        TEXT REFERENCES climate(climate_type),
    mean_temp           int,
    water_index         DECIMAL,
    resource_value      int,
    habitability        int,
    population          int,
    affiliation_ID      text REFERENCES politics(affiliation_ID),
    moon_ID             int REFERENCES moons(moon_ID)
);

CREATE TABLE moons (
    planet_type         TEXT REFERENCES planet_type(planet_type_ID),
    planet_name         text,
    orbit_distance      BIGINT,
    planet_radius       INT,
    gravity             DECIMAL,
    orbit_period        DECIMAL,
    rotation            DECIMAL,
    climate_type        TEXT REFERENCES climate(climate_type),
    mean_temp           int,
    water_index         DECIMAL,
    resource_value      int,
    habitability        int,
    population          int,
    affiliation_ID      text REFERENCES politics(affiliation_ID),
);

CREATE TABLE fleet(
    fleet_ID            int primary key,
    fleet_name          text,
    commanding_officer  TEXT,
    affiliation_ID      text REFERENCES politics(affiliation_ID),
    ship_ID             int REFERENCES ships(ship_ID),
    current_location    int REFERENCES planet(planet_id)
);

CREATE TABLE ships(
    ship_ID             int primary key,
    ship_name           text,
    ship_type           text,
    commanding_officer  text,
    ship_size           int,
    weapons             text,
    crew_size           int,
    affiliation_ID      text REFERENCES politics(affiliation_ID)
);

CREATE TABLE politics (
    affiliation_ID      TEXT PRIMARY KEY,
);  

CREATE TABLE climate (
    climate_type        TEXT primary key,
);

CREATE TABLE planet_type (
    planet_type_ID      TEXT PRIMARY KEY,
);