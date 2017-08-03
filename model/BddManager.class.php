<?php
class Bddmanager {

    private $connexion;
	private $AnnonceManager;

	public function __construct() {
        $this->connexion = Connexion::getConnexion();
        $this->setAnnonceManager(new AnnonceManager($this->connexion));
    }

	public function getAnnonceManager() { return $this->AnnonceManager; }
	public function setAnnonceManager($AnnonceManager) { $this->AnnonceManager=$AnnonceManager; }

}
?>