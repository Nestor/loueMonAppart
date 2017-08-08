<?= $header_content ?>
<div class="container-parent">
    <div class="container">
        <?= $main_content ?>
        
        <div class="cadre cadre-90 background-orange center">
            <?php
                if(empty($id)) {
                    echo 'Votre profil<br/>';

                    echo '<p>Username: '.$_SESSION['user']['username'].'</p>';
                    echo '<p>Grade: '.$_SESSION['user']['grade'].'</p>';
                    echo '<p>Locataire: '.$_SESSION['user']['locataire'].'</p>';
                    echo '<p>Propriétaire: '.$_SESSION['user']['proprietaire'].'</p>';
                } else {
                    echo 'Vous visiter le profil '.$id;
                }
            ?>
        </div>
    </div>
</div>
<?= $footer_content ?>