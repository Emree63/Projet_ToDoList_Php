<?php

class Admin
{
    private $id;
    private $nom;
    private $prenom;
    private $pseudo;
    private $email;

    public function __construct($id, $nom, $prenom, $pseudo, $email, $motDePasse, $isAdmin){
    	$this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->pseudo = $pseudo;
        $this->email = $email;
    }

    //Nom
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->nom = $id;
    }

    //Nom
    public function getNom(){
		return $this->nom;
	}

    public function setNom($nom){
        $this->nom = $nom;
	}

    //Prenom
	public function getPrenom(){
		return $this->prenom;
	}

    public function setPrenom($prenom){
        $this->prenom = $prenom;
	}
	
    //Pseudo
	public function getPseudo(){
		return $this->pseudo;
	}

    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
	}

    //mail
    public function getMail(){
		return $this->email;
	}

    public function setEmail($email){
        $this->email = $email;
	}

}
?> 