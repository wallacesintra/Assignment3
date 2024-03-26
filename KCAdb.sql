CREATE DATABASE IF NOT EXISTS KCA;

USE KCA;

CREATE TABLE students (
    Reg_no INT PRIMARY KEY,
    surname VARCHAR(255),
    Middle_name VARCHAR(255),
    first_name VARCHAR(255),
    course VARCHAR(255),
    age INT,
    guardian VARCHAR(255),
    Telno VARCHAR(255)
);
