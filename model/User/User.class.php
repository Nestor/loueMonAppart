<?php
require_once 'model/ClassModel.class.php';
class User extends ClassModel {

    private $id;
	private $username;
	private $password;
	private $email;
	private $grade;
	private $dateInscription;
    private $locataire;
    private $proprietaire;
    private $demandeProprietaire;

    public function getId() { return $this->id; }
	public function getUsername() { return $this->username; }
	public function getPassword() { return $this->password; }
	public function getEmail() { return $this->email; }
	public function getGrade() { return $this->grade; }
	public function getDateInscription() { return $this->dateInscription; }
    public function getLocataire() { return $this->locataire; }
    public function getProprietaire() { return $this->proprietaire; }
    public function getDemandeProprietaire() { return $this->demandeProprietaire; }

    public function setId($id) { $this->id=$id; }
	public function setUsername($username) { $this->username=$username; }
	public function setPassword($password) { $this->password=$password; }
	public function setEmail($email) { $this->email=$email; }
	public function setGrade($grade) { $this->grade=$grade; }
	public function setDateInscription($dateInscription) { $this->dateInscription=$dateInscription; }
    public function setLocataire($locataire) { $this->locataire=$locataire; }
    public function setProprietaire($proprietaire) { $this->proprietaire=$proprietaire; }
    public function setDemandeProprietaire($bool) { $this->demandeProprietaire=$bool; }

    public function save(Bddmanager $BddManager) {
        return $BddManager->getUserManager()->saveUser($this);
    }
    public function update(Bddmanager $BddManager) {
        return $BddManager->getUserManager()->updateUser($this);
    }
    public function delete(Bddmanager $BddManager) {
        return $BddManager->getUserManager()->deleteUser($this);
    }
    public function connect(Bddmanager $BddManager) {
        return $BddManager->getUserManager()->connectUser($this);
    }

    public function selectById(Bddmanager $BddManager) {
        return $BddManager->getUserManager()->getUserById($this);
    }

    public function countUsers(Bddmanager $BddManager) {
        return $BddManager->getUserManager()->countUsers();
    }
    
    public function countUsersNotValidated(Bddmanager $BddManager) {
        return $BddManager->getUserManager()->countUsersNotValidated();
    }

    public function loadAll(Bddmanager $BddManager) {
        return $BddManager->getUserManager()->loadUsers();
    }

}
?>