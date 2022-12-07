<?php
class UtilisateurGateway{
    
	private $con;
  	public  function __construct(){
        global $dsn,$user,$pass;
        $this->con=new Connection($dsn,$user,$pass);
    }

    public function AjouterUtilisateur(string $nom,string $prenom, string $pseudo, string $email, string $mdp){
        $query='INSERT INTO ToDoList_Utilisateur(nom,prenom,pseudo,email,motDePasse) values (:nom,:prenom,:pseudo,:email,:mdp);';
        $this->con->executeQuery($query, array(
                            'nom' => array($nom, PDO::PARAM_STR),
                            'prenom' => array($prenom, PDO::PARAM_STR),
                            'pseudo' => array($pseudo, PDO::PARAM_STR),
                            'email' => array($email, PDO::PARAM_STR),
                            'mdp' => array($mdp, PDO::PARAM_STR)));
    }

    public function SupprimerUtilisateur(int $id){
        $query='DELETE FROM ToDoList_Utilisateur WHERE id=:id;';
        $this->con->executeQuery($query, array(
                            'id' => array($id, PDO::PARAM_STRING)));
    }

    public function RechercheUtilisateurViaEmail(string $pseudo){
        
    }
}
?>