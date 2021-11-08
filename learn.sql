check table tablename;

repair table tablename;

mysqldump -u [user name] –p [password] [options] [database_name] [tablename] > [dumpfilename.sql]
mysqldump -u root -p password db_name table_name > backup.sql

ou can use “>” to generate the backup and “<” to restore the backup

source c:\myfile.sql  -- restore backup

mysql database_name < file.sql

There are two types of storage engines in MySQL: transactional and non-transactional. 
For MySQL 5.5 and later, the default storage engine is InnoDB. The default storage engine for MySQL prior to version 5.5 was MyISAM

Support for transactions (giving you support for the ACID property).
Row-level locking. ...
Foreign key constraints. ...
InnoDB is more resistant to table corruption than MyISAM.
Support for large buffer pool for both data and indexes. ...
MyISAM is stagnant; all future enhancements will be in InnoDB.

A transaction in MySQL is a sequential group of statements, queries, or operations such as select, insert, update or delete to perform as a one single work unit that can be committed or rolled back. ... Or, all modifications are undone when the transaction is rollback.

CREATE PROCEDURE SelectAllCustomers
AS
SELECT * FROM Customers
GO;

EXEC SelectAllCustomers;


------------------------------------------------------------------------------------------

CREATE DATABASE db_name;

USE db_name;

CREATE TABLE user 
(
    id INTEGER(1000) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE KEY,
    created DATE
);

DESC db_name;

SHOW DATABASES;

INT or INTEGER(size) - between -32,768 to 32767
DEC or DECIMAL(size, point) - max size(65) default(10), max point(30) default(0)
CHAR or CHARACTER(size) - fixed size up to 255
VARCHAR(size) - variable size, greater then 255 will be converted into TEXT
TEXT - max length is 65,535
DATE - (yyyy-mm-dd)
DATETIME - (yyyy-mm-dd hh:mm:ss)
TIMESTAMP - datetime with timezone for frequenty changable time

INSERT INTO tablename (id, name) VALUES(1, 'sumit');
INSERT INTO tablename VALUES (2, 'sumit'), (3, 'sumit');

Operators : =, != or <>, >, <, >=, <=, BETWEEN, LIKE, IN, AND, OR

SELECT * FROM tablename WHERE class = 'I' LIMIT 2, 5;  (from 2th index limit 5)
SELECT * FROM tablename WHERE class IS NULL OR id IS NOT NULL;
SELECT * FROM tablename WHERE class = 'I' AND (hobby = 'cricket' OR id = 5);
SELECT * FROM tablename WHERE id IN (1, 2, 3, 5) AND name NOT IN ('sumit', 'verma');
SELECT * FROM tablename WHERE date BETWEEN 2000/01/01 AND 2010/12/31 AND date NOT BETWEEN 2005/01/01 AND 2005/12/31;
SELECT * FROM tablename WHERE name LIKE '%s%' OR NOT LIKE '_a%';
SELECT * FROM tablename ORDER BY name DESC;
SELECT CONCAT(u.f_name, ' ', u.l_name) AS full_name FROM user AS u;
SELECT DISTINCT name, email FROM user;

ALTER TABLE my_table ADD COLUMN new_name VARCHAR(255) AFTER id, ADD COLUMN old_name VARCHAR(255) LAST;
ALTER TABLE my_table ADD COLUMN id INT(10) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (id); 
ALTER TABLE my_table ADD CONSTRAINT UNIQUE KEY (email); 
ALTER TABLE my_table CHANGE COLUMN old_name new_name VARCHAR(255) NOT NULL;
ALTER TABLE my_table CHANGE COLUMN old_name new_name VARCHAR(255) NOT NULL, CHANGE COLUMN u_id id INT(10);
ALTER TABLE my_table MODIFY email VARCHAR(64);
ALTER TABLE my_table DROP email;
ALTER TABLE my_table AUTO_INCREMENT = 10;

