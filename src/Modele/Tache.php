<?php

namespace modeles;

class Tache
{

	private string $nom;
	private string $description;
	private Date $dateCreation;
	private bool $estValide;
	private Utilisateur $createur;
	private int $id;

	public function __construct(String $nom, string $description, Date $dateCreation,Utilisateur $createur, int $id){
		$this->nom = $nom;
		$this->description = $description;
		$this->dateCreation = $dateCreation;
		$this->estValide = false;
		$this->createur = $createur;
	}

