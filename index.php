<?php
session_start();
require_once 'flight/Flight.php';
require_once 'model/Autoloader.class.php'; // On importe la classe d'autoload
require_once 'model/Config.class.php'; // On importe la classe d'autoload

// AutoLoader::$displayInfo = true;
AutoLoader::loadDir('configuration/', 'include');
AutoLoader::loadDir('model/', 'require'); // On charge notre modules d'autoload de class (static)


/*      CLASS INSTANCE        */
Flight::register('Bddmanager', 'Bddmanager'); 
Flight::register('HTMLFormater', 'HTMLFormater');
Flight::register('User', 'User');
Flight::register('Annonce', 'Annonce');
Flight::register('AnnonceManager', 'AnnonceManager');
Flight::register('ImageManager', 'ImageManager');
Flight::register('Image', 'Image');
Flight::register('Utils', 'Utils');

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
Flight::route('/post-annonce', function(){

    if(isset($_SESSION['user'])) {
        Flight::Utils()::getProprietaire($_SESSION['user']);
        Flight::render('postAnnonce.view', array());
    }else{
        Flight::Utils()::getLogged();
    }
    
});
Flight::route('/annonce', function(){
    Flight::redirect(Config::getURL());
});
Flight::route('/annonce/@id', function($id){
    if(intval($id)) {
        Flight::render('annonce.view', array(
            'id' => $id
        ));
    }
});
Flight::route('/location/@id', function($id){
    Flight::render('location.view', array(
        'id' => $id
    ));
});
Flight::route('/login', function(){
    Flight::render('login.view', array());
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
Flight::route('/admin', function(){
    if(isset($_SESSION['user'])) {
        Flight::Utils()::getAdministrator($_SESSION['user']);
        Flight::render('admin.view', array());
    }else{
        Flight::Utils()::getLogged();
    }
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
        // $_SESSION['user'] = array(
        //     "id" => $result->getId(),
        //     "username" => $result->getUsername(),
        //     "grade" => $result->getGrade(),
        //     "locataire" => $result->getLocataire(),
        //     "proprietaire" => $result->getProprietaire()
        // );
        $_SESSION['user'] = serialize($result);
        // var_dump($_SESSION['user']);
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
        var_dump(Flight::User()->save(Flight::Bddmanager()));
        Flight::redirect('/register?etat=ok');
    }

});
Flight::route('POST /annoncepost', function() {
    $request = Flight::request();
    $dataImage=[];

    // vérification du titre
    if(strlen($request->data['titre']) < 4) {
        $errors['titre'] = "Titre trop court";
    } else if(strlen($request->data['titre']) > 100) {
        $errors['titre'] = "Titre trop long";
    }

    // vérification de la description
    if(strlen($request->data['description']) < 55) {
        $errors['description'] = "Description trop court";
    } else if(strlen($request->data['']) > 455) {
        $errors['description'] = "Description trop long";
    }

    // vérification de la date (pas fini)
    if(empty($request->data['dateDispo'])) {
        $errors['dateDispo'] = "Veuillez saisir une date";
    }

    // vérification du nombre de places
    if(intval($request->data['numberPlace']) <= 0) {
        $errors['numberPlace'] = "Vous devez avoir au moins une place";
    }

    // Upload des images est on note leur lien dans un array
    for($i = 1; $i <= 3; $i++) {
        if(isset($request->files['monfichier'.$i]) && $request->files['monfichier'.$i]['error'] ==0) {
            if($request->files['monfichier'.$i]['size'] <= 1000000) {

                $infoFichier = pathinfo($request->files['monfichier'.$i]['name']);
                $extension_upload = $infoFichier['extension'];
                $extention_autoriser = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');

                if(in_array($extension_upload, $extention_autoriser)) {
                    move_uploaded_file($request->files['monfichier'.$i]['tmp_name'], 'uploads/'.basename($request->files['monfichier'.$i]['name']));
                    $dataImage[] = Config::getURL().'uploads/'.$request->files['monfichier'.$i]['name'];
                }else{
                    $errors['images'] = 'l\'extension du fichier n\'est pas autoriser: '.$request->files['monfichier'.$i]['name'];
                }

            }else{
                $errors['images'] =  'La taille du fichier '.$request->files['monfichier'.$i]['name'].' est trop gros';
            }
        }
    }

    // Vérification qu'il y a bien une image
    if(empty($dataImage)) {
        $errors['images'] = 'Veuillez uploader au moins une image';
    }

    // Soit on upload soit on affiche les erreurs
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
        Flight::Annonce()->setIdUser(unserialize($_SESSION['user'])->getId());
        Flight::Annonce()->setPrice($request->data['price']);
        $annonceId = Flight::Annonce()->save(Flight::Bddmanager());
        
        foreach($dataImage as $image) {
            Flight::Image()->setIdAnnonce($annonceId);
            Flight::Image()->setLinkImage($image);
            // var_dump(Flight::Image()->save(Flight::Bddmanager()));
            echo '<img src="'.$image.'" alt="image" style="width: 200px;height: 250px;" /><br/>';
        }
    }

});
Flight::start();
?>
