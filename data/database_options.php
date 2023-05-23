<?php


class LoginOptions
{
    public string $email;
    public string $password;
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
    public function __construct($nom, $objet, $email, $commentaire, $numero, $date, $autres) {
        $this->nom = $nom;
        $this->objet = $objet;
        $this->email = $email;
        $this->commentaire = $commentaire;
        $this->numero = $numero;
        $this->date = $date;
        $this->autres = $autres;
    }

}

?>