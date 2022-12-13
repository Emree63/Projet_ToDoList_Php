<?php
class TacheGateway{
	private $con;
  	public  function __construct(){
        global $dsn,$user,$pass;
        $this->con=new Connection($dsn,$user,$pass);
    }


    public function AjouterTache(string $nom, string $description, bool $estValide, string $idListe){
        $query='INSERT INTO ToDoList_Tache(nom, description, dateCreation,estValide, idListe) VALUES(:nom, :description, CURRENT_DATE, :estValide, ;idListe)';
        $this->con->executeQuery($query, array('nom' => array($nom, PDO::PARAM_STR)),
        array('description' => array($description, PDO::PARAM_STR)),
        array('estValide' => array($estValide, PDO::PARAM_BOOL)),
        array('idListe' => array($idListe, PDO::PARAM_INT)));
    }

    public function Editer(string $id, string $nom, string $description){
    	$query='UPDATE ToDoList_Tache SET  nom=:nom, description =:description WHERE id=:id';
    	$this->con->executeQuery($query, array('nom' => array($nom, PDO::PARAM_STR)), array('description' => array($description, PDO::PARAM_STR)), array('id' => array($id, PDO::PARAM_INT)));
    }

    public function EditerNom(string $id, string $nom){
        $query='UPDATE ToDoList_Tache SET  nom=:nom WHERE id=:id';
        $this->con->executeQuery($query, array('nom' => array($nom, PDO::PARAM_STR)), array('id' => array($id, PDO::PARAM_INT)));
    }

     public function EditerDescription(string $id, string $description){
        $query='UPDATE ToDoList_Tache SET  description=:description WHERE id=:id';
        $this->con->executeQuery($query, array('description' => array($description, PDO::PARAM_STR)), array('id' => array($id, PDO::PARAM_INT)));
    }

    public function Supprimer(string $id){
        $query='DELETE FROM ToDoList_Tache WHERE id=:id';
        $this->con->executeQuery($query,array('id' => array($id, PDO::PARAM_INT)));
    }

    // Si une liste est supprimée on supprime toutes ces tâches grâce à cette fonction
    public function SupprimerViaListe(string $id){
        $query='DELETE FROM ToDoList_Tache WHERE idListe=:id';
        $this->con->executeQuery($query,array('id' => array($id, PDO::PARAM_INT)));
    }

    public function getTache(){
        $query='SELECT * FROM ToDoList_Tache';
         $this->con->executeQuery($query);
        $taches = [];
        foreach ($this->con->getResults() as $tache) {
            $taches[] = new Tache($tache["id"],$tache["nom"],$tache["description"],$tache["dateCreation"],$tache["estValide"],$tache["idListe"]);
        }
        return $taches;
    }

    public function isDone(string $id){
        $query = 'UPDATE ToDoList_Tache SET estValide = !estValide WHERE id=:id';
        $this->con->executeQuery($query, array('id' => array($id, PDO::PARAM_STR)));
    }
}
?>