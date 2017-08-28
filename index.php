<?php
session_start();
require_once 'flight/Flight.php';

require_once 'model/Autoloader.class.php'; // On importe la classe d'autoload
require_once 'model/Config.class.php'; // On importe la classe d'autoload

AutoLoader::$displayInfo = false;
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
    $AnnonceManager = Flight::Bddmanager()->getAnnonceManager();
    $annonces = $AnnonceManager->getAnnonces();
    $html = "";
    foreach($annonces as $annonce) {
        Flight::Annonce()->setId($annonce->getId());
        Flight::Image()->setIdAnnonce($annonce->getId());
        $images = Flight::Image()->getByAnnonceId(Flight::Bddmanager());
        $html .= Flight::HTMLFormater()->displayAnnonce($annonce, $images);
    }
    Flight::render('home.view', array("annonces" => $html));
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
        Flight::Annonce()->setId($id);
        Flight::Image()->setIdAnnonce($id);
        $images = Flight::Image()->getByAnnonceId(Flight::Bddmanager());
        $annonce = Flight::Annonce()->load(Flight::Bddmanager());
        $html = "";
        if(!empty($annonce)) {
        Flight::Image()->setIdAnnonce($annonce->getId());
        $images = Flight::Image()->getByAnnonceId(Flight::Bddmanager());

        $html.=Flight::HTMLFormater()->displayViewAnnonce($annonce);
        
        $html.=Flight::HTMLFormater()->displaySlider($images);
        $html.='<a href="'.Config::getURL('location/'.$annonce->getId()).'" class="btn btn-lg btn-primary">Louer</a>';
        } 
        Flight::render('annonce.view', array('annonce' => $html));
    }
});
Flight::route('/location/@id', function($id){
    if(intval($id)) {
        Flight::render('location.view', array(
            'id' => $id
        ));
    } else if($id == "login") {
        Flight::render('location-c.view', array());
    } else {
        Flight::redirect('/404');
    }
});
Flight::route('/paiement', function(){
    Flight::render('paiement.view', array());
});
Flight::route('/login', function(){
    Flight::render('login.view', array());
});
Flight::route('/profil', function(){
    Flight::render('profil.view', array());
});
Flight::route('/upgrade', function(){
    if(isset($_SESSION['user'])) {
        Flight::render('upgrade.view', array());
    }else{
        Flight::Utils()::getLogged();
    }
    
});
Flight::route('/upgrade/send', function(){
    if(isset($_SESSION['user'])) {
        $session = unserialize($_SESSION['user']);
        if($session->getProprietaire() == "false" && $session->getDemandeProprietaire() == "false") {
            $session->setUsername($session->getUsername());
            $session->setPassword($session->getPassword());
            $session->setEmail($session->getEmail());
            $session->setGrade($session->getGrade());
            $session->setDateInscription($session->getDateInscription());
            $session->setproprietaire($session->getProprietaire());
            $session->setDemandeProprietaire('true');
            $session->update(Flight::Bddmanager());
            Flight::redirect('upgrade?etat=1');
        } else {
            Flight::redirect(Config::getURL('upgrade?etat=2'));
        }
        
    }else{
        Flight::Utils()::getLogged();
    }
    
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
        Flight::render('admin/home.view', array());
    }else{
        Flight::Utils()::getLogged();
    }
});
Flight::route('/admin/annonces', function(){
    if(isset($_SESSION['user'])) {
        Flight::Utils()::getAdministrator($_SESSION['user']);
        $annonces = Flight::Annonce()->loadAll(Flight::Bddmanager());
        $html = Flight::HTMLFormater()->displayAdminAnnonce($annonces);
        Flight::render('admin/annonces.view', array("annonces" => $html));
    }else{
        Flight::Utils()::getLogged();
    }
});
Flight::route('/admin/annonce/delete/@id', function($id){
    if(isset($_SESSION['user'])) {
        Flight::Utils()::getAdministrator($_SESSION['user']);
        $annonce = Flight::Annonce();
        $annonce->setId($id);
        $annonce->delete(Flight::Bddmanager());
        Flight::redirect(Config::getURL('admin/annonces?etat=annonceDelete'));
    }else{
        Flight::Utils()::getLogged();
    }
});
Flight::route('/admin/annonce/edit/@id', function($id){
    if(isset($_SESSION['user'])) {
        Flight::Utils()::getAdministrator($_SESSION['user']);
        Flight::render('admin/annonce-e.view', array(
            "id" => $id,
            "annonce" => Flight::Annonce()
        ));
    }else{
        Flight::Utils()::getLogged();
    }
});
Flight::route('/admin/annonces-v', function(){
    if(isset($_SESSION['user'])) {
        Flight::Utils()::getAdministrator($_SESSION['user']);
        Flight::render('admin/annonces-v.view', array(
            "annonces" => Flight::Annonce()->loadAll(Flight::Bddmanager())
        ));
    }else{
        Flight::Utils()::getLogged();
    }
});
Flight::route('/admin/annonces-v/valide/@id', function($id){
    if(isset($_SESSION['user'])) {
        Flight::Utils()::getAdministrator($_SESSION['user']);
        if(intval($id)) {
            Flight::Annonce()->setId($id);
            $annonce = Flight::Annonce()->load(Flight::Bddmanager());

            Flight::Annonce()->setId($annonce->getId());
            Flight::Annonce()->setTitre($annonce->getTitre());
            Flight::Annonce()->setDescription($annonce->getDescription());
            Flight::Annonce()->setDateDispo($annonce->getDateDispo());
            Flight::Annonce()->setPlaceDispo($annonce->getPlaceDispo());
            Flight::Annonce()->setPrice($annonce->getPrice());
            Flight::Annonce()->setIdUser($annonce->getIdUser());
            Flight::Annonce()->setAccept("true");
            Flight::Annonce()->setDatePosted($annonce->getDatePosted());
            Flight::Annonce()->setType($annonce->getType());
            Flight::Annonce()->setLieu($annonce->getLieu());
            var_dump(Flight::Annonce()->update(Flight::Bddmanager()));
            Flight::redirect(Config::getURL('admin/annonces-v?etat=1'));
        }
    }else{
        Flight::Utils()::getLogged();
    }
});
Flight::route('/admin/annonce/@id', function($id){
    if(isset($_SESSION['user'])) {
        Flight::Utils()::getAdministrator($_SESSION['user']);
        $annonce = Flight::Annonce()->setId($id);
        $annonce = Flight::Annonce()->load(Flight::Bddmanager());
        Flight::render('admin/annonce.view', array("annonce"=>$annonce));
    }else{
        Flight::Utils()::getLogged();
    }
});
Flight::route('/admin/users', function(){
    if(isset($_SESSION['user'])) {
        Flight::Utils()::getAdministrator($_SESSION['user']);
        Flight::render('admin/users.view', array(
            "users" => Flight::User()->loadAll(Flight::Bddmanager())
        ));
    }else{
        Flight::Utils()::getLogged();
    }
});
Flight::route('/admin/users-v', function(){
    if(isset($_SESSION['user'])) {
        Flight::Utils()::getAdministrator($_SESSION['user']);
        Flight::render('admin/users-v.view', array(
            "users" => Flight::User()->loadAll(Flight::Bddmanager())
        ));
    }else{
        Flight::Utils()::getLogged();
    }
});
Flight::route('/admin/users-v/valide/@id', function($id){
    echo 'Vous valider l\'utilisateur '.$id;
    Flight::User()->setId($id);
    $user=Flight::User()->selectById(Flight::Bddmanager());
    Flight::User()->setUsername($user->getUsername());
    Flight::User()->setPassword($user->getPassword());
    Flight::User()->setEmail($user->getEmail());
    Flight::User()->setGrade($user->getGrade());
    Flight::User()->setDateInscription($user->getDateInscription());
    Flight::User()->setProprietaire('true');
    Flight::User()->setDemandeProprietaire('false');
    Flight::User()->update(Flight::Bddmanager());
    Flight::redirect(Config::getURL('admin/users-v?etat=1'));
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
        $_SESSION['user'] = serialize($result);
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
        Flight::render('register.view', array('errors'=>$errors));
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
                    $dataImage[] = 'uploads/'.$request->files['monfichier'.$i]['name'];
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

    if(empty($request->data['lieu'])) {
        $errors['lieu'] = 'Veuillez définir un lieu';
    }

    // Soit on upload soit on affiche les erreurs
    if(!empty($errors)) {
        Flight::render('postAnnonce.view', array('errors'=>$errors));
    }else{
        Flight::Annonce()->setTitre($request->data['titre']);
        Flight::Annonce()->setDescription($request->data['description']);
        Flight::Annonce()->setDateDispo($request->data['dateDispo']);
        Flight::Annonce()->setPlaceDispo($request->data['numberPlace']);
        Flight::Annonce()->setIdUser(unserialize($_SESSION['user'])->getId());
        Flight::Annonce()->setPrice($request->data['price']);
        Flight::Annonce()->setType($request->data['type']);
        Flight::Annonce()->setLieu($request->data['lieu']);
        $date=date('Y-m-d');
        Flight::Annonce()->setDatePosted($date);
        $annonceId = Flight::Annonce()->save(Flight::Bddmanager());
        
        foreach($dataImage as $image) {
            Flight::Image()->setIdAnnonce($annonceId);
            Flight::Image()->setLinkImage($image);
            Flight::Image()->save(Flight::Bddmanager());
        }

        Flight::redirect(Config::getURL('?etat=ok'));
    }

});
Flight::route('POST /searchLieux', function() {
    $request = Flight::request();
    echo 'Vous rechercher une habitation vers '.$request->data['lieu'];

});
Flight::route('POST /annonceedit', function() {
    $request = Flight::request();
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

    if(empty($request->data['lieu'])) {
        $errors['lieu'] = 'Veuillez définir un lieu';
    }

    if(empty($request->data['type'])) {
        $errors['type'] = 'Veuillez définir un lieu';
    }

    if(!empty($errors)) {
        Flight::render('admin/annonce-e.view', array('errors'=>Flight::HTMLFormater()->displayError($errors)));
    }else{
        Flight::Annonce()->setId($request->data['id']);
        Flight::Annonce()->setTitre($request->data['titre']);
        Flight::Annonce()->setDescription($request->data['description']);
        Flight::Annonce()->setDateDispo($request->data['dateDispo']);
        Flight::Annonce()->setPlaceDispo($request->data['numberPlace']);
        Flight::Annonce()->setPrice($request->data['price']);
        Flight::Annonce()->setType($request->data['type']);
        Flight::Annonce()->setLieu($request->data['lieu']);
        Flight::Annonce()->setIdUser($request->data['idUser']);
        Flight::Annonce()->setAccept($request->data['accept']);
        Flight::Annonce()->update(Flight::Bddmanager());
        Flight::redirect(Config::getURL('admin/annonces?etat=1'));
    }
});
Flight::start();
?>
