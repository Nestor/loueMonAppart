<?= $header_content ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mainmenu">
            <?= $main_content ?>
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