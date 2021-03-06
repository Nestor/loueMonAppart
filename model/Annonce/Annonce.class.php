<?php
require_once 'model/ClassModel.class.php';
class Annonce extends ClassModel {

	private $id;
	private $titre;
	private $description;
	private $dateDispo;
	private $placeDispo;
    private $price;
    private $idUser;
    private $accept;
    private $datePosted;
    private $type;
    private $lieu;
    private $adresse;

	public function getId() { return $this->id; }
	public function getTitre() { return $this->titre; }
	public function getDescription() { return $this->description; }
	public function getDateDispo() { return $this->dateDispo; }
	public function getPlaceDispo() { return $this->placeDispo; }
    public function getPrice() { return $this->price; }
    public function getIdUser() { return $this->idUser; }
    public function getAccept() { return $this->accept; }
    public function getDatePosted() { return $this->datePosted; }
    public function getType() { return $this->type; }
    public function getLieu() { return $this->lieu; }
    public function getAdresse() { return $this->adresse; }

	public function setId($id) { $this->id=$id; }
	public function setTitre($titre) { $this->titre=$titre; }
	public function setDescription($description) { $this->description=$description; }
	public function setDateDispo($dateDispo) { $this->dateDispo=$dateDispo; }
	public function setPlaceDispo($placeDispo) { $this->placeDispo=$placeDispo; }
    public function setPrice($price) { $this->price=$price; }
    public function setIdUser($id) { $this->idUser=$id; }
    public function setAccept($bool) { $this->accept=$bool; }
    public function setDatePosted($date) { $this->datePosted=$date; }
    public function setType($type) { $this->type=$type; }
    public function setLieu($lieu) { $this->lieu=$lieu; }
    public function setAdresse($addr) { $this->adresse=$addr; }

    public function load(Bddmanager $BddManager) {
        return $BddManager->getAnnonceManager()->getAnnonceById($this);
    }

    public function loadAll(Bddmanager $BddManager) {
        return $BddManager->getAnnonceManager()->getAnnonces();
    }
    public function loadAllByLieu(Bddmanager $BddManager) {
        return $BddManager->getAnnonceManager()->getAnnoncesByLieu($this);
    }

    public function save(Bddmanager $BddManager) {
        return $BddManager->getAnnonceManager()->saveAnnonce($this);
    }
    public function delete(Bddmanager $BddManager) {
        return $BddManager->getAnnonceManager()->deleteAnnonce($this);
    }
    public function update(Bddmanager $BddManager) {
        return $BddManager->getAnnonceManager()->updateAnnonce($this);
    }
    public function countAnnoncesNotValidated(Bddmanager $BddManager) {
        return $BddManager->getAnnonceManager()->countAnnoncesNotValidated();
    }
    public function countAnnoncesValidated(Bddmanager $BddManager) {
        return $BddManager->getAnnonceManager()->countAnnoncesValidated();
    }
}
?>