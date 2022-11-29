<?php

namespace modeles;

class Tache
{
	private string $id;
	private string $nom;
	private string $description;
	private Date $dateCreation;
	private bool $estValide;

	public function __construct(string $id, string $nom, string $description, Date $dateCreation){
		$this->id = $id;
		$this->nom = $nom;
		$this->description = $description;
		$this->dateCreation = $dateCreation;
		$this->estValide = false;
	}

	//Nom
	public function getNom(){
		return $this->nom;
	}

	//Description
	public function getDescription(){
		return $this->description;
	}
	
	//DateCreation
	public function getDateCreation(){
		return $this->dateCreation;
	}

	//EstValide
	public function getEstValide(){
		return $this->estValide;
	}


}
