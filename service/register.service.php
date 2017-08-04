<?php
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
        // Flight::redirect('register', array('errors'=>'es'));
    }else{
        Flight::User()->setUsername($request->data['username']);
        Flight::User()->setPassword($request->data['password']);
        Flight::User()->setEmail($request->data['email']);
        Flight::User()->setGrade("user");
        Flight::User()->setType($request->data['type']);
        var_dump(Flight::User()->save(Flight::Bddmanager()));
    }

});
?>