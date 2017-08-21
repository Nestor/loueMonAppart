<?php
class User {

    private $id;
	private $username;
	private $password;
	private $email;
	private $grade;
	private $dateInscription;
    private $locataire;
    private $proprietaire;

	public function __construct($donnees=array()) {
        $this->hydrate($donnees);
    }

    public function getId() { return $this->id; }
	public function getUsername() { return $this->username; }
	public function getPassword() { return $this->password; }
	public function getEmail() { return $this->email; }
	public function getGrade() { return $this->grade; }
	public function getDateInscription() { return $this->dateInscription; }
    public function getLocataire() { return $this->locataire; }
    public function getProprietaire() { return $this->proprietaire; }

    public function setId($id) { $this->id=$id; }
	public function setUsername($username) { $this->username=$username; }
	public function setPassword($password) { $this->password=$password; }
	public function setEmail($email) { $this->email=$email; }
	public function setGrade($grade) { $this->grade=$grade; }
	public function setDateInscription($dateInscription) { $this->dateInscription=$dateInscription; }
    public function setLocataire($locataire) { $this->locataire=$locataire; }
    public function setProprietaire($proprietaire) { $this->proprietaire=$proprietaire; }

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

    // public function checkUserExist(Bddmanager $BddManager) {
    //     return $BddManager->getUserManager()->checkUserExist($this);
    // }

    public function selectById(Bddmanager $BddManager) {
        return $BddManager->getUserManager()->getUserById($this);
    }

}
?>