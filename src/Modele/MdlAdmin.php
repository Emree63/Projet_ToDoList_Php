<?php

class MdlAdmin
{

	public function __construct(){

	}

	public function Connexion(string $pseudo, string $mdp){
		/*Pas d'admin gateway pour l'instant*/
		/*$gtw = new AdminGateway();*/

		/*test avec utilisateur gateway*/
		$gtw = new UtilisateurGateway();
		$login = Validation::cleanLogin($pseudo);
		$mdp = Validation::cleanString($mdp);

		if(password_verify($mdp, $gtw->getCredential($login))){
			$_SESSION['role'] = 'admin';
			$_SESSION['login'] = $pseudo;
			return new Admin();
		}
		else{
			 $dVueEreur[] =	"Vous n'etes pas Admin";
		}
	}

}
