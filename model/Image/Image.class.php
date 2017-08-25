<?php
require_once 'model/ClassModel.class.php';
class Image extends ClassModel {

	private $id;
    private $idAnnonce;
    private $linkImage;

    public function getId() { return $this->id; }
    public function getIdAnnonce() { return $this->idAnnonce; }
    public function getLinkImage() { return $this->linkImage; }

    public function setId($id) { $this->id=$id; }
    public function setIdAnnonce($id) { $this->idAnnonce=$id; }
    public function setLinkImage($link) { $this->linkImage=$link; }

    public function save(Bddmanager $BddManager) {
        return $BddManager->getImageManager()->saveImage($this);
    }
    public function getByAnnonceId(Bddmanager $BddManager) {
        return $BddManager->getImageManager()->getImagesByAnnonceId($this);
    }
}
?>