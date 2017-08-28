<?php

class HTMLFormater {
    public function displayAnnonce(Annonce $annonce, $images) {
        if($annonce->getAccept() == "true") {
            $test = $annonce->getDescription();
            return '
            <div class="card item" data-type="'.$annonce->getType().'" style="width: 20rem;margin:20px;">
            <img class="card-img-top" src="'.Config::getURL().$images[0]->getLinkImage().'" style="width: 318px;height: 180px;" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">'.$annonce->getTitre().'</h4>
                <p class="card-text">'.substr($annonce->getDescription(), 0, 200).'</p>
                <a href="'.Config::getURL('annonce/'.$annonce->getId()).'" class="btn btn-primary">Lire plus</a>
            </div>
            </div>
            ';
        }
        return false;
    }

    public function displayViewAnnonce(Annonce $annonce) {
        return '
        <div class="jumbotron">
            <h2 class="display-3">'.$annonce->getTitre().'</h2>
            <p class="lead">'.$annonce->getDescription().'</p>
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 20rem;">
                        <ul class="list-group list-group-flush"><li class="list-group-item">'.$annonce->getPrice().'&euro; par nuit</li></ul>
                    </div>
                </div>

                <div class="col">
                    <div class="card" style="width: 20rem;">
                        <ul class="list-group list-group-flush"><li class="list-group-item">'.$annonce->getPlaceDispo().' places</li></ul>
                    </div>
                </div>

                <div class="col">
                    <div class="card" style="width: 20rem;">
                        <ul class="list-group list-group-flush"><li class="list-group-item">Poster par '.$annonce->getIdUser().'</li></ul>
                    </div>
                </div>
            </div>
        </div><br/>
        ';
    }

    public function displayAdminAnnonce(Array $annonces) {
        $html = "";
        if(!empty($annonces)) {
            foreach($annonces as $annonce) {
                if($annonce->getAccept() == "true") {
                    $html.='
                    <tr>
                        <th scope="row">'.$annonce->getId().'</th>
                        <td><a href="'.Config::getURL('admin/annonce/'.$annonce->getId()).'">'.$annonce->getTitre().'</a></td>
                        <td>'.$annonce->getIdUser().'</td>
                        <td>'.$annonce->getPrice().'&euro; par nuit</td>
                        <td>'.$annonce->getDatePosted().'</td>
                        <td>
                        <a href="'.Config::getURL('admin/annonce/edit/'.$annonce->getId()).'" class="btn btn-primary">Editer</a>
                        <a href="'.Config::getURL('admin/annonce/delete/'.$annonce->getId()).'" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                    ';
                }
            }
            return $html;
        }
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


                $mainMenu .= '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                </nav>';
            return $mainMenu;
        }

        $mainMenu = '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
        </div></nav>';
    return $mainMenu;
    }

    public function displayError($array = array()) {
        if(!empty($array)) {
            $data = '<div class="alert alert-danger col-md-11 d-block mx-auto" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
                <h4 class="alert-heading">Formulaire</h4>
                <p>Erreur veuillez remplir les champs correctement</p>
                <hr>';
            foreach($array as $error) {
                $data .= '<p class="mb-0">'.$error.'</p>';
            }
            $data .= '</div>';
            return $data;
        }
        return false;
    }

    public function displaySlider($images=array()) {
        $slider = "";
        if(!empty($images)) {
            $slider.='<div id="carouselExampleIndicators" class="carousel slide d-w" data-ride="carousel"><ol class="carousel-indicators">';
            for($i=0;$i<count($images);$i++) {
                if($i==0) {
                    $slider.='<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" class="active"></li>';
                } else {
                    $slider.='<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"></li>';
                }
            }
            $slider.='</ol><div class="carousel-inner">';
            for($i=0;$i<count($images);$i++) {
                if($i==0) {
                    $slider.='
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="'.Config::getURL().$images[$i]->getLinkImage().'" alt="slide_img" style="height:500px;width:100%;">
                    </div>
                    ';
                }else{
                    $slider.='
                    <div class="carousel-item">
                        <img class="d-block w-100" src="'.Config::getURL().$images[$i]->getLinkImage().'" alt="slide_img" style="height:500px;width:100%;">
                    </div>
                    ';
                }
            }
            $slider.='</div>';
            $slider.='
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
            return $slider;
        }
        return false;
    }
    
}

?>