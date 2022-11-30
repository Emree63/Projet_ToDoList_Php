<?php

namespace modeles;

class Liste
{
	private $id;
	private $nom;
	private $dateCreation;
	private $estPublic;
	private $idUser;

	public function __construct($id, $nom, $dateCreation, $estPublic, $idUser){
		$this->id = $id;
		$this->nom = $nom;
		$this->description = $description;
		$this->dateCreation = $dateCreation;
		$this->estPublic = $estPublic;
		$this->idUser = $idUser;
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

	//IdUser
	public function getIdUser(){
		return $this->idUser;
	}

	public function setIdUser($idUser){
		$this->idUser = $idUser;	
	}

}
