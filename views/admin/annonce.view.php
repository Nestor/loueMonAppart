<?= $header_content ?>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col containerParent">
        <?php if(!empty($annonce)) { ?>
            <div class="jumbotron">
                <h2 class="display-3"><?= $annonce->getTitre() ?></h2>
                <p class="lead"><?= $annonce->getDescription() ?></p>
                <div class="row">

                <div class="col">
                    <div class="card" style="width: 20rem;">
                        <ul class="list-group list-group-flush"><li class="list-group-item"><?= $annonce->getPrice() ?>&euro; <i class="fa fa-money" aria-hidden="true"></i> par nuit</li></ul>
                    </div>
                </div>

                <div class="col">
                    <div class="card" style="width: 20rem;">
                        <ul class="list-group list-group-flush"><li class="list-group-item"><?= $annonce->getPlaceDispo() ?> <i class="fa fa-user" aria-hidden="true"></i> places</li></ul>
                    </div>
                </div>

                <div class="col">
                    <div class="card" style="width: 20rem;">
                        <ul class="list-group list-group-flush"><li class="list-group-item">Poster par <?= $annonce->getIdUser() ?></li></ul>
                    </div>
                </div>
            </div><br/>
            
            <?php 
            Flight::Image()->setIdAnnonce($annonce->getId());
            $images = Flight::Image()->getByAnnonceId(Flight::Bddmanager());
            echo Flight::HTMLFormater()->displaySlider($images);
            } ?>
        </div>
    </div>
</div>
<?= $footer_content ?>