<?php
Flight::route('POST /connect', function(){

    $SALT = "353d196605b2bb5890bfb1b3aa0c3cccfdddd30b";
    $request = Flight::request();
    $password = sha1($request->data['password']);
    $passwordCrypter = $SALT.$password;


    Flight::User()->setUsername($request->data['username']);
    Flight::User()->setPassword($passwordCrypter);
    $result = Flight::User()->connect(Flight::Bddmanager());
    $errors;

    if(!empty($result)) {
        // var_dump($result);
        $_SESSION['user'] = array(
            "id" => $result->getId(),
            "username" => $result->getUsername(),
            "grade" => $result->getGrade(),
            "locataire" => $result->getLocataire(),
            "proprietaire" => $result->getProprietaire()
        );
        Flight::redirect('login');
    } else {
        $errors['account'] = "Mauvais nom de compte ou mot de passe";
        Flight::render('login.view', array('errors'=>$errors));
    }
    
});
?>