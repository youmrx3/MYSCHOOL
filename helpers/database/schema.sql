

CREATE TABLE User (
    user_id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    password TEXT NOT NULL,
    email TEXT NOT NULL,
);


CREATE TABLE School {
    school_id INTEGER PRIMARY KEY AUTOINCREMENT,
    school_name TEXT NOT NULL,
    school_description TEXT NOT NULL,
    school_image_url TEXT NOT NULL,
    school_video TEXT NOT NULL,
}

CREATE TABLE Formation {
    formation_id INTEGER PRIMARY KEY AUTOINCREMENT,
    formation_name TEXT NOT NULL,
    FOREIGN KEY (formation_school_id) REFERENCES School(school_id)
}

CREATE TABLE FormationApplication{
    formation_application_id INTEGER PRIMARY KEY AUTOINCREMENT,
    formation_application_user_id INTEGER NOT NULL,
    formation_application_formation_id INTEGER NOT NULL,
    FOREIGN KEY (formation_application_user_id) REFERENCES User(user_id),
    FOREIGN KEY (formation_application_formation_id) REFERENCES Formation(formation_id)
}