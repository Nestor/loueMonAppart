<?= $header_content ?>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col" style="height: 50px;background-color: gray;"></div>
    </div>
    <div class="row">
        <div class="col" style="height: auto;min-height: 300px;padding:5px;background-color: silver;">
            <h2>Liste des annonces à valider</h2>
            <?php
                if(!empty($annonces)) {
                    foreach($annonces as $annonce) {
                        if($annonce->getAccept() == "false") {
                            echo '<a href="'.Config::getURL('admin/annonce/'.$annonce->getId()).'">'.$annonce->getTitre().' | '.$annonce->getDatePosted().'</a><br/>';
                        }
                    }
                }
                
            ?>
        </div>
    </div>
</div>
<?= $footer_content ?>