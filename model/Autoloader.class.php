<?php
/**
 * La classe AutoClassLoader permet l'auto require des fichiers php dans le dossier cibler
 *
 * @author Melvin Chabin <zouki.dev@gmail.com>
 * @version: 1.0
*/
class AutoClassLoader {
    public static function init($dir) {
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if($file == '.') {
                    } else if($file == '..') {
                    } else {
                        $getExtension = substr($file, strlen($file)-3, 3);
                        if($getExtension == "php") {
                            if($file == "Autoloader.class.php") {
                            } else {
                                require_once($file);
                            }
                        } else {
                            echo 'Error file '.$file.' in class\\'.$file;
                        }
                    }
                }
                closedir($dh);
            }
        }
    }
}
?>