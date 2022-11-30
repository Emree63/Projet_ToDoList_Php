<?php

namespace modeles;

class Liste
{
	private string $id;
	private string $nom;
	private Date $dateCreation;
	private bool $estValide;
	private array $liste;

	public function __construct(string $id, string $nom, Date $dateCreation, array $liste){
		$this->id = $id;
		$this->nom = $nom;
		$this->description = $description;
		$this->dateCreation = $dateCreation;
		$this->estValide = false;
		$this->liste = $liste;
	}

	//Nom
	public function getNom(){
		return $this->nom;
	}

	//Id
	public function getid(){
		return $this->id;
	}
	
	//DateCreation
	public function getDateCreation(){
		return $this->dateCreation;
	}

	//EstValide
	public function getEstValide(){
		return $this->estValide;
	}

	public function getListe(){
		return $this->liste;
	}


}
