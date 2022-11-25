<?php

namespace modeles;

class Utilisateur
{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $pseudo
    private string $email;
    private string $motDePasse;
    private bool $isAdmin;

    public function __construct(string $nom, string $prenom, string $pseudo, string $email,string $motDePasse, bool $isAdmin, int $id){
    	$this->nom = $nom;
        $this->prenom = $prenom;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
        $this->isAdmin = $isAdmin;
        $this->id = id;
    }
}
?> 
