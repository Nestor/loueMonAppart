<?php
require_once 'model/ClassModel.class.php';
class Contact extends ClassModel {

    private $id;
    private $type;
    private $titre;
    private $description;
    private $userId;
    private $date;

    public function getId(){ return $this->id; }
    public function getType(){ return $this->type; }
    public function getTitre(){ return $this->titre; }
    public function getDescription(){ return $this->description; }
    public function getUserId(){ return $this->userId; }
    public function getDate(){ return $this->date; }

    public function setId($id){ $this->id=$id; }
    public function setType($type){ $this->type=$type; }
    public function setTitre($titre){ $this->titre=$titre; }
    public function setDescription($description){ $this->description=$description; }
    public function setUserId($userId){ $this->userId=$userId; }
    public function setDate($date){ $this->date=$date; }

    public function loadById(Bddmanager $BddManager) {
        return $BddManager->getContactManager()->getContactById($this);
    }

    public function loadContacts(Bddmanager $BddManager) {

    }


}
?>