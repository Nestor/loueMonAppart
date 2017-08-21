<?php
/**
 * La classe AutoLoader permet l'auto chargement(require) des class dans le dossier cibler
 * navigue aussi dans les sous dossier du dossier cibler (permet une meilleur organisation)
 *
 * @author Melvin Chabin <zouki.dev@gmail.com>
 * @version: 1.0
*/
class AutoLoader {
    public static $displayInfo = false;
    public static function loadDir($dirname, $mode) {
        if (is_dir($dirname)) {
            if ($dh = opendir($dirname)) {
                while (($file = readdir($dh)) !== false) {
                    if($file != '.' && $file != '..') {
                        $getExtension = substr($file, strlen($file)-3, 3);
                        if($getExtension == "php") {
                            if(self::$displayInfo == true) {
                                echo $dirname.$file.' ['.$mode.']<br/>';
                                if($mode=="require") {
                                    require_once $dirname.'/'.$file;
                                } else if($mode=="include") {
                                    include_once $dirname.'/'.$file;
                                }
                            }
                            if($mode=="require") {
                                require_once $dirname.'/'.$file;
                            } else if($mode=="include") {
                                include_once $dirname.'/'.$file;
                            }
                        } else {
                            self::loadDir($dirname.$file, $mode);
                        }
                    }
                }
            }
        } else {
            echo $dirname.' is not directory<br/>';
        }
    }
}
?>