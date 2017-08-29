<?= $header_content ?>
<div class="container">
    <div class="row">
        <div class="col containerParent">

            <h2>Réservation</h2>
            <?php
                Flight::Annonce()->setId($id);
                $annonce = Flight::Annonce()->load(Flight::Bddmanager());
            ?>
            <div class="modal fade" id="recapAnnonce" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?=$annonce->getTitre()?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <p>Description:</p>
                    <p><?= substr($annonce->getDescription(), 0, 300).'...'?></p>
                    <p>Prix: <?= $annonce->getPrice() ?> &euro; / nuit</p>
                    <p> <i class="fa fa-users" aria-hidden="true"></i> Place: <?= $annonce->getPlaceDispo() ?> places </p>
                    <?php
                        if($annonce->getType() == "house") {
                            echo '<p><i class="fa fa-home" title="Maison" aria-hidden="true"></i> Type: Maison</p>';
                        } elseif($annonce->getType() == "appart") {
                            echo '<p><i class="fa fa-building" title="Appartement" aria-hidden="true"></i> Type: Appartement</p>';
                        } elseif($annonce->getType() == "cars") {
                            echo '<p><i class="fa fa-bus" aria-hidden="true" title="Roulotte, Camping-cars"></i> Type: Roulotte, Camping-cars</p>';
                        }
                    ?>
                    <p><i class="fa fa-globe" aria-hidden="true"></i> Lieu: <?= ucfirst($annonce->getLieu()) ?></p>


                    <div class="row">
                        <div class="col">
                            <iframe frameborder="0" style="width:100%;height: 300px;border:0"
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCsWmEqmCc8uaTZ4M-1WGD_4e-VpXD4eg0
                                &q=<?= ucfirst($annonce->getLieu()) ?>
                                &zoom=5
                                &maptype=satellite" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>

            <form action="<?=Config::getURL()?>command" method="post">
                <input type="hidden" name="annonceId" value="<?=Flight::Annonce()->getId()?>" />
                <div class="form-group">
                <label for="date_arriver">Date d'arriver</label>
                <input type="date" class="form-control" value="" palceholder="" name="date_arriver" id="date_arriver"/>
                </div>
                <div class="form-group">
                <label for="date_depart">Date de départ</label>
                <input type="date" class="form-control" value="" palceholder="" name="date_depart" id="date_depart"/>
                </div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#recapAnnonce">
                    Voir le récapitulatif
                </button>
                <input type="submit" class="btn btn-primary" value="Commander" />
            </form>


        </div>
    </div>
</div>
<?= $footer_content ?>