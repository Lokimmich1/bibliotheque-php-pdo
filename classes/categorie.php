<?php

class Categorie{

    private $conn;
    private $table = "categories";

    public $id;
    public $libelle;

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
                  SET libelle=:libelle";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':libelle',$this->libelle);

        return $stmt->execute();
    }

    public function lireUn(){

        $query = "SELECT * FROM ".$this->table."
                  WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id',$this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->libelle = $row['libelle'];
    }

    public function modifier(){

        $query = "UPDATE ".$this->table."
                  SET libelle=:libelle
                  WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':libelle',$this->libelle);
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