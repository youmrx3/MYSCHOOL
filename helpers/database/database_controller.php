<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];


include_once $rootPath . "/data/school.php";
include_once $rootPath . "/data/user.php";
include_once $rootPath . "/data/database_options.php";
include_once $rootPath . "/data/formation.php";

class DatabaseController
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function approveAdmission($admissionId)
    {
        $query = "SELECT * FROM PendingApplications WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $admissionId);
        $stmt -> execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $application = new PendingApplication(
            $result['id'],
            $result['nom'],
            $result['objet'],
            $result['email'],
            $result['commentaire'],
            $result['numero'],
            $result['date'],
            $result['autres'],
            $result['adresse'],
            $result['school_id']
        );

        $query = "SELECT * FROM User WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $application->email);
        $stmt -> execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $this->applyToFormation($application->school_id, $result['user_id']);


        } else {

            $registerOptions = new RegisterUserOptions(
                $application->email,
                "123",
                $application->name
            );

            $this->registerUser($registerOptions);

            $query = "SELECT * FROM User WHERE email = :email";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':email', $application->email);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->applyToFormation($application->school_id, $result['user_id']);

        }

        $this->deletePendingApplication($application->id);
    }


    public function addSchool(CreateSchoolOptions $options)
    {
        $query = "INSERT INTO School (school_name, school_description, school_image_url, school_video) VALUES (:school_name, :school_description, :school_image_url, :school_video)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':school_name', $options->name);
        $stmt->bindParam(':school_description', $options->description);
        $stmt->bindParam(':school_image_url', $options->imageUrl);
        $stmt->bindParam(':school_video', $options->videoUrl);

        $stmt->execute();
    }

    public function deleteSchool($schoolId)
    {
        $query = "DELETE FROM School WHERE school_id = :school_id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':school_id', $schoolId);

        $stmt->execute();

    }
    public function getSchools(): array
    {
        $query = "SELECT * FROM School";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $schools = array();

        foreach ($result as $row) {
            $school = new School();
            $school->schoolId = $row['school_id'];
            $school->name = $row['school_name'];
            $school->imageUrl = $row['school_image_url'];
            $school->videoUrl = $row['school_video'];
            $school->description = $row['school_description'];

            array_push($schools, $school);
        }
        return $schools;
    }

    public function getSchool(string $schoolId)
    {
        $query = "SELECT * FROM School WHERE school_id = :school_id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':school_id', $schoolId);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($result) {
            $school = new School();
            $school->schoolId = $result['school_id'];
            $school->name = $result['school_name'];
            $school->imageUrl = $result['school_image_url'];
            $school->videoUrl = $result['school_video'];
            $school->description = $result['school_description'];

            return $school;
        }




        return null;
    }

    public function getSchoolFormations(string $schoolId): array
    {
        $query = "SELECT * FROM Formation WHERE formation_school_id = :school_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':school_id', $schoolId);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $formations = array();

        foreach ($result as $row) {
            $formation = new Formation();
            $formation->id = $row['formation_id'];
            $formation->name = $row['formation_name'];


            array_push($formations, $formation);
        }

        return $formations;
    }

    public function registerUser(RegisterUserOptions $user)
    {
        $query = "INSERT INTO User (email, user_password, username,role) VALUES (:email, :password, :name,2)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(':password', $user->password);
        $stmt->bindParam(':name', $user->name);
        $stmt->execute();
    }
    public function loginUser(LoginOptions $options): User|null
    {
        $query = "SELECT * FROM User WHERE email = :email AND user_password = :password";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $options->email);
        $stmt->bindParam(':password', $options->password);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $user = new User(
                $result['user_id'],
                $result['username'],
                $result['email'],
                $result['role']
            );


            return $user;
        }

        return null;
    }


    function applyToFormation(int $schoolId, int $userId)
    {
        $query = "INSERT INTO FormationApplication (formation_application_school_id, formation_application_user_id) VALUES (:school_id, :user_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':school_id', $schoolId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
    }

    function RegisterPendingApplication(RegisterPendingApplicationOptions $options)
    {
        $query = "INSERT INTO PendingApplications (nom ,objet ,email ,commentaire ,
        numero ,date ,autres  ,adresse,school_id )
         VALUES(:nom ,:objet ,:email ,:commentaire,:numero ,:date ,:autres , 'adresse',:schoolId )";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':nom', $options->nom);
        $stmt->bindParam(':objet', $options->objet);
        $stmt->bindParam(':email', $options->email);
        $stmt->bindParam(':commentaire', $options->commentaire);
        $stmt->bindParam(':numero', $options->numero);
        $stmt->bindParam(':date', $options->date);
        $stmt->bindParam(':autres', $options->autres);
        $stmt->bindParam(':schoolId', $options->schoolId);

        $stmt->execute();
    }




    function loadUserFormations(int $userId): array
    {
        $query = "
        SELECT *
        FROM School
        INNER JOIN FormationApplication ON School.school_id = FormationApplication.formation_application_school_id
        WHERE FormationApplication.formation_application_user_id = :user_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $formations = array();

        foreach ($result as $row) {
            $school = new School();
            $school->schoolId = $row['school_id'];
            $school->name = $row['school_name'];
            $school->imageUrl = $row['school_image_url'];
            $school->videoUrl = $row['school_video'];
            $school->description = $row['school_description'];
            array_push($formations, $school);
        }

        return $formations;
    }



    function getPendingApplications(): array
    {
        $query = "SELECT * FROM PendingApplications";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $applications = array();

        foreach ($result as $row) {
            $application = new PendingApplication(
                $row['id'],
                $row['nom'],
                $row['objet'],
                $row['email'],
                $row['commentaire'],
                $row['numero'],
                $row['date'],
                $row['autres'],
                $row['adresse'],
                $row['school_id']
            );

            array_push($applications, $application);
        }

        return $applications;
    }


    function deletePendingApplication($id)
    {
        $query = "DELETE  FROM PendingApplications WHERE id = :id ";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();


    }


}


?>