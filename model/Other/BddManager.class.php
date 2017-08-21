<?php
class Bddmanager {

    private $connexion;
	private $AnnonceManager;
    private $UserManager;
    private $ImageManager;
    private $ContactManager;

	public function __construct() {
        $this->connexion = Connexion::getConnexion();
        $this->setAnnonceManager(new AnnonceManager($this->connexion));
        $this->setUserManager(new UserManager($this->connexion));
        $this->setImageManager(new ImageManager($this->connexion));
        $this->setContactManager(new ContactManager($this->connexion));
    }

    // Annonce
	public function getAnnonceManager() { return $this->AnnonceManager; }
	public function setAnnonceManager($AnnonceManager) { $this->AnnonceManager=$AnnonceManager; }
    // User
    public function getUserManager() { return $this->UserManager; }
    public function setUserManager($UserManager) { $this->UserManager=$UserManager; }
    // Image
    public function getImageManager() { return $this->ImageManager; }
    public function setImageManager($ImageManager) { $this->ImageManager=$ImageManager;}
    // Contatc
    public function getContactManager() { return $this->ContactManager; }
    public function setContactManager($ContactManager) { $this->ContactManager=$ContactManager; }
}
?>