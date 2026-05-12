<?php

class Auteur{

    private $conn;
    private $table = "auteurs";

    public $id;
    public $nom;
    public $prenom;
    public $nationalite;

    public function __construct($db){
        $this->conn = $db;
    }

    public function lire(){

        $query = "SELECT * FROM ".$this->table;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function ajouter(){

        $query = "INSERT INTO ".$this->table."
                  SET nom=:nom,
                      prenom=:prenom,
                      nationalite=:nationalite";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nom',$this->nom);
        $stmt->bindParam(':prenom',$this->prenom);
        $stmt->bindParam(':nationalite',$this->nationalite);

        return $stmt->execute();
    }

    public function lireUn(){

        $query = "SELECT * FROM ".$this->table."
                  WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id',$this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nom = $row['nom'];
        $this->prenom = $row['prenom'];
        $this->nationalite = $row['nationalite'];
    }

    public function modifier(){

        $query = "UPDATE ".$this->table."
                  SET nom=:nom,
                      prenom=:prenom,
                      nationalite=:nationalite
                  WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nom',$this->nom);
        $stmt->bindParam(':prenom',$this->prenom);
        $stmt->bindParam(':nationalite',$this->nationalite);
        $stmt->bindParam(':id',$this->id);

        return $stmt->execute();
    }

    public function supprimer(){

        $query = "DELETE FROM ".$this->table."
                  WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id',$this->id);

        return $stmt->execute();
    }
}
?>