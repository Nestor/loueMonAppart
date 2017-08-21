<?php

class ImageManager {
    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    /* Pour sélectionner tout les annonces */
    public function getImages() {
        $prepare = $this->connexion->prepare('SELECT * FROM images');
        $prepare->execute();
        $images = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $data = [];
        foreach($images as $image) {
            $data[] = new Image($image);
        }
        return $data;
    }

    public function saveImage(Image $image) {
        $prepare = $this->connexion->prepare('INSERT INTO images SET idAnnonce=:idAnnonce, linkImage=:linkImage');
        $prepare->execute(array(
            "idAnnonce" => $image->getIdAnnonce(),
            "linkImage" => $image->getLinkImage(),
        ));
        if($this->connexion->lastInsertId()>0) {
            return $this->connexion->lastInsertId();
        }
        return false; 
    }

    /* Pour supprimer une annonce */
    public function deleteImage(Image $image) {
        $prepare = $this->connexion->prepare('DELETE FROM images WHERE id=:id');
        $prepare->execute(array(
            "id" => $image->getId()
        ));
        if($prepare->rowCount()>0) {
            return $prepare->rowCount();
        }
        return false; 
    }

    public function getImagesByAnnonceId(Image $image) {
        $prepare = $this->connexion->prepare('SELECT * FROM images WHERE idAnnonce=:idAnnonce');
        $prepare->execute(array(
            "idAnnonce" => $image->getIdAnnonce()
        ));
        $images = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $data = [];
        foreach($images as $image) {
            $data[] = new Image($image);
        }
        return $data;
    }

}

?>