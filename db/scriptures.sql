CREATE TABLE scriptures (
    scripture_id        int PRIMARY KEY,
    book                VARCHAR(40),
    chapter             int,
    verse               int,
    scripture_content   TEXT
);

INSERT INTO scriptures (scripture_id, book, chapter, verse, scripture_content) VALUES (1, 'John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');

INSERT INTO scriptures (scripture_id, book, chapter, verse, scripture_content) VALUES (2, 'Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');

INSERT INTO scriptures (scripture_id, book, chapter, verse, scripture_content) VALUES (3, 'Doctrine and Covenants', 93, 28, 'Man was also in the beginning with God. Intelligence, or the light of truth, was not created or made, neither indeed can be.');

INSERT INTO scriptures (scripture_id, book, chapter, verse, scripture_content) VALUES (4, 'Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');






