<?= $header_content ?>

<div class="container">
    <div class="row">
        <div class="col containerParent">
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