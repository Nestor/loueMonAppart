<?php

class HTMLFormater {
    public function HTMLAnnonce($id, $titre, $images, $price, $description, $accept) {
        if($accept == "true") {
            return '
                <a href="annonce/'.$id.'">
                <div class="annonce">
                    <header>
                        <img src="'.$images.'" alt="appart_img" draggable="false" />
                    </header>
                    <main class="background-white">
                        <p>
                            <span class="price"><span class="euro">'.$price.'</span> par nuit</span>, '.substr($description, 0, 100).' ...<br/>
                            <a href="#">10 Avis et 44 Commentaires</a>
                        </p>
                    </main>
                </div>
                </a>
            ';
        }
        return false;
    }

    public function displayMain($session=null) {
        $mainMenu = "";
        if(!empty($session)) {
            if($session['proprietaire'] == "true") {
                $mainMenu = '
                <li class="background-green-h"><a href="'. Config::getURL() .'">Accueil</a></li>
                <li class="background-green-h"><a href="'.Config::getURL('post-annonce').'">Poster une annonce</a></li>
                <li class="background-green-h"><a href="'.Config::getURL('profil').'">Mon profil</a></li>
                <li class="background-green-h"><a href="'. Config::getURL('logout') .'">Se déconnecter</a></li>
                <li class="background-green-h"><a href="'. Config::getURL('contact') .'">Nous contacter</a></li>
                ';
            } else {
                $mainMenu = '
                <li class="background-green-h"><a href="'. Config::getURL() .'">Accueil</a></li>
                <li class="background-green-h"><a href="'.Config::getURL('profil').'">Mon profil</a></li>
                <li class="background-green-h"><a href="'. Config::getURL('logout') .'">Se déconnecter</a></li>
                <li class="background-green-h"><a href="'. Config::getURL('contact') .'">Nous contacter</a></li>
                ';
            }
            return $mainMenu;
        } else {
            return '
                <li class="background-green-h"><a href="'. Config::getURL() .'">Accueil</a></li>
                <li class="background-green-h"><a href="'. Config::getURL('login') .'">Se connecter</a></li>
                <li class="background-green-h"><a href="'. Config::getURL('register') .'">S\'inscrire</a></li>
                <li class="background-green-h"><a href="'. Config::getURL('contact') .'">Nous contacter</a></li>
            ';
        }
    }

    public function displayError($array = array()) {
        if(!empty($array)) {
            foreach($array as $error) {
                return '<p>'.$error.'</p>';
            }
        }
        return false;
    }
    
}

?>