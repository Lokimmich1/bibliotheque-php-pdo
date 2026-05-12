<?php

class Livre{

    private $conn;
    private $table = "livres";

    public $id;
    public $titre;
    public $isbn;
    public $annee;
    public $quantite;
    public $auteur_id;
    public $categorie_id;

    public function __construct($db){

        $this->conn = $db;
    }

    public function lire(){

        $query = "SELECT livres.*,
                  auteurs.nom AS auteur,
                  categories.libelle AS categorie
                  FROM livres
                  INNER JOIN auteurs
                  ON livres.auteur_id = auteurs.id
                  INNER JOIN categories
                  ON livres.categorie_id = categories.id";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function ajouter(){

        $query = "INSERT INTO livres
                  SET titre=:titre,
                      isbn=:isbn,
                      annee=:annee,
                      quantite=:quantite,
                      auteur_id=:auteur_id,
                      categorie_id=:categorie_id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':titre',$this->titre);
        $stmt->bindParam(':isbn',$this->isbn);
        $stmt->bindParam(':annee',$this->annee);
        $stmt->bindParam(':quantite',$this->quantite);
        $stmt->bindParam(':auteur_id',$this->auteur_id);
        $stmt->bindParam(':categorie_id',$this->categorie_id);

        return $stmt->execute();
    }

    public function lireUn(){

        $query = "SELECT * FROM livres WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id',$this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->titre = $row['titre'];
        $this->isbn = $row['isbn'];
        $this->annee = $row['annee'];
        $this->quantite = $row['quantite'];
        $this->auteur_id = $row['auteur_id'];
        $this->categorie_id = $row['categorie_id'];
    }

    public function modifier(){

        $query = "UPDATE livres
                  SET titre=:titre,
                      isbn=:isbn,
                      annee=:annee,
                      quantite=:quantite,
                      auteur_id=:auteur_id,
                      categorie_id=:categorie_id
                  WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':titre',$this->titre);
        $stmt->bindParam(':isbn',$this->isbn);
        $stmt->bindParam(':annee',$this->annee);
        $stmt->bindParam(':quantite',$this->quantite);
        $stmt->bindParam(':auteur_id',$this->auteur_id);
        $stmt->bindParam(':categorie_id',$this->categorie_id);
        $stmt->bindParam(':id',$this->id);

        return $stmt->execute();
    }

    public function supprimer(){

        $query = "DELETE FROM livres WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id',$this->id);

        return $stmt->execute();
    }
}
?>