CREATE TABLE note (
    note_ID         int,
    content         varchar(max),
    user_ID         int REFERENCES [user](user_ID),
    talk_ID         int REFERENCES talk(talk_ID),
    conference_ID   int REFERENCES conference(conference_ID),
    session_ID      int REFERENCES c_session(session_ID),

);

CREATE TABLE [user] (
    user_ID         int,
    username        varchar(60),
    pass            varchar(60)
);

CREATE TABLE talk (
    talk_ID         int PRIMARY KEY,
    nam             VARCHAR(70),
    speaker_ID      int REFERENCES speaker(speaker_ID)
);



CREATE TABLE speaker (
    speaker_ID      int PRIMARY KEY, 
    nam             VARCHAR(60)
);

CREATE TABLE conference (
    conference_ID   int PRIMARY KEY,
    MONTH           VARCHAR(15),
    YEAR            int,
);

CREATE TABLE c_session (
    session_ID      int,
    c_session       VARCHAR(30),
);

INSERT INTO c_session VALUES (0, 'Saturday Morning');

INSERT INTO conference VALUES (0, 'April', 2019);

INSERT INTO speaker VALUES (0, "Elder Bednar");

INSERT INTO talk VALUES (0, 'Count your Many Blessings', 0)

INSERT INTO [user] VALUES (0, 'Kairuf', 'ashes');

Insert into note VALUES (0, 'WoW! what a great talk!', 0, 0, 0, 0)