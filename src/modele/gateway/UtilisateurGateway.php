<?php
class UtilisateurGateway{
    
	private $con;
  	public  function __construct(){
        global $dsn,$user,$pass;
        $this->con=new Connection($dsn,$user,$pass);
    }

    public function AjouterUtilisateur(string $nom,string $prenom, string $pseudo, string $email, string $mdp){
        $query="INSERT INTO ToDoList_Utilisateur(nom,prenom,pseudo,email,motDePasse) values (:nom,:prenom,:pseudo,:email,:mdp)";
        $this->con->executeQuery($query, array(
                            'nom' => array($nom, PDO::PARAM_STR),
                            'prenom' => array($prenom, PDO::PARAM_STR),
                            'pseudo' => array($pseudo, PDO::PARAM_STR),
                            'email' => array($email, PDO::PARAM_STR),
                            'mdp' => array($mdp, PDO::PARAM_STR)));
    }

    public function SupprimerUtilisateur(int $id){
        $query="DELETE FROM ToDoList_Utilisateur WHERE id=:id";
        $this->con->executeQuery($query, array(
                            'id' => array($id, PDO::PARAM_INT)));
    }

    public function existeAdmin(int $id){
        $query="SELECT * FROM ToDoList_Admin WHERE idAdmin=:id";
        $this->con->executeQuery($query, array(
                            'id' => array($id, PDO::PARAM_INT)));
                            $results=$this->con->getResults();
        if($results!=null){
            return true;
        }else{
            return false;
        }
    }

    public function getUtilisateurs(){
        $query = "SELECT * FROM ToDoList_Utilisateur"; 
        $this->con->executeQuery($query);
        $listesUsers = [];
        foreach ($this->con->getResults() as $user) {
            $listesUsers[] = new Utilisateur($user["id"],$user["nom"],$user["prenom"],$user["pseudo"],$user["email"]);
        }
        return $listesUsers;
    }

    // Vérifie que le mail n'existe pas
    public function isExisteViaMail($mail){
        $query="SELECT * FROM ToDoList_Utilisateur WHERE email=:mail";
        $this->con->executeQuery($query, array('mail' => array($mail, PDO::PARAM_STR)));
        $results=$this->con->getResults();
        if($results!=null){
            throw new PDOException("Erreur l'email existe déjà*");
        }else{
            return null;
        }
    }

    // Vérifie que le pseudo n'existe pas
    public function isExisteViaPseudo($pseudo){
        $query="SELECT * FROM ToDoList_Utilisateur WHERE pseudo=:pseudo";
        $this->con->executeQuery($query, array('pseudo' => array($pseudo, PDO::PARAM_STR)));
        $results=$this->con->getResults();
        if($results!=null){
            throw new PDOException("Erreur le pseudo existe déjà*");
        }else{
            return null;
        }
    }

    // Récupère le mot de passe pour la connexion via le mail en paramètres
    public function getCredentials(string $mail){
        $query = 'SELECT motDePasse FROM ToDoList_Utilisateur WHERE email=:mail';
        $this->con->executeQuery($query, array('mail' => array($mail, PDO::PARAM_STR)));
        $results=$this->con->getResults();
        if($results!=null){
            return $results[0]['motDePasse'];
        }else{
            throw new Exception("Identifiant introuvable*");
        }
    }

    public function modifMdp($id, $mdp){
        $query = "UPDATE ToDoList_Utilisateur SET motDePasse=:mdp WHERE id=:id";
        $this->con->executeQuery($query, array(
            'mdp' => array($mdp, PDO::PARAM_STR),
            'id' => array($id, PDO::PARAM_INT)));
    }

    public function RechercheUtilisateurViaEmail(string $mail){
        $query = 'SELECT * FROM ToDoList_Utilisateur WHERE email=:mail';
        $this->con->executeQuery($query, array('mail' => array($mail, PDO::PARAM_STR)));
        $results=$this->con->getResults();
        if($results!=null){
            return new Utilisateur($results[0]['id'],$results[0]['nom'],$results[0]['prenom'],$results[0]['pseudo'],$results[0]['email']);
        }else{
            throw new Exception("Identifiant introuvable*");
        }
    }
}
?>
