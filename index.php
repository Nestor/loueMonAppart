<?php
require_once 'flight/Flight.php';
require_once 'model/Autoloader.class.php';
AutoClassLoader::init('model/'); // On charge les class

/**
 * Alfonso: il est cool ton autoloader
 * continue comme ça
 */

// on instancie nos classes
Flight::register('Bddmanager', 'Bddmanager'); // on enregistre les class pour les utiliser partout
Flight::register('HTMLFormater', 'HTMLFormater'); // on enregistre les class pour les utiliser partout

Flight::render('include/header.inc', array('title' => 'Ma Page'), 'header_content');
Flight::render('include/footer.inc', array(), 'footer_content');

Flight::route('/', function(){
    Flight::render('home.view', array(
        'HTMLFormater' => Flight::HTMLFormater(),
        'BddManager' => Flight::Bddmanager()
    ));
});

Flight::route('/annonce/@id', function($id){
    Flight::render('annonce.view', array('id' => $id));
});


Flight::start();
?>
