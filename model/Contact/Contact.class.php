<?php
class Contact {

    private $id;
    private $type;
    private $titre;
    private $description;
    private $userId;
    private $date;

    public function __construct($donnees=array()) {
        $this->hydrate($donnees);
    }

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

    public function hydrate(array $donneesTableau){
       if(empty($donneesTableau) == false){
            foreach ($donneesTableau as $key => $value){
                $newString=$key;
                if(preg_match("#_#",$key)){
                    $word = explode("_",$key);
                    $newString = "";
                    foreach ($word as $w){
                        $newString.=ucfirst($w);
                    }
                }
                $method = "set".ucfirst($newString);
                if(method_exists($this,$method)){
                    $this->$method($value);
                }
            }
        }
    }

    public function loadById(Bddmanager $BddManager) {
        return $BddManager->getContactManager()->getContactById($this);
    }

    public function loadContacts(Bddmanager $BddManager) {

    }


}
?>