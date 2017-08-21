<?= $header_content ?>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col" style="height: auto;min-height: 300px;padding:5px;background-color: silver;">
            <h2>Logements</h2>


            <div class="d-flex flex-wrap align-content-center justify-content-center">
            <?php
                    $AnnonceManager = $BddManager->getAnnonceManager();
                    $annonces = $AnnonceManager->getAnnonces();

                    foreach($annonces as $annonce) {
                        echo $HTMLFormater->HTMLAnnonce($annonce);
                    }
            ?>  

            </div>
            

            
        </div>
    </div>
</div>
<?= $footer_content ?>