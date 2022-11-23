<?php

namespace modeles;

class Tache
{
	private string $nom;
	private string $description;
	private Date $dateCreation;
	private bool $estValide;

	public function __construct(String $nom, string $description, Date $dateCreation){
		$this->nom = $nom;
		$this->description = $description;
		$this->dateCreation = $dateCreation;
		$this->estValide = false;
	}

