<?php
class FrontControleur {

    function __construct(){
		global $rep,$vues; 
		session_start();
		if(!isset($_SESSION["pageUser"])){
			$_SESSION['pageUser']=1;
		}
		if(!isset($_SESSION["page"])){
			$_SESSION['page']=1;
		}

		try {
			
			$string_actor=' ';
			$listeActions=array(
				'Utilisateur' => array('logout','redirectionProfil','pageSuivantePrive','pagePrécédentePrive','supprimerCompte','modifMdp' ,'listePrive','AjouterListePrive', 'checkPrive', 'SupprimerListePrive', 'AjouterTachePrive', 'ModifierListePrive', 'SupprimerTachePrive'),
				'Admin' => array('redirectionVueUtilisateur','SupprimerUtilisateur')
			);

			//On récupère l'action
			$action=NULL;
			if(isset($_REQUEST['action'])){
				$action = $_REQUEST["action"];
			}


			//On vérifie si l'action fait partie des listes d'actions
			$string_actor=FrontControleur::quelListe($action,$listeActions);
			if($string_actor!=NULL){
				$class= 'Mdl'.$string_actor;
				$mdl=new $class();
				$actor=$mdl->isConnected();
				if($actor==NULL){
					require($rep.$vues['login']);
				}
				else{
					$ctrl='Ctrl'.$string_actor;
					new $ctrl();

				}
			}	
			else 
				new CtrlVisiteur();

		} catch (Exception $e) {
			$dVueEreur[] =	"Erreur inattendue!!! ";
			require ($rep.$vues['erreur']);
		} catch (PDOException $e)
		{
			//si erreur BD, pas le cas ici
			$dVueErreur[] =	"Erreur: Connexion a la base de données impossible! ";
			require ($rep.$vues['erreur']);

		}
    }
	
	public static function quelListe($action,$listeActions){
		foreach($listeActions as $a){
			if(in_array($action, $a)){
				return array_search($a,$listeActions);
			}
		}
		return null;
	}
	
}
?>