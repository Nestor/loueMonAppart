<?= $header_content ?>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col" style="height: 50px;background-color: gray;"></div>
    </div>
    <div class="row">
        <div class="col containerParent">
            
            <?php
                if(!empty($annonce)) {
                    // var_dump($annonce);
                    echo '<h2>Annonce id: '.$annonce->getId().'</h2>';
                    echo '<p><b>Titre:</b> '.$annonce->getTitre().'</p>';
                    echo '<p><b>Description:</b> '.$annonce->getDescription().'</p>';
                    echo '<p><b>Place:</b> '.$annonce->getPlaceDispo().'</p>';
                    echo '<p><b>Prix:</b> '.$annonce->getPrice().'&euro; / par nuit</p>';

                    if($annonce->getAccept() == "false") {
                        echo '<a href="#" class="btn btn-primary">Accepter</a>';
                        echo '<a href="#" class="btn btn-danger">Refuser</a>';
                    }
                }
                
            ?>
        </div>
    </div>
</div>
<?= $footer_content ?>