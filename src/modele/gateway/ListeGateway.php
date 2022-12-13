<?php
class ListeGateway{
	private $con;

  	public  function __construct(){
        global $dsn,$user,$pass;
        $this->con=new Connection($dsn,$user,$pass);
    }

    public function Ajouter(string $nom,  Date $dateCreation, bool $estValide, int $idCreateur, bool $estPublic){
    	$query='INSERT INTO ToDoList_Liste(nom, dateCreation,estValide, createur, estPublic) VALUES(:nom, :dateCreation, :estValide, :idCreateur, :estPublic);';
        $this->con->executeQuery($query, array(
                                        'nom' => array($nom, PDO::PARAM_STR),
                                        'dateCreation' => array($dateCreation, PDO::PARAM_STR),
                                        'estValide' => array($estValide, PDO::PARAM_BOOL),
                                        'idCreateur' => array($idCreateur, PDO::PARAM_INT),
                                        'estPublic' => array($estPublic, PDO::PARAM_INT)));
    }

    public function Editer(string $id, string $nom, string $description){
    	$query='UPDATE ToDoList_Liste SET nom=:nom AND description=:description WHERE id=:id;';
    	$this->con->executeQuery($query, array(
            'nom' => array($nom, PDO::PARAM_STR), 
            'id' => array($id,PDO::PARAM_INT),
            'description' => array($description, PDO::PARAM_STR))
        );
    }

    public function EditerNom(string $id, string $nom){
        $query='UPDATE ToDoList_Liste SET nom=:nom WHERE id=:id;';

// erreur iciiiiiiii
        $this->con->executeQuery($query, array('nom' => array($nom, PDO::PARAM_STR),'id' => array($id, PDO::PARAM_INT)));

    }

     public function EditerDescription(string $id, string $description){
        $query='UPDATE ToDoList_Liste SET description=:description WHERE id=:id;';
        $this->con->executeQuery($query, array('description' => array($description, PDO::PARAM_STR), 'id' => array($id, PDO::PARAM_INT)));
    }

    public function Supprimer(string $id){
        $query="DELETE FROM ToDoList_Liste WHERE id=:id";
        $this->con->executeQuery($query,array('id' => array($id, PDO::PARAM_INT)));
    }

    public function getListe(int $offset, int $limit){
        $query = "SELECT * FROM ToDoList_Liste LIMITS $offset,$limit"; 
        $this->con->executeQuery($query);
        $listes=$this->con->getResults();
        return $listes;
    }

    public function getListePublic($offset,$limit){
        $query = "SELECT * FROM ToDoList_Liste WHERE estPublic LIMIT $offset, $limit"; 
        $this->con->executeQuery($query);
        $listes = [];
		foreach ($this->con->getResults() as $liste) {
			$listes[] = new Liste($liste["id"],$liste["nom"],$liste["description"],$liste["dateCreation"],$liste["estPublic"],$liste["idUtilisateur"]);
		}
		return $listes;
    }
}
?>