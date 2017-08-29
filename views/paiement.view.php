<?= $header_content ?>
<div class="container">
    <div class="row">
        <div class="col containerParent">
            <h2>Paiement</h2>
            <?php
                if(isset($_GET['etat'])) {
                    switch($_GET['etat']) {
                        case "2":
                            echo 'Veuillez définir des date';
                        break;
                    }
                }
            ?>
            <p>La page est en cours de développement</p>
        </div>
    </div>
</div>
<?= $footer_content ?>