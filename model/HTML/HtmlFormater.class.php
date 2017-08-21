<?php

class HTMLFormater {
    public function HTMLAnnonce(Annonce $annonce) {
        if($annonce->getAccept() == "true") {
            $image = "http://127.0.0.1:8888/airbnb/uploads/Capture.PNG";
            // return '
            //     <a href="annonce/'.$annonce->getId().'">
            //     <div class="annonce">
            //         <header>
            //             <img src="'.$image.'" class="img-fluid img-thumbnail" alt="appart_img" draggable="false" />
            //         </header>
            //         <main class="background-white">
            //             <p>
            //                 <span class="price"><span class="euro">'.$annonce->getPrice().'</span> par nuit</span>, '.substr($annonce->getDescription(), 0, 100).' ...<br/>
            //                 <a href="#">0 Avis et 0 Commentaires</a>
            //             </p>
            //         </main>
            //     </div>
            //     </a>
            // ';
            echo '<div class="col-md-3" style="height: 200px;margin:5px;">
                <a href="annonce/'.$annonce->getId().'"><div class="col-md-12" style="height:100%;width:100%;background-color: gray;">
                '.$annonce->getTitre().'<br/>
                '.substr($annonce->getDescription(), 0, 100).'<br/>
                '.$annonce->getPrice().'
                </div></a>
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
            <a class="navbar-brand" href="#">Mon Site</a>
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