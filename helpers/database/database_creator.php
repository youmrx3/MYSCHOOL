<?php


class DatabaseCreator
{

    private $servername = "localhost";
    private $username = "idir";
    private $password = "idir";
    private $dbname = "mySchool";


    public function connectToDatabase(): PDO
    {


        try {
            $url = "mysql:host=$this->servername";
            $conn = new PDO($url, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = :dbname";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':dbname', $dbname);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result == null) {
                $this->createSchema($conn);
            }

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }


        return $conn;
    }

    private function createSchema($conn)
    {
        $rootPath= $_SERVER['DOCUMENT_ROOT'] ;

        try{
        $sqlFile = $rootPath."/helpers/database/data/schema.sql";

        $sql = file_get_contents($sqlFile);
        $conn->exec($sql);

        $sqlFile = $rootPath."/helpers/database/data/schools.sql";
        $sql = file_get_contents($sqlFile);
        $conn->exec($sql);

        $sqlFile = $rootPath."/helpers/database/data/user.sql";
        $sql = file_get_contents($sqlFile);
        $conn->exec($sql);
        }
        catch(Exception $e){
            // echo "Error creating schema: " . $e->getMessage();
        }
    }

}
?>