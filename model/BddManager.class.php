<?php
class Bddmanager {

    private $connexion;
	private $AnnonceManager;
    private $UserManager;

	public function __construct() {
        $this->connexion = Connexion::getConnexion();
        $this->setAnnonceManager(new AnnonceManager($this->connexion));
        $this->setUserManager(new UserManager($this->connexion));
    }

	public function getAnnonceManager() { return $this->AnnonceManager; }
	public function setAnnonceManager($AnnonceManager) { $this->AnnonceManager=$AnnonceManager; }

    public function getUserManager() { return $this->UserManager; }
    public function setUserManager($UserManager) { $this->UserManager=$UserManager; }
}
?>