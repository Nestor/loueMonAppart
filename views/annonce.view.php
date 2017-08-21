<?= $header_content ?>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col containerParent">
            <h2>Logements</h2>

                <?php
                    Flight::Annonce()->setId($id);
                    Flight::Image()->setIdAnnonce($id);

                    $images = Flight::Image()->getByAnnonceId(Flight::Bddmanager());
                    
                    $annonce = Flight::Annonce()->load(Flight::Bddmanager());
                    echo 'Titre: '.$annonce->getTitre().'<br/>';
                    echo 'Description: '.$annonce->getDescription().'<br/>';
                    echo 'Disponible à partir du: '.$annonce->getDateDispo().'<br/>';
                    echo 'Place disponible: '.$annonce->getPlaceDispo().'<br/>';
                    echo 'Prix: '.$annonce->getPrice().' par nuit<br/>';

                    echo '<a href="'.Config::getURL('location/'.$id).'" class="btn btn-primary">Louer</a>';

                    echo Flight::HTMLFormater()->displaySlider($images);
                ?>          
                            
            </div>
            

            
        </div>
    </div>
</div>
<?= $footer_content ?>