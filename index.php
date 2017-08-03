<?php
require 'flight/Flight.php';

Flight::render('include/header.inc', array('title' => 'Ma Page'), 'header_content');
Flight::render('include/footer.inc', array(), 'footer_content');

Flight::route('/', function(){
    Flight::render('home.view', array());
});

Flight::start();
?>
