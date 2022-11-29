<?php

namespace modeles;

class Utilisateur
{
    private string $id;
    private string $nom;
    private string $prenom;
    private string $pseudo;
    private string $email;

    public function __construct(string $id, string $nom, string $prenom, string $pseudo, string $email,string $motDePasse, bool $isAdmin){
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

    public function setId(string $id){
        $this->nom = $id;
    }

    //Nom
    public function getNom(){
		return $this->nom;
	}

    public function setNom(string $nom){
        $this->nom = $nom;
	}

    //Prenom
	public function getPrenom(){
		return $this->prenom;
	}

    public function setPrenom(string $prenom){
        $this->prenom = $prenom;
	}
	
    //Pseudo
	public function getPseudo(){
		return $this->pseudo;
	}

    public function setPseudo(string $pseudo){
        $this->pseudo = $pseudo;
	}

    //mail
    public function getMail(){
		return $this->email;
	}

    public function setEmail(string $email){
        $this->email = $email;
	}

}
?> 
