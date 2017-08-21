<?php
class Image {

	private $id;
    private $idAnnonce;
    private $linkImage;

    public function __construct($donnees=array()) {
        $this->hydrate($donnees);
    }

    public function getId() { return $this->id; }
    public function getIdAnnonce() { return $this->idAnnonce; }
    public function getLinkImage() { return $this->linkImage; }

    public function setId($id) { $this->id=$id; }
    public function setIdAnnonce($id) { $this->idAnnonce=$id; }
    public function setLinkImage($link) { $this->linkImage=$link; }

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


    // public function load(Bddmanager $BddManager) {
    //     return $BddManager->getAnnonceManager()->getAnnonceById($this);
    // }
    public function save(Bddmanager $BddManager) {
        return $BddManager->getImageManager()->saveImage($this);
    }
    public function getByAnnonceId(Bddmanager $BddManager) {
        return $BddManager->getImageManager()->getImagesByAnnonceId($this);
    }
    // public function delete(Bddmanager $BddManager) {
    //     return $BddManager->getAnnonceManager()->deleteAnnonce($this);
    // }
    // public function update(Bddmanager $BddManager) {
    //     return $BddManager->getAnnonceManager()->updateAnnonce($this);
    // }
}
?>