SHOW TABLES;
DROP TABLE tablename;
TRUNCATE TABLE tablename;
RENAME TABLE old_table TO new_table;
DROP DATABASE my_db;
SHOW COLUMNS FROM tablename;
SHOW CREATE DATABASE my_db;
SHOW CREATE TABLE my_table;

UPDATE tablename SET name='hello', email='newemail' WHERE id = 1;
UPDATE user SET result =
    CASE
        WHEN mark >= 300 THEN 'first'
        WHEN mark < 300 AND mark >= 250 THEN 'second'
        WHEN mark < 225 AND mark >= 150 THEN 'third'
        ELSE 'fail'
    END;

DELETE FROM tablename WHERE id = 1;

CREATE TABLE seller LIKE user;
INSERT seller SELECT * FROM user;
CREATE TABLE seller LIKE old.user;
INSERT seller SELECT * FROM old.user;

SELECT MIN(salary) FROM user;
SELECT MAX(salary) FROM user;
SELECT AVG(salary) FROM user;
SELECT SUM(salary) FROM user;
SELECT ROUND(SQRT(salary), 2) FROM user;
SELECT COUNT(name) FROM user; -- null values will not be counted
SELECT COUNT(*) FROM user;
SELECT COUNT(DISTINCT name) FROM user;
SELECT UPPER(name), LOWER(email) FROM user; -- UPPER or UCASE | LOWER or LCASE
SELECT SUBSTRING(name, 1, 3) FROM user; -- MID or SUBSTRING(column, start, end)
SELECT LENGTH(name) FROM user;
SELECT CONCAT(f_name, ' ', l_name) FROM user;
SELECT REVERSE(name) FROM user;
SELECT NOW();

SELECT name, MIN(salary) FROM user GROUP BY name;
SELECT id, COUNT(*) FROM user WHERE id = 100; -- for one record
SELECT id, COUNT(*) FROM user GROUP BY id; -- for all records

SELECT name, MIN(salary) FROM user GROUP BY name HAVING MIN(salary) <= 10000;
SELECT id, COUNT(*) FROM user GROUP BY id HAVING COUNT(*) > 2;

CREATE TABLE image (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    url TEXT NOT NULL,
    user_id INT(10) NOT NULL,
    CONSTRAINT image_user_id FOREIGN KEY (user_id) REFERENCES user (id) 
    ON DELETE CASCADE -- ON DELETE Clause possible values - CASCADE, SET NULL, NO ACTION, RESTRICT
    ON UPDATE NO ACTION
);

SELECT * FROM INFORMATION_SCHEMA.TABLE_CONSTRAINTS WHERE TABLE_NAME = 'image';

ALTER TABLE image DROP FOREIGN KEY image_user_id;
ALTER TABLE image DROP CONSTRAINT image_user_id;

ALTER TABLE image ADD CONSTRAINT image_user_id FOREIGN KEY (user_id) REFERENCES user (id);

CREATE TABLE (
    color VARCHAR(255) NOT NULL,
    size VARCHAR(8) NOT NULL
    PRIMARY KEY (color, size) -- composite key
);

usertable.emailfield -- Fully qualified name
usertable.emailfield -- Sorthand notation

SELECT * FROM user CROSS JOIN images; is equal to SELECT * FROM user, images;
SELECT * FROM user INNER JOIN images ON user.id = images.user_id;
SELECT * FROM user LEFT JOIN images ON user.id = images.user_id;
SELECT * FROM user RIGHT JOIN images ON user.id = images.user_id;
SELECT * FROM user FULL JOIN images ON user.id = images.user_id;

SELECT * IFNULL(email, 'No Email') AS email FROM user;

SELECT name FROM student UNION SELECT name FROM employee; -- UNION is DISTINCT and UNION ALL is not DISTINCT

SELECT name FROM user INTERSECT SELECT name FROM student; -- those name which matches in both tables
SELECT name FROM user EXCEPT SELECT name FROM student; -- those name which matches only in first query