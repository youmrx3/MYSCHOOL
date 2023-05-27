<?php


class Formation
{
    public int $id;
    public string $name;


}

class PendingApplication
{
    public $id;
    public $nom;
    public $objet;
    public $email;
    public $commentaire;
    public $numero;
    public $date;
    public $autres;
    public $adresse;
    public $school_id;

    public function __construct(
        $id,
        $nom,
        $objet,
        $email,
        $commentaire,
        $numero,
        $date,
        $autres,
        $adresse,
        $school_id
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->objet = $objet;
        $this->email = $email;
        $this->commentaire = $commentaire;
        $this->numero = $numero;
        $this->date = $date;
        $this->autres = $autres;
        $this->adresse = $adresse;
        $this->school_id = $school_id;
    }
}

?>