Table UserRole {
  role_id INT [PK]
  role_name TEXT
}

Table User {
  user_id INT [PK]
  username TEXT
  user_password TEXT
  email TEXT
  role INT
}

Ref: User.role > UserRole.role_id

Table School {
  school_id INT [PK]
  school_name TEXT
  school_description TEXT
  school_image_url TEXT
  school_video TEXT
}

Table Formation {
  formation_id INT [PK]
  formation_name TEXT
  formation_school_id INT
}
 Ref: Formation.formation_school_id > School.school_id

Table FormationApplication {
  formation_application_id INT [PK]
  formation_application_user_id INT
  formation_application_school_id INT
}
  Ref: FormationApplication.formation_application_user_id > User.user_id
  Ref: FormationApplication.formation_application_school_id > School.school_id 

Table PendingApplications {
  id INT [PK]
  nom VARCHAR(255)
  objet VARCHAR(255)
  email VARCHAR(255)
  commentaire TEXT
  numero VARCHAR(20)
  date TEXT
  autres VARCHAR(255)
  adresse VARCHAR(255)
  school_id INT
}

Ref: PendingApplications.school_id > School.school_id