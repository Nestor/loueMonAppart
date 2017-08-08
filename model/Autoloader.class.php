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
                    if($file != '.' && $file != '..') {
                    
                        $getExtension = substr($file, strlen($file)-3, 3);
                        if($getExtension == "php") {
                            if($file != "Autoloader.class.php") {
                                require_once($file);
                            }
                        } else {
                            echo 'Error file '.$file.'<br/>';
                        }

                    }
                }
                closedir($dh);
            }
        }
    }
    private static function openfile($file) {

    }
}
?>