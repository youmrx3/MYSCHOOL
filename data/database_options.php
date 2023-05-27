<?php


class LoginOptions
{
    public string $email;
    public string $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;

    }
}

class RegisterUserOptions
{
    public string $email;
    public string $password;
    public string $name;
    public int $schoolId;
}


class RegisterPendingApplicationOptions
{
    public $nom;
    public $objet;
    public $email;
    public $commentaire;
    public $numero;
    public $date;
    public $autres;

    public $formationId;

    public function __construct($nom, $objet, $email, $commentaire, $numero, $date, $autres, $formationId) {
        $this->nom = $nom;
        $this->objet = $objet;
        $this->email = $email;
        $this->commentaire = $commentaire;
        $this->numero = $numero;
        $this->date = $date;
        $this->autres = $autres;
        $this ->  $formationId =  $formationId;
    }

}


class CreateSchoolOptions {
    public string $name;
    public string $description;

    public string $imageUrl;

    public string $videoUrl;


    public function __construct(string $name, string $description, string $imageUrl ,string $videoUrl) {
        $this->name = $name;
        $this->description = $description;
        $this->imageUrl = $imageUrl;
        $this->videoUrl = $videoUrl;
    }
}

?>