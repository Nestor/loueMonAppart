<?php
/**
 * La classe Config facilite la configuration et la récupération des données.
 *
 * @author Melvin Chabin <zouki.dev@gmail.com>
 * @version: 1.0
*/
class Config {
    public static $SITE_NAME;
    public static $SITE_URL;
    public static $SITE_FILE;
    public static $SECURE_SALT;
    
    public static $NOT_LOGGED_REDIRECT;
    public static $NOT_ADMIN_REDIRECT;
    public static $NOT_PROPRIO_REDIRECT;

    public static function getURL($route=null) {
        if(!empty($route)) {
            return self::$SITE_URL.self::$SITE_FILE.$route;
        }
        return self::$SITE_URL.self::$SITE_FILE;
    }
}
?>