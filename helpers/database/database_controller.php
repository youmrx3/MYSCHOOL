<?php


class DatabaseController
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }



    public function getSchools(): array
    {
        $query = "SELECT * FROM school";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $schools = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $schools;
    }

    public function getSchoolFormations(int $schoolId): array
    {
        $query = "SELECT * FROM formation WHERE school_id = :school_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':school_id', $schoolId);
        $stmt->execute();

        $formations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $formations;
    }

    public function registerUser(RegisterUserOptions $user)
    {
        $query = "INSERT INTO user (email, password, name, school_id) VALUES (:email, :password, :name, :school_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(':password', $user->password);
        $stmt->bindParam(':name', $user->name);
        $stmt->bindParam(':school_id', $user->schoolId);
        $stmt->execute();
    }
    public function loginUser(LoginOptions $options): User
    {
        $query = "SELECT * FROM user WHERE email = :email AND password = :password";
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
        $query = "INSERT INTO formation_user (formation_id, user_id) VALUES (:formation_id, :user_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':formation_id', $formationId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
    }


    function loadUserFormations(int $userId): array
    {
        $query = "SELECT formation_id FROM formation_user WHERE user_id = :user_id";
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