<?php
class Annonce {

	private $id;
	private $titre;
	private $description;
	private $dateDispo;
	private $placeDispo;
    private $price;
    private $idUser;
    private $accept;
    private $datePosted;

    public function __construct($donnees=array()) {
        $this->hydrate($donnees);
    }

	public function getId() { return $this->id; }
	public function getTitre() { return $this->titre; }
	public function getDescription() { return $this->description; }
	public function getDateDispo() { return $this->dateDispo; }
	public function getPlaceDispo() { return $this->placeDispo; }
    public function getPrice() { return $this->price; }
    public function getIdUser() { return $this->idUser; }
    public function getAccept() { return $this->accept; }
    public function getDatePosted() { return $this->datePosted; }


	public function setId($id) { $this->id=$id; }
	public function setTitre($titre) { $this->titre=$titre; }
	public function setDescription($description) { $this->description=$description; }
	public function setDateDispo($dateDispo) { $this->dateDispo=$dateDispo; }
	public function setPlaceDispo($placeDispo) { $this->placeDispo=$placeDispo; }
    public function setPrice($price) { $this->price=$price; }
    public function setIdUser($id) { $this->idUser=$id; }
    public function setAccept($bool) { $this->accept=$bool; }
    public function setDatePosted($date) { $this->datePosted=$date; }

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


    public function load(Bddmanager $BddManager) {
        return $BddManager->getAnnonceManager()->getAnnonceById($this);
    }
    public function loadAll(Bddmanager $BddManager) {
        return $BddManager->getAnnonceManager()->getAnnonces();
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
}
?>