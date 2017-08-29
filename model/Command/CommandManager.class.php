<?php

class CommandManager {
    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    public function getCommands() {
        $prepare = $this->connexion->prepare('SELECT * FROM commandes');
        $prepare->execute();
        $annonces = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $data = [];
        foreach($annonces as $annonce) {
            $data[] = new Command($annonce);
        }
        return $data;
    }

    public function saveCommand(Command $command) {
        $prepare = $this->connexion->prepare('INSERT INTO commandes SET userId=:userId, annonceId=:annonceId, dateArriver=:dateArriver, dateDepart=:dateDepart, price=:price, datePosted=:datePosted');
        $prepare->execute(array(
            "userId" => $command->getUserId(),
            "annonceId" => $command->getAnnonceId(),
            "dateArriver" => $command->getDateArriver(),
            "dateDepart" => $command->getDateDepart(),
            "price" => $command->getPrice(),
            "datePosted" => $command->getDatePosted()
        ));
        if($this->connexion->lastInsertId()>0) {
            return $this->connexion->lastInsertId();
        }
        return false; 
    }

}

?>