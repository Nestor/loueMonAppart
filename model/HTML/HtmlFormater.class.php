<?php

class HTMLFormater {
    public function HTMLAnnonce(Annonce $annonce, $images) {
        if($annonce->getAccept() == "true") {
            // echo '<div class="elem" style="height: 250px;margin:5px;background-image:url('.$images[0]->getLinkImage().');background-size:cover;border:1px solid gray;">
            //     <h3>'.$annonce->getTitre().'</h3>
            //     <p style="width:90%;padding:5px 10px;background-color: rgba(255,255,255,0.5);border-radius:4px;margin:auto;">
            //         '.substr($annonce->getDescription(), 0, 110).'
            //     </p>
            //     <a href="'.Config::getURL('annonce/'.$annonce->getId()).'">Lire plus</a>
            // </div>';
            echo '<div class="elem" style="height: 250px;margin:5px;background-image:url('.$images[0]->getLinkImage().');background-size:cover;border:1px solid gray;">
                <div class="col" style="width:100%;height:auto;min-height:10%;background-color:rgba(255,255,255,0.5);">'.$annonce->getTitre().'</div>
                <div class="col" style="width:100%;height:auto;min-height:80%;font-size:16px;font-weight: bold;">'.substr($annonce->getDescription(), 0, 200).'</div>
                <div class="col" style="width:100%;height:auto;min-height:10%;background-color:rgba(255,255,255,0.5);"><a href="'.Config::getURL('annonce/'.$annonce->getId()).'">Lire plus</a></div>
            </div>';
        }
        return false;
    }

    public function displayMain($session=null) {
        if(!empty($session)) {
            $session = unserialize($session);
            $otherData=[];
            $mainMenu="";

            if($session->getProprietaire() == "true") {
                $otherData[] = '<li class="nav-item"><a class="nav-link" href="'. Config::getURL('post-annonce') .'">Poster une annonce</a></li>';
            }

            if($session->getGrade() == "owner") {
                $otherData[] = '<li class="nav-item"><a class="nav-link" href="'. Config::getURL('admin') .'">Espace admin</a></li>';
            }


            $mainMenu .= '
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="'.Config::getURL().'">Mon Site</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="'.Config::getURL().'">Accueil <span class="sr-only">(current)</span></a></li>
            <li class="nav-item"><a class="nav-link" href="'.Config::getURL('profil').'">Mon profil</a></li>';
            
                foreach($otherData as $linkMain) {
                    $mainMenu .= $linkMain;
                }

            $mainMenu .= '
                <li class="nav-item"><a class="nav-link" href="'. Config::getURL('logout') .'">Se déconnecter</a></li>
                <li class="nav-item"><a class="nav-link" href="'. Config::getURL('contact') .'">Nous contacter</a></li>
            </ul>
            <!--
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Destination" aria-label="Search">
                <input class="form-control mr-sm-2" type="number" placeholder="Nombre de personnes" name="nbrPerson" min="1">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
            -->
            </div>
            </nav>
            ';
            return $mainMenu;
        }

        $mainMenu = '
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="'. Config::getURL() .'">Mon Site</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="'. Config::getURL() .'">Accueil <span class="sr-only">(current)</span></a></li>
            <li class="nav-item"><a class="nav-link" href="'. Config::getURL('login') .'">Se connecter</a></li>
            <li class="nav-item"><a class="nav-link" href="'. Config::getURL('register') .'">S\'inscrire</a></li>
            <li class="nav-item"><a class="nav-link" href="'. Config::getURL('contact') .'">Nous contacter</a></li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Destination" aria-label="Search">
            <input class="form-control mr-sm-2" type="number" placeholder="Nombre de personnes" name="nbrPerson" min="1">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
        </div>
    </nav>';
    return $mainMenu;
    }

    public function displayError($array = array()) {
        if(!empty($array)) {
            foreach($array as $error) {
                return '<p>'.$error.'</p>';
            }
        }
        return false;
    }

    public function displaySlider($images=array()) {
        if(!empty($images)) {
            echo '<div id="carouselExampleIndicators" class="carousel slide d-w" data-ride="carousel"><ol class="carousel-indicators">';
            for($i=0;$i<count($images);$i++) {
                if($i==0) {
                    echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" class="active"></li>';
                } else {
                    echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"></li>';
                }
            }
            echo '</ol><div class="carousel-inner">';
            for($i=0;$i<count($images);$i++) {
                if($i==0) {
                    echo '
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="'.$images[$i]->getLinkImage().'" alt="slide_img" style="height:500px;width:100%;">
                    </div>
                    ';
                }else{
                    echo '
                    <div class="carousel-item">
                        <img class="d-block w-100" src="'.$images[$i]->getLinkImage().'" alt="slide_img" style="height:500px;width:100%;">
                    </div>
                    ';
                }
            }
            echo '</div>';
            echo '
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            ';
        }
        return false;
    }
    
}

?>