<?php

class Tache
{
	private $id;
	private $nom;
	private $description;
	private $dateCreation;
	private $estValide;
	private $idListe;

	public function __construct($id, $nom, $description,$dateCreation, $estValide,$idListe){
		$this->id = $id;
		$this->nom = $nom;
		$this->description = $description;
		$this->dateCreation = $dateCreation;
		$this->estValide = $estValide;
		$this->idListe = $idListe;	
	}

	//Id
	public function getid(){
		return $this->id;
	}

	public function setId($id){
		$this->id=$id;
	}

	//Nom
	public function getNom(){
		return $this->nom;
	}

	public function setNom($nom){
		$this->nom=$nom;
	}

	//Description
	public function getDescription(){
		return $this->description;
	}
	
	public function setDescription($description){
		$this->description=$description;
	}

	//DateCreation
	public function getDateCreation(){
		return $this->dateCreation;
	}

	public function setDateCreation($dateCreation){
		$this->dateCreation = $dateCreation;
	}

	//EstValide
	public function getEstValide(){
		return $this->estValide;
	}

	public function setEstValide($estValide){
		$this->estValide = $estValide;
	}

	//idList
	public function getIdListe(){
		return $this->estValide;
	}

	public function setIdListe($idListe){
		$this->idListe = $idListe;	
	}

}
