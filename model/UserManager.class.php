<?php

class UserManager {
    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    public function saveUser(User $user) {
        if($this->checkUserExist($user)==false) {
            date_default_timezone_set("Europe/Paris"); 
            $prepare = $this->connexion->prepare('INSERT INTO users SET username=:username, password=:password, email=:email, grade=:grade, type=:type, dateInscription=:dateInscription');
            $SALT = "353d196605b2bb5890bfb1b3aa0c3cccfdddd30b";
            $date = date('d/m/Y à G:i');
            $prepare->execute(array(
                "username" => $user->getUsername(),
                "password" => $SALT.sha1($user->getPassword()),
                "email" => $user->getEmail(),
                "grade" => $user->getGrade(),
                "type" => $user->getType(),
                "dateInscription" => $date
            ));
            if($this->connexion->lastInsertId()>0) {
                return $this->connexion->lastInsertId();
            }
        }
        return false;
    }

    public function updateUser(User $user) {
        $prepare = $this->connexion->prepare('UPDATE users SET username=:username, password=:password, email=:email, grade=:grade, type=:type WHERE id=:id');
        $prepare->execute(array(
            "username" => $user->getUsername(),
            "password" => $user->getPassword(),
            "email" => $user->getEmail(),
            "grade" => $user->getGrade(),
            "type" => $user->getType(),
            "id" => $user->getId()
        ));
        if($prepare->rowCount()>0) {
            return $prepare->rowCount();
        }
        return false; 
    }

    public function deleteUser(User $user) {
        $prepare = $this->connexion->prepare('DELETE FROM users WHERE id=:id');
        $prepare->execute(array(
            "id" => $user->getId()
        ));
        if($prepare->rowCount()>0) {
            return $prepare->rowCount();
        }
        return false; 
    }

    public function connectUser(User $user) {
        if($this->checkUserExist($user)) {
            $prepare = $this->connexion->prepare('SELECT * FROM users WHERE password=:password');
            $prepare->execute(array(
                "password" => $user->getPassword()
            ));
            $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
            if(empty($result)==false) {
                return new User($result[0]);
            }
            return false;
        }
    }

    public function getUserById(User $user) {
        $prepare = $this->connexion->prepare('SELECT * FROM users WHERE id=:id');
        $prepare->execute(array(
            "id" => $user->getId()
        ));
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)==false) {
            return new User($result[0]);
        }
        return false;
    }

    public function checkUserExist(User $user) {
        $prepare = $this->connexion->prepare('SELECT * FROM users WHERE username=:username');
        $prepare->execute(array(
            "username" => $user->getUsername()
        ));
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)==false) {
            return true;
        }
        return false;
    }
    public function checkAccountExist(User $user) {
        $prepare = $this->connexion->prepare('SELECT * FROM users WHERE username=:username AND password=:password');
        $prepare->execute(array(
            "username" => $user->getUsername(),
            "password" => $user->getPassword()
        ));
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)==false) {
            return true;
        }
        return false;
    }
}

?>