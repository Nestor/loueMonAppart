<?php
class Utils {
    public static function getLogged($session=null) {
        if(empty($session)) {
            Flight::redirect(Config::$NOT_LOGGED_REDIRECT);
        }
    }
    public static function getAdministrator($session=null) {
        $session = unserialize($session);
        if($session->getGrade() != "owner") {
            Flight::redirect(Config::$NOT_ADMIN_REDIRECT);
        }
    }
    public static function getProprietaire($session=null) {
        $session = unserialize($session);
        if($session->getProprietaire() != "true") {
            Flight::redirect(Config::$NOT_PROPRIO_REDIRECT);
        }
    }
}
?>