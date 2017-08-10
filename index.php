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
Flight::register('Annonce', 'Annonce');
// if(isset($_SESSION['user'])) {
//     SessionManager::$USER_SESSION = $_SESSION['user'];
//     var_dump(SessionManager::$USER_SESSION);
// }

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
    if(intval($id)) {
        Flight::render('annonce.view', array('id' => $id));
    }
});
Flight::route('/post-annonce', function(){
    Flight::render('postAnnonce.view', array());
});
Flight::route('/annonce', function(){
    Flight::redirect(Config::getURL());
});
Flight::route('/login', function(){
    Flight::render('login.view', array());
});
Flight::route('/profil/@id', function($id){
    if(intval($id)) {
        Flight::render('profil.view', array('id' => $id));
    }
});
Flight::route('/profil', function(){
    Flight::render('profil.view', array());
});
Flight::route('/register', function(){
    Flight::render('register.view', array());
});
Flight::route('/logout', function(){
    session_destroy();
    Flight::redirect(Config::getURL());
});
Flight::route('/contact', function(){
    Flight::render('contact.view', array());
});
Flight::map('notFound', function(){
    Flight::render('error404.view', array());
});

/*      SERVICE        */
Flight::route('POST /connect', function(){

    $SALT = Config::$SECURE_SALT;
    $request = Flight::request();
    $password = sha1($request->data['password']);
    $passwordCrypter = $SALT.$password;


    Flight::User()->setUsername($request->data['username']);
    Flight::User()->setPassword($passwordCrypter);
    $result = Flight::User()->connect(Flight::Bddmanager());
    $errors;

    if(!empty($result)) {
        $_SESSION['user'] = array(
            "id" => $result->getId(),
            "username" => $result->getUsername(),
            "grade" => $result->getGrade(),
            "locataire" => $result->getLocataire(),
            "proprietaire" => $result->getProprietaire()
        );
        // $_SESSION['user'] = $result;
        Flight::redirect('');
    } else {
        $errors['account'] = "Mauvais nom de compte ou mot de passe";
        Flight::render('login.view', array('errors'=>$errors));
    }
    
});
Flight::route('POST /regist', function() {

    $SALT = "353d196605b2bb5890bfb1b3aa0c3cccfdddd30b";
    $request = Flight::request();
    $errors;
    if(strlen($request->data['username'])<4) {
        $errors['username'] = "Username trop court";
    } else if (strlen($request->data['username'])>12) {
        $errors['username'] = "Username trop long";
    }
    if(strlen($request->data['password'])<4) {
        $errors['password'] = "Mot de passe trop court";
    } else if(strlen($request->data['password'])>12) {
        $errors['password'] = "Mot de passe trop long";
    }
    if($request->data['password'] != $request->data['cpassword']) {
        $errors['cpassword'] = "Les mots de passe ne sont pas identique";
    }
    if (!filter_var($request->data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Le format de votre adresse mail n'est pas valide";
    }
    if(empty($request->data['type'])) {
        $request->data['type'] = "locataire";
    } else if($request->data['type'] != "locataire" && $request->data['type'] != "proprietaire") {
        $request->data['type'] = "locataire";
    }

    if(!empty($errors)) {
        $strErrors = "";
        foreach($errors as $error) {
            $strErrors .= $error.'<br/>';
        }
        Flight::render('register.view', array('errors'=>$strErrors));
    }else{
        Flight::User()->setUsername($request->data['username']);
        Flight::User()->setPassword($request->data['password']);
        Flight::User()->setEmail($request->data['email']);
        Flight::User()->setGrade("user");
        Flight::User()->setType($request->data['type']);
        var_dump(Flight::User()->save(Flight::Bddmanager()));
    }

});
Flight::route('POST /annoncepost', function() {
    $request = Flight::request();
    $errors;

    // if(intval($request->data['titre'])<4) {
    //     $errors['titre'] = "Titre pas assez long";
    // } else if (intval($request->data['titre'])>30) {
    //     $errors['titre'] = "Titre trop long";
    // }

    // if(intval($request->data['description']) < 5) {
    //     $errors['description'] = "Description pas assez long";
    // } else if(intval($request->data['description']) > 350) {
    //     $errors['description'] = "Description trop longue";
    // }

    if(!empty($errors)) {
        $strErrors = "";
        foreach($errors as $error) {
            $strErrors .= $error.'<br/>';
        }
        Flight::render('postAnnonce.view', array('errors'=>$strErrors));
    }else{
        Flight::Annonce()->setTitre($request->data['titre']);
        Flight::Annonce()->setDescription($request->data['description']);
        Flight::Annonce()->setDateDispo($request->data['dateDispo']);
        Flight::Annonce()->setPlaceDispo($request->data['numberPlace']);
        Flight::Annonce()->setIdUser($_SESSION['user']['id']);
        Flight::Annonce()->setPrice($request->data['price']);
        Flight::Annonce()->save(Flight::Bddmanager());
    }    
});
Flight::start();
?>
