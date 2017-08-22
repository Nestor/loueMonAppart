<?= $header_content ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mainmenu">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col" style="height: 50px;background-color: #fff;">
            <?php
                if(isset($_GET['etat'])) {
                    switch($_GET['etat']) {
                        case "ok":
                            echo '
                            <div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Votre annonce à était poster veuillez patienter pendant qu\'un membre du staff valide votre annonce
                            </div>
                            ';
                        break;
                    }
                }
            ?>
        </div>
    </div>
    <div class="row containerParent">
        <div class="col">
            <h2>Logements</h2>
            <div class="d-flex flex-wrap align-content-center justify-content-center">
            <?php
                $AnnonceManager = $Bddmanager->getAnnonceManager();
                $annonces = $AnnonceManager->getAnnonces();
                foreach($annonces as $annonce) {
                    Flight::Annonce()->setId($annonce->getId());
                    Flight::Image()->setIdAnnonce($annonce->getId());
                    $images = Flight::Image()->getByAnnonceId($Bddmanager);
                    echo $HTMLFormater->HTMLAnnonce($annonce, $images);
                }
            ?>
            </div>
            

            
        </div>
    </div>
</div>
<?= $footer_content ?>