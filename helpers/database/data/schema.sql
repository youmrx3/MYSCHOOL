CREATE DATABASE IF NOT EXISTS mySchool;

USE mySchool;

CREATE TABLE IF NOT EXISTS User (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username TEXT NOT NULL,
    user_password TEXT NOT NULL,
    email TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS School (
    school_id INT PRIMARY KEY AUTO_INCREMENT,
    school_name TEXT NOT NULL,
    school_description TEXT NOT NULL,
    school_image_url TEXT NOT NULL,
    school_video TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS Formation (
    formation_id INT PRIMARY KEY AUTO_INCREMENT,
    formation_name TEXT NOT NULL,
    formation_school_id INT NOT NULL,
    FOREIGN KEY (formation_school_id) REFERENCES School(school_id)
);

CREATE TABLE IF NOT EXISTS FormationApplication (
    formation_application_id INT PRIMARY KEY AUTO_INCREMENT,
    formation_application_user_id INT NOT NULL,
    formation_application_school_id INT NOT NULL,
    FOREIGN KEY (formation_application_user_id) REFERENCES User(user_id),
    FOREIGN KEY (formation_application_school_id) REFERENCES School(school_id)
);

CREATE TABLE IF NOT EXISTS PendingApplications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    objet VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    commentaire TEXT  ,
    numero VARCHAR(20) NOT NULL,
    date TEXT NOT NULL,
    autres VARCHAR(255) ,
    adresse VARCHAR(255) NOT NULL,
    formation_id INT NOT NULL 

    FOREIGN KEY (formation_id) REFERENCES Formation(formation_id)
)
