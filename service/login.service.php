<?php
Flight::route('POST /connect', function(){
    $SALT = "353d196605b2bb5890bfb1b3aa0c3cccfdddd30b";
    $request = Flight::request();
    $password = sha1($request->data['password']);
    $passwordCrypter = $SALT.$password;
    echo $request->data['username'].'<br/>';
    echo $passwordCrypter.'<br/>';
});
?>