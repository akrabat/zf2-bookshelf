CREATE TABLE book (
  id int(11) NOT NULL auto_increment,
  author varchar(100) NOT NULL,
  title varchar(100) NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO book (author, title)
    VALUES  ('Yann Martel',  'Life Of Pi');
INSERT INTO book (author, title)
    VALUES  ('Chris Ewan',  'Safe House');
INSERT INTO book (author, title)
    VALUES  ('Hilary Boyd',  'Thursdays in the Park');
INSERT INTO book (author, title)
    VALUES  ('David Mark',  'Dark Winter');
INSERT INTO book (author, title)
    VALUES  ('Amanda Prowse',  'What Have I Done?');
INSERT INTO book (author, title)
    VALUES  ('Nick Alexander',  'The Half-Life Of Hannah');
