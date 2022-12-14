<?php

class MdlAdmin
{

	public function __construct(){
		
	}

	public function connection($login,$mdp){
		// $gtw=GatewayAdmin();
		// $login=Validation::cleanString($login);
		// $mdp=Validation::cleanString($mdp);
		// if(password_verify($mdp,$gtw->getCredentials($login)){
			// 	$_SESSION['role']='admin';
			// 	$_SESSION['login']=$login;
			// 	return newAdmin($login,’admin’);    
		// }
		// else return NULL;
	}
		
	public function deconnexion(){
		session_unset();
		session_destroy();
		$_SESSION = array();
	}
		
	public function isAdmin(){
		if(isset($_SESSION["login"]) && isset($_SESSION["role"]))
		{
			$login=Nettoyer::nettoyer_string($_SESSION['login']);
			$role=Nettoyer::nettoyer_string($_SESSION['role']);
			return new Admin($login,$role);
		} else return null;
	}
		



}
