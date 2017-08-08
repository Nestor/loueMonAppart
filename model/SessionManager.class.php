<?php
class SessionManager {
    public static $USER_SESSION;

    public static function getId() {
        if(!empty(self::$USER_SESSION)) {
            return self::$USER_SESSION['id'];
        }
        return false;
    }
    public static function getUsername() {
        if(!empty(self::$USER_SESSION)) {
            return self::$USER_SESSION['username'];
        }
        return false;
    }
    public static function getGrade() {
        if(!empty(self::$USER_SESSION)) {
            return self::$USER_SESSION['grade'];
        }
        return false;
    }
    public static function getLocataire() {
        if(!empty(self::$USER_SESSION)) {
            return self::$USER_SESSION['locataire'];
        }
        return false;
    }
    public static function getProprietaire() {
        if(!empty(self::$USER_SESSION)) {
            return self::$USER_SESSION['proprietaire'];
        }
        return false;
    }
}
?>