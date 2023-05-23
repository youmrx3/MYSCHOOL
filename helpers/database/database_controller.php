<?php

include_once "data/school.php";
include_once "data/user.php";
include_once "data/database_options.php";
include_once "data/formation.php";

class DatabaseController
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
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

    public function getSchool(String $schoolId)
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

    public function getSchoolFormations(String $schoolId): array
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
        $query = "INSERT INTO User (email, password, name, school_id) VALUES (:email, :password, :name, :school_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(':password', $user->password);
        $stmt->bindParam(':name', $user->name);
        $stmt->bindParam(':school_id', $user->schoolId);
        $stmt->execute();
    }
    public function loginUser(LoginOptions $options): User
    {
        $query = "SELECT * FROM User WHERE email = :email AND password = :password";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $options->email);
        $stmt->bindParam(':password', $options->password);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $user = new User();
            $user->id = $result['id'];
            $user->name = $result['name'];
            $user->email = $result['email'];
            return $user;
        } else {
            throw new Exception("Invalid login credentials.");
        }
    }


    function applyToFormation(int $formationId, int $userId)
    {
        $query = "INSERT INTO FormationApplication (formation_id, user_id) VALUES (:formation_id, :user_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':formation_id', $formationId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
    }




    function loadUserFormations(int $userId): array
    {
        $query = "SELECT formation_id FROM FormationApplication WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $userId);
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



}


?>