<?php

class AnnonceManager {
    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    public function getAnnonces() {
        $prepare = $this->connexion->prepare('SELECT * FROM annonces');
        $prepare->execute();
        $annonces = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $data = [];
        foreach($annonces as $annonce) {
            $data[] = new Annonce($annonce);
        }
        return $data;
        // return new Annonce($result[0]);
    }

    public function getAnnonceById($id) {
        $prepare = $this->connexion->prepare('SELECT * FROM annonces WHERE id=:id');
        $prepare->execute(array(
            "id" => $id
        ));
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($result)) {
            // return $result;
            return new Annonce($result[0]);
        }
        return false;
    }

    public function deleteAnnonce(Annonce $annonce) {
        $prepare = $this->connexion->prepare('DELETE FROM annonces WHERE id=:id');
        $prepare->execute(array(
            "id" => $annonce->getId()
        ));
        if($prepare->rowCount()>0) {
            return $prepare->rowCount();
        }
        return false; 
        // return $result;
    }

    public function saveAnnonce(Annonce $annonce) {
        $prepare = $this->connexion->prepare('INSERT INTO annonces SET titre=:titre, description=:description, dateDispo=:dateDispo, placeDispo=:placeDispo, price=:price');
        $prepare->execute(array(
            "titre" => $annonce->getTitre(),
            "description" => $annonce->getDescription(),
            "dateDispo" => $annonce->getDateDispo(),
            "placeDispo" => $annonce->getPlaceDispo(),
            "price" => $annonce->getPrice()
        ));
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        if($this->connexion->lastInsertId()>0) {
            return $this->connexion->lastInsertId();
        }
        return false; 
    }
}

?>