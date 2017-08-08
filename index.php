<?php
session_start();
// session_destroy();
require_once 'flight/Flight.php';
require_once 'model/Autoloader.class.php'; // On importe la classe d'autoload
require_once 'model/Config.class.php'; // On importe la classe d'autoload
include_once 'configuration/config.conf.php';
AutoClassLoader::init('model/'); // On charge notre modules d'autoload de class

/*      CLASS INSTANCE        */
Flight::register('Bddmanager', 'Bddmanager'); 
Flight::register('HTMLFormater', 'HTMLFormater');
Flight::register('User', 'User');

Flight::render('include/header.inc', array('title' => Config::$SITE_NAME), 'header_content');
Flight::render('include/main.inc', array('HTMLFormater' => Flight::HTMLFormater()), 'main_content');
Flight::render('include/footer.inc', array(), 'footer_content');

/*      ROUTING        */
Flight::route('/', function(){
    Flight::render('home.view', array(
        'HTMLFormater' => Flight::HTMLFormater(),
        'BddManager' => Flight::Bddmanager()
    ));
});
Flight::route('/annonce/@id', function($id){
    Flight::render('annonce.view', array('id' => $id));
});
Flight::route('/annonce', function(){
    Flight::redirect(Config::getURL());
});
Flight::route('/login', function(){
    Flight::render('login.view', array());
});
Flight::route('/register', function(){
    Flight::render('register.view', array());
});
Flight::map('notFound', function(){
    Flight::render('error404.view', array());
});

/*      SERVICE        */
include_once 'service/register.service.php';
include_once 'service/login.service.php';

Flight::start();
?>
