<?php
require_once 'model/ClassModel.class.php';
class Command extends ClassModel {

	private $id;
    private $userId;
    private $annonceId;
    private $dateArriver;
    private $dateDepart;
    private $price;
    private $datePosted;

	public function getId() { return $this->id; }
    public function getUserId() { return $this->userId; }
    public function getAnnonceId() { return $this->annonceId; }
    public function getDateArriver() { return $this->dateArriver; }
    public function getDateDepart() { return $this->dateDepart; }
    public function getPrice() { return $this->price; }
    public function getDatePosted() { return $this->datePosted; }

	public function setId($id) { $this->id=$id; }
    public function setUserId($id) { $this->userId=$id; }
    public function setAnnonceId($id) { return $this->annonceId=$id; }
    public function setDateArriver($date) { return $this->dateArriver=$date; }
    public function setDateDepart($date) { return $this->dateDepart=$date; }
    public function setPrice($price) { return $this->price=$price; }
    public function setDatePosted($date) { return $this->datePosted=$date; }

    public function load(Bddmanager $BddManager) {
        // return $BddManager->getCommandManager()->...
    }

    public function loadAll(Bddmanager $BddManager) {
        return $BddManager->getCommandManager()->getCommands();
    }

    public function save(Bddmanager $BddManager) {
        return $BddManager->getCommandManager()->saveCommand($this);
    }
}
?>