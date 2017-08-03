<?php
class Connexion
{
    static private $connexion;
    static public function getConnexion()
    {
        if(empty(self::$connexion)){
            try {
                self::$connexion = new PDO('mysql:host=localhost;dbname=airbnb;charset=UTF8','root','root');
                self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch(PDOException $e) {
                die("PDO_error: ".$e->getMessage());
            }
            
        }
        return self::$connexion;
    }
}
?>