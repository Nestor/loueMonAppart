<?php

class AnnonceManager {
    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    /* Pour sélectionner tout les annonces */
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

    public function getAnnoncesByLieu(Annonce $annonce) {
        $prepare = $this->connexion->prepare('SELECT * FROM annonces WHERE lieu=:lieu');
        $prepare->execute(array(
            "lieu" => $annonce->getLieu()
        ));
        $annonces = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $data = [];
        foreach($annonces as $annonce) {
            $data[] = new Annonce($annonce);
        }
        return $data;
    }

    /* Pour sélectionner qu'une annonce */
    public function getAnnonceById(Annonce $annonce) {
        $prepare = $this->connexion->prepare('SELECT * FROM annonces WHERE id=:id');
        $prepare->execute(array(
            "id" => $annonce->getId()
        ));
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($result)) {
            // return $result;
            return new Annonce($result[0]);
        }
        return false;
    }

    /* Pour supprimer une annonce */
    public function deleteAnnonce(Annonce $annonce) {
        $prepare = $this->connexion->prepare('DELETE FROM annonces WHERE id=:id');
        $prepare->execute(array(
            "id" => $annonce->getId()
        ));
        if($prepare->rowCount()>0) {
            return $prepare->rowCount();
        }
        return false; 
    }

    /* Pour enregistrer l'annonce */
    public function saveAnnonce(Annonce $annonce) {
        $prepare = $this->connexion->prepare('INSERT INTO annonces SET titre=:titre, description=:description, dateDispo=:dateDispo, placeDispo=:placeDispo, price=:price, idUser=:idUser, datePosted=:datePosted, type=:type, lieu=:lieu, adresse=:adresse');
        $prepare->execute(array(
            "titre" => $annonce->getTitre(),
            "description" => $annonce->getDescription(),
            "dateDispo" => $annonce->getDateDispo(),
            "placeDispo" => $annonce->getPlaceDispo(),
            "price" => $annonce->getPrice(),
            "idUser" => $annonce->getIdUser(),
            "datePosted" => $annonce->getDatePosted(),
            "type" => $annonce->GetType(),
            "lieu" => $annonce->getLieu(),
            "adresse" => $annonce->getAdresse()
        ));
        if($this->connexion->lastInsertId()>0) {
            return $this->connexion->lastInsertId();
        }
        return false; 
    }

    /* Pour mettre à jours l'annonce */
    public function updateAnnonce(Annonce $annonce) {
        $prepare = $this->connexion->prepare('UPDATE annonces SET titre=:titre, description=:description, dateDispo=:dateDispo, placeDispo=:placeDispo, price=:price, idUser=:idUser, accept=:accept, type=:type, lieu=:lieu, adresse=:adresse WHERE id=:id');
        $prepare->execute(array(
            "id" => $annonce->getId(),
            "titre" => $annonce->getTitre(),
            "description" => $annonce->getDescription(),
            "dateDispo" => $annonce->getDateDispo(),
            "placeDispo" => $annonce->getPlaceDispo(),
            "price" => $annonce->getPrice(),
            "idUser" => $annonce->getIdUser(),
            "accept" => $annonce->getAccept(),
            "type" => $annonce->GetType(),
            "lieu" => $annonce->getLieu(),
            "adresse" => $annonce->getAdresse()
        ));
        if($prepare->rowCount()>0) {
            return $prepare->rowCount();
        }
        return false; 
    }

    public function countAnnoncesValidated() {
        $prepare = $this->connexion->prepare('SELECT * FROM annonces WHERE accept=:accept');
        $prepare->execute(array(
            "accept" => "true"
        ));
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($result)) {
            return count($result);
        }
        return "0";
    }
    public function countAnnoncesNotValidated() {
        $prepare = $this->connexion->prepare('SELECT * FROM annonces WHERE accept=:accept');
        $prepare->execute(array(
            "accept" => "false"
        ));
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($result)) {
            return count($result);
        }
        return "0";
    }
}

?>