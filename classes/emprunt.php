<?php

class Emprunt{

    private $conn;
    private $table = "emprunts";

    public $id;
    public $livre_id;
    public $nom_emprunteur;
    public $date_emprunt;
    public $date_retour;
    public $statut;

    public function __construct($db){

        $this->conn = $db;
    }

    public function lire(){

        $query = "SELECT emprunts.*,
                  livres.titre AS livre
                  FROM emprunts
                  INNER JOIN livres
                  ON emprunts.livre_id = livres.id";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function ajouter(){

        $query = "INSERT INTO emprunts
                  SET livre_id=:livre_id,
                      nom_emprunteur=:nom_emprunteur,
                      date_emprunt=:date_emprunt,
                      date_retour=:date_retour,
                      statut=:statut";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':livre_id',$this->livre_id);
        $stmt->bindParam(':nom_emprunteur',$this->nom_emprunteur);
        $stmt->bindParam(':date_emprunt',$this->date_emprunt);
        $stmt->bindParam(':date_retour',$this->date_retour);
        $stmt->bindParam(':statut',$this->statut);

        return $stmt->execute();
    }

    public function supprimer(){

        $query = "DELETE FROM emprunts WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id',$this->id);

        return $stmt->execute();
    }
}
?>