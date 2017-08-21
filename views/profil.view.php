<?= $header_content ?>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col" style="height: auto;min-height: 300px;padding:5px;background-color: silver;">
            <h2>Profil</h2>
            <?php
            if(isset($_SESSION['user'])) {
                $session = unserialize($_SESSION['user']);
                echo 'Votre profil<br/>';

                echo '<p>Username: '.$session->getUsername().'</p>';
                echo '<p>Grade: '.$session->getGrade().'</p>';
                echo '<p>Locataire: '.$session->getLocataire().'</p>';
                echo '<p>Propriétaire: '.$session->getProprietaire().'</p>';
            }
            ?>
        </div>
    </div>
</div>
<?= $footer_content ?>