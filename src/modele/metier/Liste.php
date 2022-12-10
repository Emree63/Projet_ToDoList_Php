<?php

class Liste
{
	private $id;
	private $nom;
	private $description;
	private $dateCreation;
	private $estPublic;
	private $idUtilisateur;

	public function __construct($id, $nom, $description, $dateCreation, $estPublic, $idUtilisateur){
		$this->id = $id;
		$this->nom = $nom;
		$this->description = $description;
		$this->dateCreation = $dateCreation;
		$this->estPublic = $estPublic;
		$this->idUtilisateur = $idUtilisateur;
	}
	
	//Id
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id=$id;
	}

	//Nom
	public function getNom(){
		return $this->nom;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setNom($nom){
		$this->nom=$nom;
	}

	//DateCreation
	public function getDateCreation(){
		return $this->dateCreation;
	}

	public function setDateCreation($dateCreation){
		$this->dateCreation = $dateCreation;
	}

	//EstPublic
	public function getEstPublic(){
		return $this->estPublic;
	}

	public function setEstPublic($estPublic){
		$this->estPublic = $estPublic;
	}

	//idUtilisateur
	public function getIdUtilisateur(){
		return $this->idUtilisateur;
	}

	public function setIdUtilisateur($idUtilisateur){
		$this->idUtilisateur = $idUtilisateur;	
	}

}
