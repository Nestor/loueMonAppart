<?php
require_once '../model/Config.class.php'; // On importe la classe d'autoload
include_once '../configuration/config.conf.php';
require_once '../flight/Flight.php';

/*      ROUTING        */
Flight::route('/', function(){
    echo 'espace admin';
    // Flight::render('home.view', array());
});

/*      SERVICE        */


Flight::start();
?>
