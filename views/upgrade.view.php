<?= $header_content ?>
<div class="container">
    <div class="row">
        <div class="col containerParent">
            <h2>Upgrade le compte</h2>
            <?php
                if(isset($_GET['etat'])) {
                    switch($_GET['etat']) {
                        case "1":
                            echo '
                            <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            La demande à bien était envoyer, veuillez vous reconnecter pour voir les modification</div>
                            ';
                        break;
                        case "2":
                            echo '
                            <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            Erreur, vous avez déjà fait la demande, ou vous êtes déjà promu</div>
                            ';
                        break;
                    }
                } else {
                    $session = unserialize($_SESSION['user']);
                    if($session->getProprietaire() == "false" && $session->getDemandeProprietaire() == "false") {
                        echo '
                        <p>En upgradant votre compte vous pourrez poster des annonces</p>
                        <a href="'.Config::getURL('upgrade/send').'" class="btn btn-primary">Faire la demande d\'upgrade (gratuit)</a>
                        ';
                    } else {
                        Flight::redirect(Config::getURL('upgrade/send'));
                    }
                    
                    
                }
            ?>
        </div>
    </div>
</div>
<?= $footer_content ?>