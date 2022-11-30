<?php

namespace Controller;

class Controleur {

function __construct() {
	global $rep,$vues; // nécessaire pour utiliser variables globales
// on démarre ou reprend la session
session_start();


//debut

//on initialise un tableau d'erreur
$dVueEreur = array ();

try{
$action=NULL;
 if(isset($_REQUEST['action'])){
	$action = $_REQUEST["action"];
 }

switch($action) {

		//pas d'action, on réinitialise 1er appel
		case NULL:
			$this->Reinit();
			break;


		case "validationFormulaire":
			$this->ValidationFormulaire($dVueEreur);
			break;

		case "redirectionLogin":
			$this->redirectionLogin($dVueEreur);
			break;

		case "redirectionInscription":
			$this->redirectionInscription($dVueEreur);
			break;

		case "seConnecter":
			$this->seConnecter($dVueEreur);
			break;

		case "ConsulterListe":
			$this->ConsulterListe();
			break;

//mauvaise action
default:
$dVueEreur[] =	"Erreur d'appel php";
require ($rep.$vues['home']);
break;
}

} catch (PDOException $e)
{
	//si erreur BD, pas le cas ici
	$dVueEreur[] =	"Erreur inattendue!!! ";
	require ($rep.$vues['erreur']);

}
catch (Exception $e2)
	{
	$dVueEreur[] =	"Erreur inattendue!!! ";
	require ($rep.$vues['erreur']);
	}


//fin
exit(0);
}//fin constructeur


function Reinit() {
global $rep,$vues;

$dVue = array (
	'nom' => "",
	'age' => 0,
	);
	require ($rep.$vues['Home']);
}

function ValidationFormulaire(array $dVueEreur) {
global $rep,$vues;


//si exception, ca remonte !!!
$nom=$_POST['txtNom']; // txtNom = nom du champ texte dans le formulaire
$age=$_POST['txtAge'];
\config\Validation::val_form($nom,$age,$dVueEreur);

$model = new \Modele\Simplemodel();
$data=$model->get_data();

$dVue = array (
	'nom' => $nom,
	'age' => $age,
        'data' => $data,
	);
	require ($rep.$vues['inscription']);
}


function redirectionLogin(array $dVueEreur) {
	global $rep,$vues;
	require ($rep.$vues['login']);
}

function redirectionInscription(array $dVueEreur) {
	global $rep,$vues;
	require ($rep.$vues['inscription']);
}

function seConnecter(array $dVueEreur) {
	global $rep,$vues;


	//si exception, ca remonte !!!
	$mail=$_POST['mail']; // txtNom = nom du champ texte dans le formulaire
	$password=$_POST['password'];
	\config\Validation::val_connection($nom,$age,$dVueEreur);
	require ($rep.$vues['login']);
}

function ConsulterListe(){
		global $rep,$vues;
		$con=new Connection("mysql:host=localhost;dbname=dbrahassou","rahassou","achanger");
		$model = new ListeGateway($con);
		$results=array();
		$results=$model->getListePublic(0,10);
		$dVue = array (			
    		'results' => $results
		);
		require ($rep.$vues['listeVue']);
	} 


}//fin class

?>
